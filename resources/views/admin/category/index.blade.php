@extends('layouts.master', ['title' => 'Kategori'])

@section('content')
    <x-container>
        <div class="col-12 col-lg-8">
            <form action="{{ route('admin.category.index') }}" method="GET">
                <x-search name="search" :value="$search" />
            </form>

            <x-card title="DAFTAR KATEGORI" class="card-body p-0">
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $i => $category)
                            <tr>
                                <td>{{ $i + $categories->firstItem() }}</td>

                                <td>{{ $category->nama_kategori }}</td>

                                <td>
                                    
                                        <x-button-modal
                                            :id="$category->kategori_id"
                                            title=""
                                            icon="edit"
                                            style=""
                                            class="btn btn-info btn-sm" />

                                        <x-modal
                                            :id="$category->kategori_id"
                                            title="Edit - {{ $category->nama_kategori }}">

                                            <form action="{{ route('admin.category.update', $category->kategori_id) }}"
                                                method="POST">

                                                @csrf
                                                @method('PUT')

                                                <x-input
                                                    name="name"
                                                    type="text"
                                                    title="Nama Kategori"
                                                    placeholder="Nama Kategori"
                                                    :value="$category->nama_kategori" />

                                                <x-button-save
                                                    title="Simpan"
                                                    icon="save"
                                                    class="btn btn-primary" />
                                            </form>
                                        </x-modal>
                                    

                                    
                                        <x-button-delete
                                            :id="$category->kategori_id"
                                            :url="route('admin.category.destroy', $category->kategori_id)"
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
                        {{ $categories->firstItem() ?? 0 }}
                        -
                        {{ $categories->lastItem() ?? 0 }}
                        dari
                        {{ $categories->total() }}
                        data

                    </small>

                    {{ $categories->links() }}

                </div>

            </div>
            </x-card>
        </div>

        
            <div class="col-12 col-lg-4">
                <x-card title="TAMBAH KATEGORI" class="card-body">
                    <form action="{{ route('admin.category.store') }}" method="POST">
                        @csrf

                        <x-input
                            name="name"
                            type="text"
                            title="Nama Kategori"
                            placeholder="Nama Kategori"
                            :value="old('name')" />

                        <x-button-save
                            title="Simpan"
                            icon="save"
                            class="btn btn-primary" />
                    </form>
                </x-card>
            </div>
        
    </x-container>
@endsection