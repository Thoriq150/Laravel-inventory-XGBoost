@extends('layouts.landing.master', ['title' => 'Homepage'])

@section('content')

@include('layouts.landing.hero')

<div class="w-full py-8 px-4">

    <div class="container mx-auto">

        <div class="grid lg:grid-cols-12 gap-8">

            {{-- LIST BARANG --}}
            <div class="lg:col-span-8">

                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">

                    <div>

                        <h2 class="text-2xl font-bold text-gray-700">
                            Daftar Barang
                        </h2>

                        <p class="text-gray-500 text-sm">
                            Informasi stok barang yang tersedia pada sistem inventori.
                        </p>

                    </div>

                    <form action="{{ route('product.index') }}" method="GET">

                        <input
                            type="text"
                            name="search"
                            value="{{ $search }}"
                            placeholder="Cari barang..."
                            class="border rounded-lg px-4 py-2 w-full md:w-72 focus:ring-2 focus:ring-sky-700 focus:outline-none">

                    </form>

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    @foreach($products as $product)

                        <div class="bg-white rounded-xl shadow border overflow-hidden hover:shadow-lg duration-300">

                            <img
                                src="{{ asset($product->image ?? 'default.jpg') }}"
                                class="w-full h-52 object-cover">

                            <div class="p-5">

                                <div class="flex justify-between items-start">

                                    <div>

                                        <a href="{{ route('product.show',$product->barang_id) }}"
                                           class="font-semibold text-lg text-gray-700 hover:text-sky-700">

                                            {{ $product->nama_barang }}

                                        </a>

                                        <p class="text-sm text-gray-500 mt-1">

                                            {{ $product->kategori->nama_kategori }}

                                        </p>

                                    </div>

                                    @if($product->stok>0)

                                        <span class="bg-green-600 text-white px-3 py-1 rounded-full text-xs">

                                            Tersedia

                                        </span>

                                    @else

                                        <span class="bg-red-600 text-white px-3 py-1 rounded-full text-xs">

                                            Habis

                                        </span>

                                    @endif

                                </div>

                                <hr class="my-4">

                                <div class="space-y-2 text-sm text-gray-600">

                                    <div class="flex justify-between">

                                        <span>Supplier</span>

                                        <span class="font-medium">

                                            {{ $product->supplier->nama_supplier }}

                                        </span>

                                    </div>

                                    <div class="flex justify-between">

                                        <span>Stok Saat Ini</span>

                                        <span class="font-semibold text-sky-700">

                                            {{ number_format($product->stok) }}

                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

                @if($products->count() >= 6)

                    <div class="text-center mt-8">

                        <a href="{{ route('product.index') }}"
                           class="inline-block bg-sky-700 hover:bg-sky-800 text-white px-6 py-3 rounded-lg">

                            Lihat Semua Barang

                        </a>

                    </div>

                @endif

            </div>

            {{-- SIDEBAR KATEGORI --}}
            <div class="lg:col-span-4">

                <div class="bg-white rounded-xl shadow border">

                    <div class="p-5 border-b">

                        <h2 class="font-bold text-lg text-gray-700">

                            Daftar Kategori

                        </h2>

                        <p class="text-sm text-gray-500">

                            Pilih kategori barang.

                        </p>

                    </div>

                    <div class="p-4 space-y-3">

                        @foreach($categories as $category)

                            <a
                                href="{{ route('category.show',$category->kategori_id) }}"
                                class="flex justify-between items-center p-3 rounded-lg border hover:bg-sky-700 hover:text-white duration-300">

                                <span>

                                    {{ $category->nama_kategori }}

                                </span>

                                <span class="text-xs">

                                    {{ $category->products_count ?? $category->products->count() }}

                                    Barang

                                </span>

                            </a>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection