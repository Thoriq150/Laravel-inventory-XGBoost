<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiMasukSeeder extends Seeder
{
    public function run(): void
    {
        $tanggal = Carbon::create(2026, 3, 1);
        $endDate = Carbon::create(2026, 5, 30);

        while ($tanggal->lte($endDate)) {

            if ($tanggal->day <= 10) {

                $jumlahMasuk = rand(3, 5);

            } elseif ($tanggal->day >= 25) {

                $jumlahMasuk = rand(0, 1);

            } else {

                if ($tanggal->isWeekend()) {
                    $jumlahMasuk = rand(0, 1);
                } else {
                    $jumlahMasuk = rand(1, 3);
                }
            }

            for ($i = 0; $i < $jumlahMasuk; $i++) {

                DB::table('transaksi_masuk')->insert([
                    'tanggal'      => $tanggal->format('Y-m-d'),
                    'total_jumlah' => 0,
                    'user_id'      => 1,
                ]);
            }

            $tanggal->addDay();
        }
    }
}