<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    
    public function create()
    {
        return view('categories.create');
    }
    
    public function store(Request $request)
    {
        // Basit validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'color' => 'nullable|string'
        ]);

        try {
            // Kategori oluştur
            Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'color' => $request->color ?? '#3B82F6'
            ]);

            return redirect()->route('categories.index')
                ->with('success', 'Kategori başarıyla oluşturuldu!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Kategori oluşturulurken hata: ' . $e->getMessage())
                ->withInput();
        }
    }
    
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'Kategori silindi!');
    }
}