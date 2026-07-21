@extends('layouts.landing.master', ['title' => 'Daftar Barang'])

@section('content')

<div class="w-full py-8 px-4">

    <div class="container mx-auto">

        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">

            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    Daftar Barang
                </h1>

                <p class="text-gray-500 text-sm">
                    Informasi seluruh barang yang tersedia pada sistem inventori.
                </p>
            </div>

            <form action="{{ route('product.index') }}" method="GET">

                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Cari barang..."
                    class="border rounded-lg px-4 py-2 w-full md:w-72 focus:outline-none focus:ring-2 focus:ring-sky-700">

            </form>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($products as $product)

                <div class="bg-white rounded-xl shadow border overflow-hidden hover:shadow-lg transition duration-300">

                    <img
                        src="{{ asset($product->image ?? 'default.jpg') }}"
                        class="w-full h-52 object-cover">

                    <div class="p-5">

                        <div class="flex justify-between items-start">

                            <div>

                                <h2 class="font-semibold text-lg text-gray-800">

                                    {{ $product->nama_barang }}

                                </h2>

                                <p class="text-sm text-gray-500">

                                    {{ $product->kategori->nama_kategori }}

                                </p>

                            </div>

                            @if($product->stok > 0)

                                <span class="bg-green-600 text-white text-xs px-3 py-1 rounded-full">

                                    Tersedia

                                </span>

                            @else

                                <span class="bg-red-600 text-white text-xs px-3 py-1 rounded-full">

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

                                <span>Stok</span>

                                <span class="font-semibold text-sky-700">

                                    {{ number_format($product->stok) }}

                                </span>

                            </div>

                        </div>

                        <div class="mt-5">

                            <a
                                href="{{ route('product.show',$product->barang_id) }}"
                                class="block w-full bg-sky-700 hover:bg-sky-800 text-white text-center py-2 rounded-lg">

                                Lihat Detail

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-span-3">

                    <div class="bg-white rounded-xl border p-8 text-center text-gray-500">

                        Data barang belum tersedia.

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection