<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailTransaksiMasukSeeder extends Seeder
{
    public function run(): void
    {
        $fastMoving = [
            32,33,36,37,38,
            42,46,56,57,59
        ];

        $mediumMoving = [
            34,35,39,43,44,45,
            47,48,49,50,51,
            52,53,54,55,58,
            60,67,68,69,70,
            71,72,73,74,75,
            76,77,78
        ];

        $slowMoving = [
            40,41,61,62,63,
            64,65,66,79,80,81
        ];

        $transaksiMasuk = DB::table('transaksi_masuk')->get();

        foreach ($transaksiMasuk as $transaksi) {

            $jumlahBarang = rand(5, 8);

            $barangDipilih = collect();

            for ($i = 0; $i < $jumlahBarang; $i++) {

                $tipe = rand(1, 100);

                if ($tipe <= 50) {

                    $barangId = $fastMoving[array_rand($fastMoving)];
                    $jumlah = rand(30, 100);

                } elseif ($tipe <= 85) {

                    $barangId = $mediumMoving[array_rand($mediumMoving)];
                    $jumlah = rand(15, 60);

                } else {

                    $barangId = $slowMoving[array_rand($slowMoving)];
                    $jumlah = rand(5, 30);
                }

                if ($barangDipilih->contains($barangId)) {
                    continue;
                }

                $barangDipilih->push($barangId);

                DB::table('detail_transaksi')->insert([
                    'transaksi_masuk_id' => $transaksi->transaksi_masuk_id,
                    'transaksi_keluar_id' => null,
                    'barang_id' => $barangId,
                    'jumlah' => $jumlah,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}