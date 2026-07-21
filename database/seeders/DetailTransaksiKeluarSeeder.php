<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailTransaksiKeluarSeeder extends Seeder
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

        $transaksiKeluar = DB::table('transaksi_keluar')->get();

        foreach ($transaksiKeluar as $transaksi) {

            $random = rand(1,100);

            if ($random <= 60) {
                $jumlahBarang = 2;
            } elseif ($random <= 90) {
                $jumlahBarang = 3;
            } else {
                $jumlahBarang = 4;
            }

            $barangDipilih = [];

            for ($i=0; $i<$jumlahBarang; $i++) {

                $tipe = rand(1,100);

                if ($tipe <= 50) {

                    $barangId = $fastMoving[array_rand($fastMoving)];

                } elseif ($tipe <= 85) {

                    $barangId = $mediumMoving[array_rand($mediumMoving)];

                } else {

                    $barangId = $slowMoving[array_rand($slowMoving)];
                }

                if (in_array($barangId,$barangDipilih)) {
                    continue;
                }

                $barangDipilih[] = $barangId;

                switch ($barangId) {

                    case 36: // Indomie
                    case 56: // Mie Sedaap
                        $jumlah = rand(2,12);
                        break;

                    case 38: // Aqua
                    case 59: // Le Minerale
                        $jumlah = rand(1,8);
                        break;

                    case 32: // Teh Botol
                    case 37: // Ultra Milk
                    case 42: // Pocari
                        $jumlah = rand(1,6);
                        break;

                    case 34: // Beras
                        $jumlah = rand(1,3);
                        break;

                    case 50: // Minyak
                    case 51: // Gula
                        $jumlah = rand(1,4);
                        break;

                    default:
                        $jumlah = rand(1,5);
                        break;
                }

                DB::table('detail_transaksi')->insert([
                    'transaksi_keluar_id' => $transaksi->transaksi_keluar_id,
                    'transaksi_masuk_id' => null,
                    'barang_id' => $barangId,
                    'jumlah' => $jumlah,
                    'created_at' => $transaksi->tanggal,
                    'updated_at' => $transaksi->tanggal,
                ]);
            }
        }
    }
}