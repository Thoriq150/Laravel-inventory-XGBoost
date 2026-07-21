<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiKeluarSeeder extends Seeder
{
    public function run()
    {
        $tanggal = Carbon::create(2026, 3, 1);

        while ($tanggal <= Carbon::create(2026, 5, 30)) {

            if ($tanggal->isWeekend()) {
                $jumlahTransaksi = rand(28, 35);
            } else {
                $jumlahTransaksi = rand(18, 25);
            }

            // awal bulan ramai
            if ($tanggal->day <= 10) {
                $jumlahTransaksi += rand(5, 10);
            }

            // akhir bulan sepi
            if ($tanggal->day >= 26) {
                $jumlahTransaksi -= rand(3, 5);
            }

            for ($i = 0; $i < $jumlahTransaksi; $i++) {

                DB::table('transaksi_keluar')->insert([
                    'tanggal' => $tanggal,
                    'total_jumlah' => 0,
                    'user_id' => 1
                ]);
            }

            $tanggal->addDay();
        }
    }
}