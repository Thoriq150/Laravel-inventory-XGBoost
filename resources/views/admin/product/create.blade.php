@extends('layouts.master', ['title' => 'Tambah Barang'])

@section('content')
<x-container>
    <div class="row">
        <div class="col-12">

            <x-card title="TAMBAH BARANG" class="card-body">

                <form action="{{ route('admin.product.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <x-input
                        name="nama_barang"
                        type="text"
                        title="Nama Barang"
                        placeholder="Nama Barang"
                        :value="old('nama_barang')" />

                    <div class="row">

                        <div class="col-6">
                            <x-select title="Kategori" name="kategori_id">
                                <option value="">Pilih Kategori</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->kategori_id }}">
                                        {{ $category->nama_kategori }}
                                    </option>
                                @endforeach
                            </x-select>
                        </div>

                        <div class="col-6">
                            <x-select title="Supplier" name="supplier_id">
                                <option value="">Pilih Supplier</option>

                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->supplier_id }}">
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
                                :value="old('stok')" />
                        </div>

                        <div class="col-4">
                            <x-input
                                name="satuan"
                                type="text"
                                title="Satuan"
                                placeholder="PCS / Box / Unit"
                                :value="old('satuan')" />
                        </div>

                        <div class="col-4">
                            <x-input
                                name="harga"
                                type="number"
                                title="Harga"
                                placeholder="Harga Barang"
                                :value="old('harga')" />
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
