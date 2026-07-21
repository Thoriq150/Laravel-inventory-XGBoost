@extends('layouts.landing.master', ['title' => $category->nama_kategori])

@section('content')

<div class="container mx-auto px-4 py-8">

    {{-- Header --}}
    <div class="bg-gradient-to-r from-sky-700 to-blue-800 rounded-2xl p-8 text-white mb-8 shadow-lg">

        <p class="uppercase tracking-widest text-sm text-sky-200">
            Kategori Barang
        </p>

        <h1 class="text-4xl font-bold mt-2">
            {{ $category->nama_kategori }}
        </h1>

        <p class="mt-3 text-sky-100">
            Menampilkan seluruh produk yang termasuk dalam kategori
            <b>{{ $category->nama_kategori }}</b>.
        </p>

        <div class="mt-5">

            <span class="bg-white/20 px-4 py-2 rounded-full text-sm">

                {{ $products->count() }} Produk

            </span>

        </div>

    </div>


    {{-- List Produk --}}

    @if($products->count())

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($products as $product)

        <div class="bg-white rounded-2xl border shadow hover:shadow-xl transition duration-300 overflow-hidden">

            <img
                src="{{ asset($product->image ?? 'default.jpg') }}"
                class="w-full h-52 object-cover">

            <div class="p-5">

                <div class="flex justify-between items-center mb-3">

                    <span class="text-xs bg-sky-100 text-sky-700 px-3 py-1 rounded-full">

                        {{ $product->kategori->nama_kategori }}

                    </span>

                    @if($product->stok > 0)

                        <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full">

                            Stok {{ $product->stok }}

                        </span>

                    @else

                        <span class="text-xs bg-red-100 text-red-700 px-3 py-1 rounded-full">

                            Habis

                        </span>

                    @endif

                </div>

                <h2 class="font-semibold text-lg text-gray-800">

                    {{ $product->nama_barang }}

                </h2>

                <p class="text-gray-500 text-sm mt-2">

                    Supplier :

                    <span class="font-medium">

                        {{ $product->supplier->nama_supplier ?? '-' }}

                    </span>

                </p>

                <div class="mt-5">

                    <a href="{{ route('product.show',$product->barang_id) }}"
                       class="block w-full bg-sky-700 hover:bg-sky-800 text-center text-white py-2 rounded-lg">

                        Lihat Detail

                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    @else

    <div class="bg-white rounded-xl shadow border p-12 text-center">

        <h2 class="text-xl font-semibold text-gray-700">

            Belum ada produk

        </h2>

        <p class="text-gray-500 mt-2">

            Tidak ada produk pada kategori ini.

        </p>

    </div>

    @endif

</div>

@endsection