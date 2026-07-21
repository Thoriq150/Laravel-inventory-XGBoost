@extends('layouts.master', ['title' => 'Transaksi Keluar'])

@section('content')

<x-container>

<div class="col-12">

    <div class="mb-3">

        <a href="{{ route('customer.transaksi-keluar.create') }}"
           class="btn btn-primary">

            Tambah Barang Keluar

        </a>

    </div>

</div>

<div class="row">

    <div class="col-md-6">

        <x-widget
            title="Total Transaksi"
            :subTitle="$grandTransaction"
            class="bg-primary"
        />

    </div>

    <div class="col-md-6">

        <x-widget
            title="Total Barang Keluar"
            :subTitle="$grandQuantity"
            class="bg-danger"
        />

    </div>

</div>

<div class="col-12 mt-3">

    <x-card title="Riwayat Barang Keluar" class="card-body p-0">

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

            @forelse($transaksiKeluar as $i => $item)

                <tr>

                    <td>

                        {{ $i + $transaksiKeluar->firstItem() }}

                    </td>

                    <td>

                        {{ $item->transaksiKeluar->tanggal }}

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

                        Belum ada data transaksi keluar

                    </td>

                </tr>

            @endforelse

            </tbody>

        </x-table>

    </x-card>

    <div class="d-flex justify-content-end mt-3">

        {{ $transaksiKeluar->links() }}

    </div>

</div>

</x-container>

@endsection
