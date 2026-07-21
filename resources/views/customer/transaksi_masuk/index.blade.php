@extends('layouts.master', ['title' => 'Transaksi Barang Masuk'])

@section('content')

<x-container>

<div class="col-12">

    <div class="mb-3">

        <a href="{{ route('customer.transaksi-masuk.create') }}"
            class="btn btn-primary">

            Tambah Barang Masuk

        </a>

    </div>

    <x-card title="DAFTAR BARANG MASUK" class="card-body p-0">

        <x-table>

            <thead>

                <tr>

                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>

                </tr>

            </thead>

            <tbody>

            @forelse ($transaksiMasuk as $i => $item)

                <tr>

                    <td>
                        {{ $i + $transaksiMasuk->firstItem() }}
                    </td>

                    <td>
                        {{ $item->transaksiMasuk->tanggal }}
                    </td>

                    <td>
                        {{ $item->barang->nama_barang }}
                    </td>

                    <td>
                        {{ number_format($item->jumlah) }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center">

                        Belum ada data transaksi masuk

                    </td>

                </tr>

            @endforelse

            </tbody>

        </x-table>

    </x-card>

    <div class="d-flex justify-content-end mt-3">

        {{ $transaksiMasuk->links() }}

    </div>

</div>

</x-container>

@endsection