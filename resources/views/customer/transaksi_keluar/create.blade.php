@extends('layouts.master', ['title' => 'Tambah Barang Keluar'])

@section('content')

<x-container>

<div class="col-12">

    <x-card title="FORM BARANG KELUAR">

        <form
            action="{{ route('customer.transaksi-keluar.store') }}"
            method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    Tanggal

                </label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control"
                    value="{{ old('tanggal') }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Barang

                </label>

                <select
                    name="barang_id"
                    class="form-control"
                    required>

                    <option value="">
                        -- Pilih Barang --
                    </option>

                    @foreach($products as $product)

                        <option
                            value="{{ $product->barang_id }}"
                            {{ old('barang_id') == $product->barang_id ? 'selected' : '' }}>

                            {{ $product->nama_barang }}
                            (Stok : {{ $product->stok }})

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Jumlah Barang Keluar

                </label>

                <input
                    type="number"
                    name="jumlah"
                    min="1"
                    value="{{ old('jumlah') }}"
                    class="form-control"
                    required>

            </div>

            <button
                type="submit"
                class="btn btn-primary">

                Simpan

            </button>

            <a
                href="{{ route('customer.transaksi-keluar.index') }}"
                class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </x-card>

</div>

</x-container>

@endsection