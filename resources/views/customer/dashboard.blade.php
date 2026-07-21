@extends('layouts.master', ['title' => 'Dashboard'])

@section('content')

<x-container>

    {{-- WIDGET --}}

    <div class="col-md-3">

        <x-widget
            title="Barang Masuk"
            :subTitle="$totalBarangMasuk"
            class="bg-success">

            <i class="fas fa-arrow-down"></i>

        </x-widget>

    </div>

    <div class="col-md-3">

        <x-widget
            title="Barang Keluar"
            :subTitle="$totalBarangKeluar"
            class="bg-danger">

            <i class="fas fa-arrow-up"></i>

        </x-widget>

    </div>

    <div class="col-md-3">

        <x-widget
            title="Transaksi Masuk"
            :subTitle="$totalTransaksiMasuk"
            class="bg-primary">

            <i class="fas fa-file-import"></i>

        </x-widget>

    </div>

    <div class="col-md-3">

        <x-widget
            title="Transaksi Keluar"
            :subTitle="$totalTransaksiKeluar"
            class="bg-warning">

            <i class="fas fa-file-export"></i>

        </x-widget>

    </div>


    {{-- STATUS PREDIKSI --}}

    <div class="col-md-6 mt-3">

        <x-widget
            title="Barang Warning"
            :subTitle="$warning"
            class="bg-yellow">

            <i class="fas fa-exclamation-triangle"></i>

        </x-widget>

    </div>

    <div class="col-md-6 mt-3">

        <x-widget
            title="Perlu Restock"
            :subTitle="$restock"
            class="bg-red">

            <i class="fas fa-box-open"></i>

        </x-widget>

    </div>


    {{-- RIWAYAT TRANSAKSI --}}

    <div class="col-12 mt-4">

        <x-card
            title="RIWAYAT TRANSAKSI TERAKHIR"
            class="card-body p-0">

            <x-table>

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Total Item</th>
                        <th>Total Barang</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($transactions as $i => $transaction)

                    <tr>

                        <td>{{ $i + 1 }}</td>

                        <td>{{ $transaction->tanggal }}</td>

                        <td>

                            {{ $transaction->details->count() }} Item

                        </td>

                        <td>

                            {{ number_format($transaction->total_jumlah) }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center">

                            Belum ada transaksi.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </x-table>

        </x-card>

    </div>


    {{-- HASIL PREDIKSI --}}

    <div class="col-12 mt-4">

        <x-card
            title="HASIL PREDIKSI STOK"
            class="card-body p-0">

            <x-table>

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Barang</th>
                        <th>Stok</th>
                        <th>Prediksi Terjual</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($prediksi as $i => $item)

                    <tr>

                        <td>{{ $i + 1 }}</td>

                        <td>{{ $item->nama_barang }}</td>

                        <td>{{ number_format($item->stok) }}</td>

                        <td>{{ number_format($item->hasil_prediksi) }}</td>

                        <td>

                            @if($item->status == 'Aman')

                                <span class="badge bg-success">

                                    Aman

                                </span>

                            @elseif($item->status == 'Warning')

                                <span class="badge bg-warning">

                                    Warning

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Restock

                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center">

                            Belum ada data prediksi.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </x-table>

        </x-card>

    </div>

</x-container>

@endsection