<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('supplier')->insert([

            [
                'nama_supplier' => 'PT Sumber Pangan Nusantara',
                'alamat' => 'Jakarta',
                'kontak' => '081234567801'
            ],

            [
                'nama_supplier' => 'CV Maju Bersama',
                'alamat' => 'Bekasi',
                'kontak' => '081234567802'
            ],

            [
                'nama_supplier' => 'PT Indo Distribusi',
                'alamat' => 'Bandung',
                'kontak' => '081234567803'
            ],

            [
                'nama_supplier' => 'CV Berkah Jaya',
                'alamat' => 'Depok',
                'kontak' => '081234567804'
            ],

            [
                'nama_supplier' => 'PT Sentosa Abadi',
                'alamat' => 'Bogor',
                'kontak' => '081234567805'
            ],

            [
                'nama_supplier' => 'CV Makmur Sejahtera',
                'alamat' => 'Tangerang',
                'kontak' => '081234567806'
            ],

            [
                'nama_supplier' => 'PT Nusantara Logistik',
                'alamat' => 'Karawang',
                'kontak' => '081234567807'
            ],

            [
                'nama_supplier' => 'CV Global Supplier',
                'alamat' => 'Cikarang',
                'kontak' => '081234567808'
            ],

            [
                'nama_supplier' => 'PT Anugerah Pangan',
                'alamat' => 'Surabaya',
                'kontak' => '081234567809'
            ],

            [
                'nama_supplier' => 'CV Prima Distribusi',
                'alamat' => 'Semarang',
                'kontak' => '081234567810'
            ],

            [
                'nama_supplier' => 'PT Mitra Retail Indonesia',
                'alamat' => 'Yogyakarta',
                'kontak' => '081234567811'
            ],

            [
                'nama_supplier' => 'CV Sukses Selalu',
                'alamat' => 'Malang',
                'kontak' => '081234567812'
            ],

            [
                'nama_supplier' => 'PT Bumi Niaga',
                'alamat' => 'Medan',
                'kontak' => '081234567813'
            ],

            [
                'nama_supplier' => 'CV Cahaya Abadi',
                'alamat' => 'Palembang',
                'kontak' => '081234567814'
            ],

            [
                'nama_supplier' => 'PT Karya Mandiri',
                'alamat' => 'Makassar',
                'kontak' => '081234567815'
            ]

        ]);
    }
}