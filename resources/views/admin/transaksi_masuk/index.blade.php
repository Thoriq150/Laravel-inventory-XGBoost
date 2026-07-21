@extends('layouts.master', ['title' => 'Barang Masuk'])

@section('content')

<x-container>

    <div class="col-12">

        <x-card title="DAFTAR BARANG MASUK" class="card-body p-0">

            <x-table>

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Total Jumlah</th>
                        <th>User</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($transaksiMasuk as $i => $item)

                        <tr>

                            <td>
                                {{ $i + $transaksiMasuk->firstItem() }}
                            </td>

                            <td>
                                {{ $item->tanggal }}
                            </td>

                            <td>
                                {{ $item->total_jumlah }}
                            </td>

                            <td>
                                {{ $item->user->name ?? '-' }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center">
                                Data barang masuk belum ada
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </x-table>
            {{-- FOOTER --}}
            <div class="card-footer">

                <div class="d-flex justify-content-between align-items-center flex-wrap">

                    <small class="text-muted">

                        Menampilkan
                        {{ $transaksiMasuk->firstItem() ?? 0 }}
                        -
                        {{ $transaksiMasuk->lastItem() ?? 0 }}
                        dari
                        {{ $transaksiMasuk->total() }}
                        data

                    </small>

                    {{ $transaksiMasuk->links() }}

                </div>

            </div>
        </x-card>
    </div>

</x-container>

@endsection