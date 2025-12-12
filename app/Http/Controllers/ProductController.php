<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'satici') {
            $products = Product::where('seller_id', Auth::id())
                              ->with('category')
                              ->latest()
                              ->get();
        } else {
            $products = Product::with(['seller', 'category'])
                              ->latest()
                              ->get();
        }
        
        return view('dashboard.seller.dashboard', compact('products'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'satici') {
            abort(403);
        }

        $categories = Category::all();
        return view('dashboard.seller.create', compact('categories'));
    }

    public function store(Request $request)
    {
        \Log::info('=== ÜRÜN EKLEME BAŞLADI ===');
        \Log::info('Kullanıcı ID: ' . Auth::id());
        \Log::info('Kullanıcı Rol: ' . Auth::user()->role);
        \Log::info('Form Verileri:', $request->all());

        if (Auth::user()->role !== 'satici') {
            \Log::error('Kullanıcı satıcı değil! Rol: ' . Auth::user()->role);
            abort(403, 'Sadece satıcılar ürün ekleyebilir!');
        }

        // Mevcut kategorileri kontrol et
        $categories = Category::all();
        \Log::info('Mevcut kategoriler:', $categories->pluck('name', 'id')->toArray());

        // Validation
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            \Log::error('VALIDATION HATALARI:', $validator->errors()->toArray());
            return back()->withErrors($validator)->withInput();
        }

        \Log::info('Validation başarılı!');

        try {
            \Log::info('Ürün oluşturuluyor...');
            
            $product = Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'description' => $request->description,
                'seller_id' => Auth::id()
            ]);

            \Log::info('ÜRÜN BAŞARIYLA OLUŞTURULDU - ID: ' . $product->id);
            \Log::info('=== ÜRÜN EKLEME TAMAMLANDI ===');

            return redirect()->route('products.index')
                            ->with('success', 'Ürün başarıyla eklendi!');
                            
        } catch (\Exception $e) {
            \Log::error('ÜRÜN OLUŞTURMA HATASI: ' . $e->getMessage());
            return back()->with('error', 'Ürün eklenirken bir hata oluştu: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        
        if ($product->seller_id !== Auth::id()) {
            abort(403);
        }

        $categories = Category::all();
        return view('dashboard.seller.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        if ($product->seller_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string'
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                        ->with('success', 'Ürün başarıyla güncellendi!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        if ($product->seller_id !== Auth::id()) {
            abort(403);
        }

        $product->delete();

        return redirect()->route('products.index')
                        ->with('success', 'Ürün başarıyla silindi!');
    }
}