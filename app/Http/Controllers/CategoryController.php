<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Menampilkan seluruh kategori.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::withCount('products')
            ->when($search, function ($query) use ($search) {
                $query->where('nama_kategori', 'like', '%' . $search . '%');
            })
            ->orderBy('nama_kategori')
            ->get();

        return view('landing.category.index', compact(
            'categories',
            'search'
        ));
    }

    /**
     * Menampilkan seluruh barang berdasarkan kategori.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        $products = Product::with([
                'kategori',
                'supplier'
            ])
            ->where('kategori_id', $category->kategori_id)
            ->orderBy('nama_barang')
            ->get();

        return view('landing.category.show', compact(
            'category',
            'products'
        ));
    }
}