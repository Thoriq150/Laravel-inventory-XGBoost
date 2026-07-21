@extends('layouts.master', ['title' => 'Barang Keluar'])

@section('content')
    <x-container>

        <div class="col-12">

            <x-card title="DAFTAR BARANG KELUAR" class="card-body p-0">

                <x-table>

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Total Jumlah</th>
                            <th>User ID</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($transactions as $i => $transaction)

                            <tr>

                                <td>
                                    {{ $i + $transactions->firstItem() }}
                                </td>

                                <td>
                                    {{ $transaction->tanggal }}
                                </td>

                                <td>
                                    {{ $transaction->total_jumlah }}
                                </td>

                                <td>
                                    {{ $transaction->user_id }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4" class="text-center">
                                    Data transaksi keluar belum ada
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
                        {{ $transactions->firstItem() ?? 0 }}
                        -
                        {{ $transactions->lastItem() ?? 0 }}
                        dari
                        {{ $transactions->total() }}
                        data

                    </small>

                    {{ $transactions->links() }}

                </div>

            </div>
            </x-card>

        </div>

    </x-container>
@endsection
