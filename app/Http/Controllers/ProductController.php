<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan seluruh barang.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::with([
                'kategori',
                'supplier'
            ])
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('nama_barang', 'like', '%' . $search . '%')
                      ->orWhereHas('kategori', function ($kategori) use ($search) {

                          $kategori->where(
                              'nama_kategori',
                              'like',
                              '%' . $search . '%'
                          );

                      });

                });

            })
            ->orderBy('nama_barang')
            ->paginate(12);

        return view('landing.product.index', compact(
            'products',
            'search'
        ));
    }

    /**
     * Detail barang.
     */
    public function show($id)
    {
        $product = Product::with([
                'kategori',
                'supplier'
            ])
            ->findOrFail($id);

        $products = Product::with([
                'kategori',
                'supplier'
            ])
            ->where('kategori_id', $product->kategori_id)
            ->where('barang_id', '!=', $product->barang_id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('landing.product.show', compact(
            'product',
            'products'
        ));
    }
}