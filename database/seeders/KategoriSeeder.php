<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            ['nama_kategori' => 'Minuman'],
            ['nama_kategori' => 'Snack'],
            ['nama_kategori' => 'Sembako'],
            ['nama_kategori' => 'Frozen Food'],
            ['nama_kategori' => 'Makanan Instan'],
            ['nama_kategori' => 'Produk Susu'],
            ['nama_kategori' => 'Air Mineral'],
            ['nama_kategori' => 'Bumbu Dapur'],
            ['nama_kategori' => 'Perawatan Tubuh'],
            ['nama_kategori' => 'Kebersihan'],
            ['nama_kategori' => 'Peralatan Rumah Tangga'],
            ['nama_kategori' => 'ATK'],
            ['nama_kategori' => 'Elektronik'],
            ['nama_kategori' => 'Obat Ringan'],
            ['nama_kategori' => 'Rokok'],
        ];

        DB::table('kategori')->insert($kategori);
    }
}