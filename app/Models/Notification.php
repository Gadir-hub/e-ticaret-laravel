<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class NotificationService
{
    /**
     * Yeni sipariş bildirimi oluştur
     */
    public function sendNewOrderNotification(Order $order, Product $product, User $buyer)
    {
        $seller = User::find($order->seller_id);
        
        if (!$seller) return;

        // Database notification
        $notification = Notification::create([
            'user_id' => $seller->id,
            'type' => 'new_order',
            'title' => 'Yeni Sipariş! 🎉',
            'message' => "{$product->name} ürününüzden {$order->quantity} adet sipariş alındı.",
            'data' => json_encode([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'buyer_name' => $buyer->name,
                'buyer_id' => $buyer->id,
                'quantity' => $order->quantity,
                'total_price' => $order->total_price,
                'created_at' => now()->format('d.m.Y H:i')
            ]),
            'is_read' => false,
            'action_url' => route('orders.show', $order->id)
        ]);

        // Email notification
        $this->sendNewOrderEmail($seller, $order, $product, $buyer);

        // Pusher/WebSocket için event (opsiyonel)
        // event(new NewOrderNotification($notification));

        return $notification;
    }

    /**
     * Sipariş durumu güncelleme bildirimi
     */
    public function sendOrderStatusNotification(Order $order, string $newStatus, string $oldStatus)
    {
        $buyer = User::find($order->buyer_id);
        
        if (!$buyer) return;

        $statusConfig = $this->getStatusConfig($newStatus);
        
        if (!$statusConfig) return;

        $notification = Notification::create([
            'user_id' => $buyer->id,
            'type' => 'order_status_update',
            'title' => $statusConfig['title'],
            'message' => "{$order->product->name} - {$statusConfig['message']}",
            'data' => json_encode([
                'order_id' => $order->id,
                'product_id' => $order->product_id,
                'product_name' => $order->product->name,
                'old_status' => $oldStatus,
                'new_status' => $newStatus,
                'updated_at' => now()->format('d.m.Y H:i'),
                'tracking_number' => $order->tracking_number // varsa
            ]),
            'is_read' => false,
            'action_url' => route('orders.show', $order->id),
            'icon' => $statusConfig['icon']
        ]);

        // Email gönderimi
        $this->sendStatusUpdateEmail($buyer, $order, $newStatus, $oldStatus);

        return $notification;
    }

    /**
     * Durum bazlı konfigürasyon
     */
    private function getStatusConfig(string $status): array
    {
        $configs = [
            'confirmed' => [
                'title' => 'Sipariş Onaylandı ✅',
                'message' => 'Siparişiniz onaylandı ve hazırlanıyor.',
                'icon' => 'check-circle'
            ],
            'shipped' => [
                'title' => 'Sipariş Kargoya Verildi 🚚',
                'message' => 'Siparişiniz kargoya verildi.',
                'icon' => 'truck'
            ],
            'delivered' => [
                'title' => 'Sipariş Teslim Edildi 🎁',
                'message' => 'Siparişiniz teslim edildi.',
                'icon' => 'package'
            ],
            'cancelled' => [
                'title' => 'Sipariş İptal Edildi ❌',
                'message' => 'Siparişiniz iptal edildi.',
                'icon' => 'x-circle'
            ],
            'pending' => [
                'title' => 'Sipariş Beklemede ⏳',
                'message' => 'Siparişiniz bekleme durumunda.',
                'icon' => 'clock'
            ]
        ];

        return $configs[$status] ?? [];
    }

    /**
     * Yeni sipariş email'i
     */
    private function sendNewOrderEmail(User $seller, Order $order, Product $product, User $buyer)
    {
        try {
            Mail::send('emails.new_order', [
                'seller' => $seller,
                'order' => $order,
                'product' => $product,
                'buyer' => $buyer
            ], function ($message) use ($seller, $order) {
                $message->to($seller->email)
                       ->subject("Yeni Sipariş #{$order->id} - " . config('app.name'));
            });
        } catch (\Exception $e) {
            \Log::error('New order email error: ' . $e->getMessage());
        }
    }

    /**
     * Durum güncelleme email'i
     */
    private function sendStatusUpdateEmail(User $buyer, Order $order, string $newStatus, string $oldStatus)
    {
        try {
            Mail::send('emails.order_status_update', [
                'buyer' => $buyer,
                'order' => $order,
                'newStatus' => $newStatus,
                'oldStatus' => $oldStatus,
                'statusConfig' => $this->getStatusConfig($newStatus)
            ], function ($message) use ($buyer, $order, $newStatus) {
                $message->to($buyer->email)
                       ->subject("Sipariş Durumu Güncellendi #{$order->id}");
            });
        } catch (\Exception $e) {
            \Log::error('Order status email error: ' . $e->getMessage());
        }
    }

    /**
     * Toplu bildirim oluştur
     */
    public function sendBulkNotification(array $userIds, string $title, string $message, string $type = 'info')
    {
        $notifications = [];
        
        foreach ($userIds as $userId) {
            $notifications[] = [
                'user_id' => $userId,
                'type' => $type,
                'title' => $title,
                'message' => $message,
                'is_read' => false,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        Notification::insert($notifications);
    }

    /**
     * Okunmamış bildirimleri getir
     */
    public function getUnreadNotifications(int $userId, int $limit = 10)
    {
        return Notification::where('user_id', $userId)
                          ->where('is_read', false)
                          ->latest()
                          ->limit($limit)
                          ->get();
    }

    /**
     * Tüm bildirimleri getir (pagination ile)
     */
    public function getAllNotifications(int $userId, int $perPage = 15)
    {
        return Notification::where('user_id', $userId)
                          ->latest()
                          ->paginate($perPage);
    }

    /**
     * Bildirim sayısını getir
     */
    public function getUnreadCount(int $userId): int
    {
        return Notification::where('user_id', $userId)
                          ->where('is_read', false)
                          ->count();
    }
}