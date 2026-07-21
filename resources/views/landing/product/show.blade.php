@extends('layouts.landing.master', ['title' => 'Detail Barang'])

@section('content')

<div class="w-full py-8 px-4">

    <div class="container mx-auto">

        <div class="grid lg:grid-cols-2 gap-8">

            {{-- FOTO --}}
            <div class="bg-white rounded-xl shadow border p-5">

                <img
                    src="{{ asset($product->image ?? 'default.jpg') }}"
                    class="w-full h-[420px] object-cover rounded-lg">

            </div>

            {{-- DETAIL --}}
            <div class="bg-white rounded-xl shadow border p-6">

                <div class="flex justify-between items-start">

                    <div>

                        <p class="text-sm text-sky-700 font-medium">
                            {{ $product->kategori->nama_kategori }}
                        </p>

                        <h1 class="text-3xl font-bold text-gray-700 mt-2">
                            {{ $product->nama_barang }}
                        </h1>

                    </div>

                    @if($product->stok > 0)

                        <span class="bg-green-600 text-white px-4 py-2 rounded-full text-sm">
                            Tersedia
                        </span>

                    @else

                        <span class="bg-red-600 text-white px-4 py-2 rounded-full text-sm">
                            Stok Habis
                        </span>

                    @endif

                </div>

                <hr class="my-6">

                <h3 class="font-semibold text-gray-700 mb-4">
                    Informasi Barang
                </h3>

                <div class="space-y-4 text-gray-600">

                    <div class="flex justify-between">

                        <span>Kategori</span>

                        <span class="font-medium">
                            {{ $product->kategori->nama_kategori }}
                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span>Supplier</span>

                        <span class="font-medium">
                            {{ $product->supplier->nama_supplier }}
                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span>Alamat Supplier</span>

                        <span class="font-medium text-right">
                            {{ $product->supplier->alamat }}
                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span>No. Telepon</span>

                        <span class="font-medium">
                            {{ $product->supplier->telepon }}
                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span>Harga</span>

                        <span class="font-semibold text-sky-700">
                            Rp {{ number_format($product->harga,0,',','.') }}
                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span>Stok Saat Ini</span>

                        <span class="font-bold text-lg">
                            {{ number_format($product->stok) }}
                        </span>

                    </div>

                </div>

            </div>

        </div>

        {{-- PRODUK SERUPA --}}
        @if($products->count())

        <div class="mt-12">

            <div class="mb-6">

                <h2 class="text-2xl font-bold text-gray-700">
                    Barang Serupa
                </h2>

                <p class="text-gray-500 text-sm">
                    Barang lain dalam kategori yang sama.
                </p>

            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($products as $item)

                    <div class="bg-white rounded-xl shadow border overflow-hidden hover:shadow-lg duration-300">

                        <img
                            src="{{ asset($item->image ?? 'default.jpg') }}"
                            class="w-full h-48 object-cover">

                        <div class="p-5">

                            <div class="flex justify-between items-center">

                                <a href="{{ route('product.show',$item->barang_id) }}"
                                   class="font-semibold text-gray-700 hover:text-sky-700">

                                    {{ $item->nama_barang }}

                                </a>

                                @if($item->stok>0)

                                    <span class="text-xs bg-green-600 text-white px-2 py-1 rounded">

                                        Tersedia

                                    </span>

                                @else

                                    <span class="text-xs bg-red-600 text-white px-2 py-1 rounded">

                                        Habis

                                    </span>

                                @endif

                            </div>

                            <div class="mt-3 text-sm text-gray-600">

                                Supplier :
                                <span class="font-medium">

                                    {{ $item->supplier->nama_supplier }}

                                </span>

                            </div>

                            <div class="mt-2 flex justify-between">

                                <span>Stok</span>

                                <span class="font-semibold">

                                    {{ number_format($item->stok) }}

                                </span>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

        @endif

    </div>

</div>

@endsection