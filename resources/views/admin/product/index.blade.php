@extends('layouts.master', ['title' => 'Barang'])

@section('content')
<x-container>
    <div class="col-12">

        
            <x-button-link
                title="Tambah Barang"
                icon="plus"
                class="btn btn-primary mb-3"
                style="mr-1"
                :url="route('admin.product.create')" />
        

        <x-card title="DAFTAR BARANG" class="card-body p-0">
            <x-table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Nama Barang</th>
                        <th>Supplier</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga</th>
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
                                    style="background-image: url({{ $product->image ? asset($product->image) : 'https://via.placeholder.com/100' }})">
                                </span>
                            </td>

                            <td>{{ $product->nama_barang }}</td>

                            <td>
                                {{ $product->supplier->nama_supplier ?? '-' }}
                            </td>

                            <td>
                                {{ $product->kategori->nama_kategori ?? '-' }}
                            </td>

                            <td>{{ $product->satuan }}</td>

                            <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>

                            <td>{{ $product->stok }}</td>

                            <td>
                                
                                    <x-button-link
                                        title=""
                                        icon="edit"
                                        class="btn btn-info btn-sm"
                                        :url="route('admin.product.edit', $product->barang_id)"
                                        style="" />
                                

                                
                                    <x-button-delete
                                        :id="$product->barang_id"
                                        :url="route('admin.product.destroy', $product->barang_id)"
                                        title="Hapus"
                                        class="btn btn-danger btn-sm" />
                                
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
