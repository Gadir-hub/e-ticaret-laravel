<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BuyerController extends Controller
{
    public function dashboard()
    {
        Log::info('=== BUYER DASHBOARD - ROL KONTROLÜ ===');
        
        $user = Auth::user();
        Log::info('Kullanıcı: ' . $user->name . ' - Rol: ' . $user->role);
        
        // Detaylı rol kontrolü
        if ($user->role !== 'alici') {
            Log::warning('ROL UYUŞMUYOR! Beklenen: alici, Mevcut: ' . $user->role);
            Log::warning('Kullanıcı ID: ' . $user->id . ', Email: ' . $user->email);
            abort(403, 'Bu sayfaya sadece alıcılar erişebilir. Mevcut rolünüz: ' . $user->role);
        }
        
        Log::info('Rol kontrolü başarılı, veriler yükleniyor...');

        try {
            $recentOrders = Order::with(['product', 'product.seller'])
                                ->where('buyer_id', $user->id)
                                ->latest()
                                ->take(5)
                                ->get();
            
            $products = Product::with(['seller', 'category'])
                              ->where('seller_id', '!=', $user->id)
                              ->latest()
                              ->take(8)
                              ->get();
            
            $categories = Category::withCount('products')->get();
            
            $totalOrders = Order::where('buyer_id', $user->id)->count();
            $pendingOrders = Order::where('buyer_id', $user->id)->where('status', 'pending')->count();
            $completedOrders = Order::where('buyer_id', $user->id)->where('status', 'delivered')->count();

            Log::info('Veriler başarıyla yüklendi - Dashboard gösteriliyor');

            return view('dashboard.buyer.dashboard', compact(
                'user',
                'recentOrders',
                'products',
                'categories',
                'totalOrders',
                'pendingOrders',
                'completedOrders'
            ));

        } catch (\Exception $e) {
            Log::error('Buyer dashboard hatası: ' . $e->getMessage());
            return back()->with('error', 'Sayfa yüklenirken hata oluştu.');
        }
    }
}