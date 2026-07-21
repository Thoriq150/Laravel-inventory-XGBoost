@extends('layouts.master', ['title' => 'Edit Barang'])

@section('content')
<x-container>
    <div class="row">
        <div class="col-12">

            <x-card title="EDIT BARANG" class="card-body">

                <form action="{{ route('admin.product.update', $product->barang_id) }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <x-input
                        name="nama_barang"
                        type="text"
                        title="Nama Barang"
                        placeholder="Nama Barang"
                        :value="$product->nama_barang" />

                    <div class="row">

                        <div class="col-6">
                            <x-select title="Kategori" name="kategori_id">

                                @foreach ($categories as $category)
                                    <option value="{{ $category->kategori_id }}"
                                        @selected($product->kategori_id == $category->kategori_id)>
                                        {{ $category->nama_kategori }}
                                    </option>
                                @endforeach

                            </x-select>
                        </div>

                        <div class="col-6">
                            <x-select title="Supplier" name="supplier_id">

                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->supplier_id }}"
                                        @selected($product->supplier_id == $supplier->supplier_id)>
                                        {{ $supplier->nama_supplier }}
                                    </option>
                                @endforeach

                            </x-select>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-4">
                            <x-input
                                name="stok"
                                type="number"
                                title="Stok"
                                placeholder="Stok"
                                :value="$product->stok" />
                        </div>

                        <div class="col-4">
                            <x-input
                                name="satuan"
                                type="text"
                                title="Satuan"
                                placeholder="Satuan"
                                :value="$product->satuan" />
                        </div>

                        <div class="col-4">
                            <x-input
                                name="harga"
                                type="number"
                                title="Harga"
                                placeholder="Harga"
                                :value="$product->harga" />
                        </div>

                    </div>

                    <x-input
                        name="image"
                        type="file"
                        title="Foto Barang"
                        placeholder="" />

                    <x-button-save
                        title="Simpan"
                        icon="save"
                        class="btn btn-primary" />

                    <x-button-link
                        title="Kembali"
                        icon="arrow-left"
                        :url="route('admin.product.index')"
                        class="btn btn-dark"
                        style="mr-1" />

                </form>

            </x-card>

        </div>
    </div>
</x-container>
@endsection
