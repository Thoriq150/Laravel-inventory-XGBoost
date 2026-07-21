@extends('layouts.master', ['title' => 'Laporan Saya'])

@section('content')

<x-container><div class="col-12">

    <form action="{{ route('customer.report.index') }}" method="GET">

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

                <x-button-save
                    title="Cari Data"
                    icon="search"
                    class="btn btn-primary w-100"
                />

            </div>

        </div>

    </form>

</div>

@if(isset($fromDate) && isset($toDate))

{{-- Statistik Customer --}}

<div class="row my-3">

    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <h6>Total Transaksi</h6>

                <h3>{{ $jumlahTransaksi }}</h3>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <h6>Total Barang Dibeli</h6>

                <h3>{{ number_format($totalBarang) }}</h3>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-body text-center">

                <h6>Total Pembelian</h6>

                <h3>Rp {{ number_format($totalPembelian, 0, ',', '.') }}</h3>

            </div>

        </div>

    </div>

</div>

{{-- Riwayat Pembelian --}}

<div class="col-12 my-3">

    <x-card title="RIWAYAT PEMBELIAN SAYA" class="card-body p-0">

        <x-table>

            <thead>

                <tr>

                    <th>Tanggal</th>

                    <th>Jumlah Item</th>

                    <th>Total Pembelian</th>

                    <th>Detail Barang</th>

                </tr>

            </thead>

            <tbody>

                @forelse($transaksiKeluar as $transaksi)

                    <tr>

                        <td>{{ $transaksi->tanggal }}</td>

                        <td>{{ $transaksi->details->count() }} Item</td>

                        <td>
                            Rp {{ number_format($transaksi->total_jumlah, 0, ',', '.') }}
                        </td>

                        <td>

                            @foreach($transaksi->details as $detail)

                                <span class="badge bg-primary">

                                    {{ $detail->barang->nama_barang ?? '-' }}
                                    ({{ $detail->jumlah }})

                                </span>

                            @endforeach

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center">

                            Tidak ada data transaksi

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </x-table>

    </x-card>

</div>

@endif

</x-container>@endsection