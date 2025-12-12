<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'satici') {
            $orders = Order::with(['product', 'buyer'])
                          ->where('seller_id', Auth::id())
                          ->latest()
                          ->paginate(10);
        } else {
            $orders = Order::with(['product', 'product.seller'])
                          ->where('buyer_id', Auth::id())
                          ->latest()
                          ->paginate(10);
        }
        
        return view('dashboard.orders.index', compact('orders'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'alici') {
            abort(403);
        }

        $products = Product::with(['seller', 'category'])
                          ->where('seller_id', '!=', Auth::id())
                          ->get();
        
        return view('dashboard.buyer.create', compact('products'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'alici') {
            abort(403);
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::with('seller')->findOrFail($request->product_id);

        if ($product->seller_id === Auth::id()) {
            return back()->with('error', 'Kendi ürününüzü sipariş edemezsiniz!');
        }

        $order = Order::create([
            'product_id' => $request->product_id,
            'buyer_id' => Auth::id(),
            'seller_id' => $product->seller_id,
            'quantity' => $request->quantity,
            'total_price' => $product->price * $request->quantity,
            'status' => 'pending'
        ]);

        $this->sendNotificationToSeller($order, $product);

        return redirect()->route('dashboard-buyer')
                        ->with('success', 'Siparişiniz başarıyla oluşturuldu!');
    }

    private function sendNotificationToSeller($order, $product)
    {
        \Log::info('Bildirim gönderiliyor', [
            'seller_id' => $order->seller_id,
            'order_id' => $order->id
        ]);

        try {
            DB::table('notifications')->insert([
                'user_id' => $order->seller_id,
                'type' => 'new_order',
                'title' => 'Yeni Sipariş! 🎉',
                'message' => $product->name . ' ürününüzden ' . $order->quantity . ' adet sipariş alındı.',
                'data' => json_encode([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'buyer_name' => Auth::user()->name,
                    'quantity' => $order->quantity,
                    'total_price' => $order->total_price,
                    'created_at' => now()->format('d.m.Y H:i')
                ]),
                'is_read' => false,
                'action_url' => route('orders.show', $order->id),
                'icon' => 'shopping-bag',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            \Log::info('Bildirim başarıyla oluşturuldu');

            // Email gönderimi
            $seller = User::find($order->seller_id);
            if ($seller && $seller->email) {
                Mail::send('emails.new_order', [
                    'order' => $order,
                    'product' => $product,
                    'buyer' => Auth::user()
                ], function ($message) use ($seller, $order) {
                    $message->to($seller->email)
                           ->subject('Yeni Siparişiniz Var! #' . $order->id);
                });
                \Log::info('Email gönderildi', ['email' => $seller->email]);
            }
        } catch (\Exception $e) {
            \Log::error('Bildirim hatası: ' . $e->getMessage());
        }
    }

    public function show(Order $order)
    {
        if ($order->buyer_id !== Auth::id() && $order->seller_id !== Auth::id()) {
            abort(403);
        }

        $order->load(['product', 'buyer', 'seller']);
        
        return view('dashboard.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        if ($order->buyer_id !== Auth::id() || $order->status !== 'pending') {
            abort(403);
        }

        $products = Product::with(['seller', 'category'])
                          ->where('seller_id', '!=', Auth::id())
                          ->get();
        
        return view('dashboard.orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        if ($order->buyer_id !== Auth::id() || $order->status !== 'pending') {
            abort(403);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $order->update([
            'quantity' => $request->quantity,
            'total_price' => $order->product->price * $request->quantity
        ]);

        return redirect()->route('dashboard-buyer')
                        ->with('success', 'Sipariş başarıyla güncellendi!');
    }

    public function destroy(Order $order)
    {
        if ($order->buyer_id !== Auth::id() || $order->status !== 'pending') {
            abort(403);
        }

        $order->delete();

        return redirect()->route('dashboard-buyer')
                        ->with('success', 'Sipariş başarıyla silindi!');
    }

    public function updateStatus(Request $request, Order $order)
    {
        if ($order->seller_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:pending,confirmed,shipped,delivered,cancelled'
        ]);

        $oldStatus = $order->status;
        $order->update(['status' => $request->status]);

        if ($oldStatus !== $request->status) {
            $this->sendNotificationToBuyer($order, $request->status);
        }

        return back()->with('success', 'Sipariş durumu güncellendi!');
    }

    private function sendNotificationToBuyer($order, $newStatus)
    {
        $statusMessages = [
            'confirmed' => 'Siparişiniz onaylandı! ✅',
            'shipped' => 'Siparişiniz kargoya verildi! 🚚',
            'delivered' => 'Siparişiniz teslim edildi! 🎁',
            'cancelled' => 'Siparişiniz iptal edildi! ❌'
        ];

        if (isset($statusMessages[$newStatus])) {
            try {
                DB::table('notifications')->insert([
                    'user_id' => $order->buyer_id,
                    'type' => 'order_status_update',
                    'title' => 'Sipariş Durumu Güncellendi',
                    'message' => $order->product->name . ' ürününüzün durumu: ' . $statusMessages[$newStatus],
                    'data' => json_encode([
                        'order_id' => $order->id,
                        'product_id' => $order->product_id,
                        'old_status' => $order->getOriginal('status'),
                        'new_status' => $newStatus,
                        'updated_at' => now()->format('d.m.Y H:i')
                    ]),
                    'is_read' => false,
                    'action_url' => route('orders.show', $order->id),
                    'icon' => 'truck',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } catch (\Exception $e) {
                \Log::error('Alıcı bildirim hatası: ' . $e->getMessage());
            }
        }
    }

    public function sellerOrders()
    {
        if (Auth::user()->role !== 'satici') {
            abort(403);
        }

        $orders = Order::with(['product', 'buyer'])
                      ->where('seller_id', Auth::id())
                      ->latest()
                      ->paginate(10);
        
        return view('dashboard.seller.orders', compact('orders'));
    }

    // SATICI DASHBOARD METHODU - TAMAMEN DÜZENLENDİ
    public function sellerDashboard()
    {
        \Log::info('sellerDashboard methodu çağrıldı', ['user_id' => Auth::id()]);

        if (Auth::user()->role !== 'satici') {
            abort(403);
        }

        try {
            $sellerId = Auth::id();
            
            // İstatistikleri hesapla
            $totalOrders = Order::where('seller_id', $sellerId)->count();
            $pendingOrders = Order::where('seller_id', $sellerId)
                                 ->where('status', 'pending')
                                 ->count();
            $totalProducts = Product::where('user_id', $sellerId)->count();
            
            // Son siparişler
            $recentOrders = Order::with(['product', 'buyer'])
                                ->where('seller_id', $sellerId)
                                ->latest()
                                ->take(5)
                                ->get();

            // Toplam ciro hesapla
            $totalRevenue = Order::where('seller_id', $sellerId)
                                ->where('status', '!=', 'cancelled')
                                ->sum('total_price');

            \Log::info('Dashboard verileri hazır', [
                'totalOrders' => $totalOrders,
                'totalProducts' => $totalProducts,
                'totalRevenue' => $totalRevenue
            ]);

            return view('dashboard.seller.dashboard', compact(
                'totalOrders',
                'pendingOrders', 
                'totalProducts',
                'recentOrders',
                'totalRevenue'
            ));

        } catch (\Exception $e) {
            \Log::error('Dashboard hatası: ' . $e->getMessage());
            return back()->with('error', 'Dashboard yüklenirken bir hata oluştu: ' . $e->getMessage());
        }
    }

    // BİLDİRİM METHODLARI
    public function getNotifications()
    {
        try {
            $notifications = DB::table('notifications')
                             ->where('user_id', Auth::id())
                             ->latest()
                             ->take(10)
                             ->get();

            $unreadCount = DB::table('notifications')
                            ->where('user_id', Auth::id())
                            ->where('is_read', false)
                            ->count();

            return response()->json([
                'notifications' => $notifications,
                'unread_count' => $unreadCount
            ]);
        } catch (\Exception $e) {
            \Log::error('Bildirim getirme hatası: ' . $e->getMessage());
            return response()->json([
                'notifications' => [],
                'unread_count' => 0
            ]);
        }
    }

    public function markAsRead($id)
    {
        try {
            DB::table('notifications')
              ->where('user_id', Auth::id())
              ->where('id', $id)
              ->update(['is_read' => true]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error('Bildirim okundu işaretleme hatası: ' . $e->getMessage());
            return response()->json(['success' => false], 500);
        }
    }

    public function markAllAsRead()
    {
        try {
            DB::table('notifications')
              ->where('user_id', Auth::id())
              ->where('is_read', false)
              ->update(['is_read' => true]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error('Tüm bildirimleri okundu işaretleme hatası: ' . $e->getMessage());
            return response()->json(['success' => false], 500);
        }
    }

    // TÜM BİLDİRİMLERİ LİSTELEME SAYFASI
    public function notificationIndex()
    {
        $notifications = DB::table('notifications')
                          ->where('user_id', Auth::id())
                          ->latest()
                          ->paginate(20);

        return view('dashboard.notifications.index', compact('notifications'));
    }

    // TÜM BİLDİRİMLERİ TEMİZLE
    public function clearAll()
    {
        try {
            DB::table('notifications')
              ->where('user_id', Auth::id())
              ->delete();

            return back()->with('success', 'Tüm bildirimler temizlendi!');
        } catch (\Exception $e) {
            \Log::error('Bildirim temizleme hatası: ' . $e->getMessage());
            return back()->with('error', 'Bildirimler temizlenirken bir hata oluştu!');
        }
    }
}