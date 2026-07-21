@extends('layouts.master', ['title' => 'Prediksi Stok'])

@section('content')

<x-container>

    {{-- HEADER --}}
    <div class="page-header d-flex justify-content-between align-items-center">

        <div>
            <h2 class="page-title">
                Prediksi Stok Barang
            </h2>

            <div class="text-muted mt-1">
               Prediksi kebutuhan stok berdasarkan histori transaksi keluar menggunakan algoritma XGBoost.
            </div>
        </div>

    </div>

    {{-- BUTTON --}}
    <div class="row mb-3">

        <div class="col-12 text-end">

            <form action="{{ route('admin.prediksi.generate') }}"
                  method="POST"
                  class="d-inline">

                @csrf

                <button class="btn btn-success">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        width="18"
                        height="18"
                        fill="currentColor"
                        class="me-1">

                        <path d="M7 4v16l13-8z"/>

                    </svg>

                    Jalankan Prediksi

                </button>

            </form>

        </div>

    </div>

    {{-- RINGKASAN --}}
    <div class="row mb-4">

        <div class="col-md-3">

            <x-widget
                title="Total Barang"
                :subTitle="$totalBarang"
                class="bg-primary"/>

        </div>

        <div class="col-md-3">

            <x-widget
                title="Aman"
                :subTitle="$aman"
                class="bg-success"/>

        </div>

        <div class="col-md-3">

            <x-widget
                title="Mendekati Minimum"
                :subTitle="$warning"
                class="bg-warning"/>

        </div>

        <div class="col-md-3">

            <x-widget
                title="Restock"
                :subTitle="$restock"
                class="bg-danger"/>

        </div>

    </div>

    {{-- GRAFIK --}}
<div class="row mb-4">

    <div class="col-12">

        <x-card title="Grafik Perbandingan Stok Saat Ini dan Prediksi Kebutuhan Stok 30 Hari ke Depan">

            <div id="chart-prediksi" style="height:420px;"></div>

            <div class="text-muted small mt-3">
                Grafik membandingkan stok yang tersedia saat ini dengan estimasi kebutuhan barang
                selama 30 hari ke depan berdasarkan hasil prediksi algoritma XGBoost.
            </div>

        </x-card>

    </div>

</div>

    {{-- KETERANGAN --}}
    <div class="row mb-4">

        <div class="col-12">

            <x-card title="Keterangan Prediksi AI">

                <table class="table table-bordered">

                    <tr>

                        <td width="220">
                            <span class="badge bg-success">
                                Aman
                            </span>
                        </td>

                        <td>
                        Stok saat ini masih mencukupi untuk memenuhi estimasi kebutuhan barang selama 30 hari ke depan sehingga belum diperlukan penambahan stok.
                    </td>

                    </tr>

                    <tr>

                        <td>

                            <span class="badge bg-warning text-dark">
                                Mendekati Minimum
                            </span>

                        </td>

                        <td>
                           
                            Stok mulai mendekati estimasi kebutuhan barang selama 30 hari ke depan sehingga perlu dilakukan pemantauan.
                        </td>
                        

                    </tr>

                    <tr>

                        <td>

                            <span class="badge bg-danger">
                                Restock
                            </span>

                        </td>

                        <td>
                            Stok diperkirakan tidak mencukupi untuk memenuhi kebutuhan barang selama 30 hari ke depan sehingga disarankan segera melakukan restock.
                        </td>

                    </tr>

                    <tr>

                        <td>
                            Periode Prediksi
                        </td>

                        <td>
                            Prediksi dilakukan berdasarkan histori transaksi keluar harian, kemudian dikonversi menjadi estimasi kebutuhan barang selama 30 hari sebagai dasar pengambilan keputusan restock.
                        </td>

                    </tr>

                </table>

            </x-card>

        </div>

    </div>


   {{-- TABEL --}}
<div class="row">

    <div class="col-12">

        <x-card title="Hasil Prediksi">

            <div class="table-responsive">

                <table class="table table-striped table-hover table-vcenter">

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Nama Barang</th>
                            <th class="text-center">Stok Saat Ini</th>
                            <th class="text-center">Prediksi 30 Hari</th>
                            <th class="text-center">Batas Stok</th>
                            <th>Tanggal Prediksi</th>
                            <th class="text-center">Status</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse ($prediksi as $item)

                        <tr>

                            <td>
                                {{ $prediksi->firstItem() + $loop->index }}
                            </td>

                            <td>
                                {{ $item->nama_barang }}
                            </td>

                            <td class="text-center">

                                <span class="badge bg-secondary">

                                    {{ number_format($item->stok) }}

                                </span>

                            </td>

                            <td class="text-center">

                                <span class="badge bg-info">

                                    {{ number_format($item->prediksi_bulanan ) }}

                                </span>

                            </td>

                            <td class="text-center">

                                @if ($item->batas_stok > 0)

                                    <span class="badge bg-success">

                                        {{ number_format($item->batas_stok) }}

                                    </span>

                                @elseif ($item->batas_stok == 0)

                                    <span class="badge bg-warning text-dark">

                                        0

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        {{ number_format($item->batas_stok) }}

                                    </span>

                                @endif

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse($item->tanggal_prediksi)->format('d-m-Y H:i') }}

                            </td>

                            <td class="text-center">

                                @if ($item->status == 'Restock')

                                    <span class="badge bg-danger">

                                        Restock

                                    </span>

                                @elseif ($item->status == 'Warning')

                                    <span class="badge bg-warning text-dark">

                                        Mendekati Minimum

                                    </span>

                                @else

                                    <span class="badge bg-success">

                                        Aman

                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center">

                                Belum ada data prediksi.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="card-footer d-flex justify-content-between align-items-center">

                <small class="text-muted">

                    Menampilkan
                    {{ $prediksi->firstItem() ?? 0 }}
                    -
                    {{ $prediksi->lastItem() ?? 0 }}
                    dari
                    {{ $prediksi->total() }}
                    data

                </small>

                {{ $prediksi->links() }}

            </div>

        </x-card>

    </div>

</div>

</x-container>

@endsection

@push('js')

<script>

document.addEventListener("DOMContentLoaded", function () {

    new ApexCharts(document.querySelector("#chart-prediksi"), {

        chart: {

            type: "bar",

            height: 420

        },

        series: [

            {

                name: "Stok Aktual",

                data: @json($stokChart)

            },

            {

                name: "Prediksi",

                data: @json($prediksiChart)

            }

        ],

        xaxis: {

            categories: @json($labelChart),

            labels: {

                rotate: -45

            }

        },

        colors: [

            "#206bc4",

            "#dc2626"

        ],

        legend: {

            position: "top"

        },

        dataLabels: {

            enabled: false

        }

    }).render();

});

</script>

@endpush