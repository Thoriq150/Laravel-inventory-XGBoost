@extends('layouts.master', ['title' => 'Supplier'])

@section('content')
<x-container>

    <div class="col-12 col-lg-8">
        <x-card title="DAFTAR SUPPLIER" class="card-body p-0">
            <x-table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Supplier</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($suppliers as $i => $supplier)
                        <tr>
                            <td>{{ $i + $suppliers->firstItem() }}</td>
                            <td>{{ $supplier->nama_supplier }}</td>
                            <td>{{ $supplier->kontak }}</td>
                            <td>{{ $supplier->alamat }}</td>

                            <td>
                                
                                    <x-button-modal
                                        :id="$supplier->supplier_id"
                                        title=""
                                        icon="edit"
                                        style=""
                                        class="btn btn-info btn-sm"
                                    />

                                    <x-modal
                                        :id="$supplier->supplier_id"
                                        title="Edit - {{ $supplier->nama_supplier }}"
                                    >
                                        <form action="{{ route('admin.supplier.update', $supplier->supplier_id) }}"
                                            method="POST">

                                            @csrf
                                            @method('PUT')

                                            <x-input
                                                name="nama_supplier"
                                                type="text"
                                                title="Nama Supplier"
                                                placeholder="Nama Supplier"
                                                :value="$supplier->nama_supplier"
                                            />

                                            <x-input
                                                name="kontak"
                                                type="text"
                                                title="Telp Supplier"
                                                placeholder="Telp Supplier"
                                                :value="$supplier->kontak"
                                            />

                                            <x-input
                                                name="alamat"
                                                type="text"
                                                title="Alamat Supplier"
                                                placeholder="Alamat Supplier"
                                                :value="$supplier->alamat"
                                            />

                                            <x-button-save
                                                title="Simpan"
                                                icon="save"
                                                class="btn btn-primary"
                                            />
                                        </form>
                                    </x-modal>
                                

                                
                                    <x-button-delete
                                        :id="$supplier->supplier_id"
                                        :url="route('admin.supplier.destroy', $supplier->supplier_id)"
                                        title="Hapus"
                                        class="btn btn-danger btn-sm"
                                    />
                                
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
                        {{ $suppliers->firstItem() ?? 0 }}
                        -
                        {{ $suppliers->lastItem() ?? 0 }}
                        dari
                        {{ $suppliers->total() }}
                        data

                    </small>

                    {{ $suppliers->links() }}

                </div>

            </div>
        </x-card>
    </div>

    
        <div class="col-12 col-lg-4">
            <x-card title="TAMBAH SUPPLIER" class="card-body">

                <form action="{{ route('admin.supplier.store') }}" method="POST">
                    @csrf

                    <x-input
                        name="nama_supplier"
                        type="text"
                        title="Nama Supplier"
                        placeholder="Nama Supplier"
                        :value="old('nama_supplier')"
                    />

                    <x-input
                        name="kontak"
                        type="text"
                        title="Telp Supplier"
                        placeholder="Telp Supplier"
                        :value="old('kontak')"
                    />

                    <x-input
                        name="alamat"
                        type="text"
                        title="Alamat Supplier"
                        placeholder="Alamat Supplier"
                        :value="old('alamat')"
                    />

                    <x-button-save
                        title="Simpan"
                        icon="save"
                        class="btn btn-primary"
                    />
                </form>

            </x-card>
        </div>
   

</x-container>
@endsection