@extends('layouts.master', ['title' => 'Stok'])

@section('content')
    <x-container>
        <div class="col-12">
            <x-card title="DAFTAR BARANG" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nama Barang</th>
                            <th>Nama Supplier</th>
                            <th>Kategori Barang</th>
                            <th>Satuan</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $i => $product)
                            <tr>

                                <td>{{ $i + $products->firstItem() }}</td>

                                <td>
                                    <span class="avatar rounded avatar-md"
    style="background-image: url('{{ asset($product->image ?? 'default.jpg') }}')">
</span>
                                </td>

                                <td>{{ $product->nama_barang }}</td>

                                <td>{{ $product->supplier->nama_supplier ?? '-' }}</td>

                                <td>{{ $product->kategori->nama_kategori ?? '-' }}</td>

                                <td>{{ $product->satuan }}</td>

                                <td>{{ $product->stok }}</td>

                                <td>

                                    <x-button-modal
                                        :id="$product->barang_id"
                                        icon="plus"
                                        style="mr-1"
                                        title="Stok"
                                        class="btn bg-teal btn-sm text-white"
                                    />

                                    <x-modal
                                        :id="$product->barang_id"
                                        title="Tambah Stok Barang - {{ $product->nama_barang }}"
                                    >

                                        <form
                                            action="{{ route('admin.stock.update', $product->barang_id) }}"
                                            method="POST"
                                            enctype="multipart/form-data"
                                        >

                                            @csrf
                                            @method('PUT')

                                            <x-input
                                                title="Stok Barang"
                                                name="stok"
                                                type="number"
                                                min="1"
                                                placeholder="Stok Barang"
                                                :value="$product->stok"
                                            />

                                            <x-button-save
                                                title="Simpan"
                                                icon="save"
                                                class="btn btn-primary"
                                            />

                                        </form>

                                    </x-modal>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    
                </x-table>
                {{-- FOOTER --}}
            <div class="card-footer">

                <div class="d-flex justify-content-between align-items-center flex-wrap">

                    <small class="text-muted">

                        Menampilkan
                        {{ $products->firstItem() ?? 0 }}
                        -
                        {{ $products->lastItem() ?? 0 }}
                        dari
                        {{ $products->total() }}
                        data

                    </small>

                    {{ $products->links() }}

                </div>

            </div>
            </x-card>
        </div>
    </x-container>
@endsection