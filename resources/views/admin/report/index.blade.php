@extends('layouts.master', ['title' => 'Laporan'])

@section('content')

<x-container><div class="col-12">

    <form action="{{ route('admin.report.index') }}" method="GET">

        <div class="row">

            <div class="col-md-5">

                <x-input
                    title="Tanggal Awal"
                    name="from"
                    type="date"
                    value="{{ $fromDate }}"
                />

            </div>

            <div class="col-md-5">

                <x-input
                    title="Tanggal Akhir"
                    name="to"
                    type="date"
                    value="{{ $toDate }}"
                />

            </div>

            <div class="col-md-2 d-flex align-items-end">

    <div class="w-100">

        <x-button-save
            title="Cari Data"
            icon="search"
            class="btn btn-primary w-100 mb-2"
        />

        @if(isset($fromDate) && isset($toDate))
            <button
                type="button"
                onclick="window.print()"
                class="btn btn-success w-100">
                <i class="fas fa-print"></i>
                Print Laporan
            </button>
        @endif

    </div>

</div>

        </div>

    </form>

</div>

@if(isset($fromDate) && isset($toDate))

{{-- STATISTIK --}}

<div class="row my-3">

    <div class="col-md-3">

        <div class="card">

            <div class="card-body text-center">

                <h6>Total Barang Masuk</h6>

                <h3>{{ number_format($totalMasuk) }}</h3>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card">

            <div class="card-body text-center">

                <h6>Total Barang Keluar</h6>

                <h3>{{ number_format($totalKeluar) }}</h3>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card">

            <div class="card-body text-center">

                <h6>Transaksi Masuk</h6>

                <h3>{{ $jumlahTransaksiMasuk }}</h3>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card">

            <div class="card-body text-center">

                <h6>Transaksi Keluar</h6>

                <h3>{{ $jumlahTransaksiKeluar }}</h3>

            </div>

        </div>

    </div>

</div>

{{-- TOP 10 BARANG TERLARIS --}}

<div class="col-12 my-3">

    <x-card title="TOP 10 BARANG TERLARIS" class="card-body p-0">

        <x-table>

            <thead>

                <tr>

                    <th>No</th>

                    <th>Nama Barang</th>

                    <th>Total Terjual</th>

                </tr>

            </thead>

            <tbody>

                @forelse($topBarang as $index => $barang)

                    <tr>

                        <td>{{ $index + 1 }}</td>

                        <td>{{ $barang->nama_barang }}</td>

                        <td>{{ number_format($barang->total_terjual) }}</td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="3" class="text-center">
                            Tidak ada data
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </x-table>

    </x-card>

</div>

{{-- LAPORAN BARANG MASUK --}}

<div class="col-12 my-3">

    <x-card title="LAPORAN BARANG MASUK" class="card-body p-0">

        <x-table>

            <thead>

                <tr>

                    <th>Tanggal</th>
                    <th>Total Item</th>
                    <th>Total Barang</th>
                    <th>User</th>
                    <th>Detail Barang</th>

                </tr>

            </thead>

            <tbody>

                @forelse ($transaksiMasuk as $masuk)

                    <tr>

    <td>{{ $masuk->tanggal }}</td>

    <td>
        {{ $masuk->details->count() }} Item
    </td>

    <td>
        {{ number_format($masuk->details->sum('jumlah')) }}
    </td>

    <td>
        {{ $masuk->user->name ?? '-' }}
    </td>

    <td>

        @foreach($masuk->details as $detail)

            • {{ $detail->barang->nama_barang }}
            ({{ $detail->jumlah }})

            @if(!$loop->last)
                <br>
            @endif

        @endforeach

    </td>

</tr>
                @empty

                    <tr>

                        <td colspan="5" class="text-center">

                            Tidak ada data

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </x-table>

    </x-card>

</div>

{{-- LAPORAN BARANG KELUAR --}}

<div class="col-12 my-3">

    <x-card title="LAPORAN BARANG KELUAR" class="card-body p-0">

        <x-table>

            <thead>

                <tr>

                    <th>Tanggal</th>

                    <th>Total Item</th>

                    <th>Total Jumlah</th>

                    <th>User</th>

                </tr>

            </thead>

            <tbody>

                @forelse ($transaksiKeluar as $keluar)

                    <tr>

                        <td>{{ $keluar->tanggal }}</td>

                        <td>{{ $keluar->details->count() }} Item</td>

                        <td>{{ number_format($keluar->total_jumlah) }}</td>

                        <td>{{ $keluar->user->name ?? '-' }}</td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center">
                            Tidak ada data
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </x-table>

    </x-card>

</div>

@endif

</x-container>@endsection