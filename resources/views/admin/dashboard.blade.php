@extends('layouts.master', ['title' => 'Dashboard'])

@section('content')
<x-container>

    {{-- HEADER --}}
    <div class="col-12 mb-4">
        <div class="page-header">
            <div>
                <h2 class="page-title">
                    Dashboard Monitoring Inventori
                </h2>

                <div class="text-muted mt-1">
                    Sistem Monitoring dan Pengelolaan Stok Barang
                </div>
            </div>
        </div>
    </div>

    {{-- KATEGORI --}}
    <div class="col-sm-6 col-xl-3">
        <x-widget title="Kategori Barang" :subTitle="$categories" class="bg-blue">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="icon icon-tabler icon-tabler-copy"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round">

                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>

                <rect x="8" y="8" width="12" height="12" rx="2"></rect>

                <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2"></path>
            </svg>

        </x-widget>
    </div>

    {{-- SUPPLIER --}}
    <div class="col-sm-6 col-xl-3">
        <x-widget title="Supplier" :subTitle="$suppliers" class="bg-indigo">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="icon icon-tabler icon-tabler-truck"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round">

                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>

                <circle cx="7" cy="17" r="2"></circle>

                <circle cx="17" cy="17" r="2"></circle>

                <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
            </svg>

        </x-widget>
    </div>

    {{-- BARANG --}}
    <div class="col-sm-6 col-xl-3">
        <x-widget title="Data Barang" :subTitle="$products" class="bg-dark">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="icon icon-tabler icon-tabler-package"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round">

                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>

                <path d="M12 3l8 4.5v9l-8 4.5l-8 -4.5v-9z"></path>

                <path d="M12 12l8 -4.5"></path>

                <path d="M12 12v9"></path>

                <path d="M12 12l-8 -4.5"></path>

            </svg>

        </x-widget>
    </div>

    {{-- USER --}}
    <div class="col-sm-6 col-xl-3">
        <x-widget title="Pengguna Sistem" :subTitle="$customers" class="bg-purple">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="icon icon-tabler icon-tabler-users"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round">

                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>

                <circle cx="9" cy="7" r="4"></circle>

                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>

                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>

                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>

            </svg>

        </x-widget>
    </div>

    {{-- TRANSAKSI MASUK --}}
    <div class="col-sm-6 col-xl-3">
        <x-widget title="Transaksi Masuk" :subTitle="$transaksiMasuk" class="bg-success">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="icon icon-tabler icon-tabler-shopping-cart-plus"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round">

                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>

                <circle cx="6" cy="19" r="2"></circle>

                <circle cx="17" cy="19" r="2"></circle>

                <path d="M17 17h-11v-14h-2"></path>

                <path d="M6 5l6.005 .429m7.138 6.573l-.143 .998h-13"></path>

                <path d="M15 6h6m-3 -3v6"></path>

            </svg>

        </x-widget>
    </div>

    {{-- TRANSAKSI KELUAR --}}
    <div class="col-sm-6 col-xl-3">
        <x-widget title="Transaksi Keluar" :subTitle="$transactions" class="bg-danger">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="icon icon-tabler icon-tabler-shopping-cart-x"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round">

                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>

                <circle cx="6" cy="19" r="2"></circle>

                <circle cx="17" cy="19" r="2"></circle>

                <path d="M17 17h-11v-14h-2"></path>

                <path d="M6 5l7.999 .571m5.43 4.43l-.429 2.999h-13"></path>

                <path d="M17 3l4 4"></path>

                <path d="M21 3l-4 4"></path>

            </svg>

        </x-widget>
    </div>

    {{-- BULAN INI --}}
    <div class="col-sm-6 col-xl-3">
        <x-widget title="Transaksi Bulan Ini"
            :subTitle="$transactionThisMonth"
            class="bg-warning">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="icon icon-tabler icon-tabler-calendar-stats"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round">

                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>

                <path d="M8 7v-4"></path>

                <path d="M16 7v-4"></path>

                <path d="M4 11h16"></path>

                <rect x="4" y="5" width="16" height="16" rx="2"></rect>

                <path d="M8 15h2v2h-2z"></path>

                <path d="M14 15h2v5h-2z"></path>

            </svg>

        </x-widget>
    </div>
    
    {{-- PREDIKSI AI --}}
<div class="col-sm-6 col-xl-3">
    <x-widget title="Prediksi AI"
        :subTitle="$jumlahPrediksi"
        class="bg-cyan">

        <svg xmlns="http://www.w3.org/2000/svg"
            class="icon"
            width="24"
            height="24"
            fill="none"
            stroke="currentColor"
            stroke-width="2">

            <path d="M12 2v4"/>
            <path d="M12 18v4"/>
            <path d="M4.93 4.93l2.83 2.83"/>
            <path d="M16.24 16.24l2.83 2.83"/>
            <circle cx="12" cy="12" r="5"/>

        </svg>

    </x-widget>
</div>

    {{-- PANEL KIRI --}}
<div class="col-lg-6">

    {{-- ========================= --}}
    {{-- MONITORING STOK MINIMUM --}}
    {{-- ========================= --}}
    <x-card title="Monitoring Stok Minimum">

        <div class="list list-row list-hoverable">

            @foreach ($productsOutStock as $product)

                <div class="list-item">

                    <div>
                        <span class="badge bg-danger">
                            {{ $product->stok }}
                        </span>
                    </div>

                    <div class="text-truncate">

                        <a href="{{ route('admin.stock.index') }}"
                            class="text-body d-block">

                            {{ $product->nama_barang }}

                        </a>

                        <small class="text-muted">

                            Kategori :
                            {{ $product->kategori->nama_kategori ?? '-' }}

                        </small>

                    </div>

                </div>

            @endforeach

        </div>

    </x-card>

    <div class="d-flex justify-content-end mb-3">
        {{ $productsOutStock->links() }}
    </div>


    {{-- ========================= --}}
    {{-- REKOMENDASI RESTOCK AI --}}
    {{-- ========================= --}}
    <x-card title="Rekomendasi Restock AI">

        @if(isset($prediksi) && count($prediksi))

            <div class="list list-row list-hoverable">

                @foreach($prediksi->take(5) as $item)

                    <div class="list-item">

                        <div>

                            @if($item->prediksi_bulanan > $item->stok)

                                <span class="badge bg-danger">
                                    Restock
                                </span>

                            @else

                                <span class="badge bg-success">
                                    Aman
                                </span>

                            @endif

                        </div>

                        <div class="text-truncate">

                            <strong>

                                {{ $item->nama_barang }}

                            </strong>

                            <small class="d-block text-muted">

                                Stok :
                                {{ $item->stok }}

                                |

                                Prediksi :
                                {{ $item->prediksi_bulanan }}

                            </small>

                            @if($item->prediksi_bulanan > $item->stok)

                                <small class="text-danger">

                                    Tambah sekitar
                                    {{ $item->prediksi_bulanan - $item->stok }}
                                    pcs

                                </small>

                            @else

                                <small class="text-success">

                                    Stok masih mencukupi

                                </small>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="text-center py-4 text-muted">

                Belum ada data prediksi AI

            </div>

        @endif

    </x-card>

</div>

    {{-- CHART --}}
    <div class="col-lg-6">

        <x-card title="Grafik Transaksi Barang">

            <div id="chart-total-sales" class="my-3"></div>

        </x-card>

    </div>


</x-container>
@endsection

@push('js')
<script>

document.addEventListener("DOMContentLoaded", function () {

    window.ApexCharts && (new ApexCharts(
        document.getElementById('chart-total-sales'),

        {
            chart: {
                type: "donut",
                fontFamily: 'inherit',
                height: 400,
                sparkline: {
                    enabled: true
                },
            },

            fill: {
                opacity: 1,
            },

            series: @json($total),

            labels: @json($label),

            grid: {
                strokeDashArray: 4,
            },

            colors: [
                "#206bc4",
                "#4f46e5",
                "#16a34a",
                "#dc2626",
                "#f59e0b"
            ],

            legend: {
                show: true,
                position: 'top'
            },

            tooltip: {
                fillSeriesColor: true
            },

            dataLabels: {
                enabled: true,
            }

        }

    )).render();

});

</script>
@endpush