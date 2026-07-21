<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.stock.index', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $product = Product::findOrFail($id);

        // $product->update([
        //     'quantity' => $request->quantity,
        // ]);

        // return back()->with('toast_success', 'Berhasil Menambahkan Stok Produk');
        // dd($request->all(), $id);
      

 

    $request->validate([
        'stok' => 'required|integer|min:0'
    ]);

    $product = Product::findOrFail($id);

    $product->stok = $request->stok;
    $product->save();

    return redirect()
        ->route('admin.stock.index')
        ->with('toast_success', 'Berhasil menambahkan stok produk');

    }

    public function report()
    {
        $products = Product::paginate(10);

        return view('admin.stock.report', compact('products'));
    }
   
}
