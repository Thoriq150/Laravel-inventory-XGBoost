@extends('layouts.master', ['title' => 'Prediksi Kebutuhan Stok'])

@section('content')

<x-container>

<div class="col-12">

    <x-card title="HASIL PREDIKSI KEBUTUHAN STOK" class="card-body p-0">

        <x-table>

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Stok Saat Ini</th>
                    <th>Prediksi Keluar</th>
                    <th>Status</th>
                    <th>Tanggal Prediksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($prediksi as $i => $item)

                    <tr>

                        <td>
                            {{ $i + $prediksi->firstItem() }}
                        </td>

                        <td>
                            {{ $item->nama_barang }}
                        </td>

                        <td>
                            {{ number_format($item->stok) }}
                        </td>

                        <td>
                            {{ number_format($item->hasil_prediksi) }}
                        </td>

                        <td>

                            @if($item->status == 'Aman')

                                <span class="badge bg-success">
                                    Aman
                                </span>

                            @elseif($item->status == 'Warning')

                                <span class="badge bg-warning text-dark">
                                    Warning
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Restock
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $item->tanggal_prediksi }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            Belum ada data prediksi.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </x-table>

    </x-card>

    <div class="d-flex justify-content-end mt-3">

        {{ $prediksi->links() }}

    </div>

</div>

</x-container>

@endsection