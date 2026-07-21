<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('barang')->insert([

          [
    'nama_barang' => 'Coca Cola 1L',
    'stok' => 85,
    'satuan' => 'Botol',
    'harga' => 12000,
    'image' => 'default.jpg',
    'kategori_id' => 2,
    'supplier_id' => 7,
],

[
    'nama_barang' => 'Floridina Orange',
    'stok' => 95,
    'satuan' => 'Botol',
    'harga' => 5500,
    'image' => 'default.jpg',
    'kategori_id' => 2,
    'supplier_id' => 8,
],

[
    'nama_barang' => 'You C1000',
    'stok' => 75,
    'satuan' => 'Botol',
    'harga' => 10000,
    'image' => 'default.jpg',
    'kategori_id' => 2,
    'supplier_id' => 9,
],

[
    'nama_barang' => 'SilverQueen Almond',
    'stok' => 60,
    'satuan' => 'Pcs',
    'harga' => 18000,
    'image' => 'default.jpg',
    'kategori_id' => 3,
    'supplier_id' => 10,
],

[
    'nama_barang' => 'Tic Tac Snack',
    'stok' => 90,
    'satuan' => 'Pcs',
    'harga' => 8000,
    'image' => 'default.jpg',
    'kategori_id' => 3,
    'supplier_id' => 11,
],

[
    'nama_barang' => 'Kopi Kapal Api',
    'stok' => 130,
    'satuan' => 'Sachet',
    'harga' => 2500,
    'image' => 'default.jpg',
    'kategori_id' => 2,
    'supplier_id' => 12,
],

[
    'nama_barang' => 'Energen Coklat',
    'stok' => 100,
    'satuan' => 'Sachet',
    'harga' => 3000,
    'image' => 'default.jpg',
    'kategori_id' => 7,
    'supplier_id' => 13,
],

[
    'nama_barang' => 'Sarden ABC',
    'stok' => 70,
    'satuan' => 'Kaleng',
    'harga' => 14000,
    'image' => 'default.jpg',
    'kategori_id' => 4,
    'supplier_id' => 14,
],

[
    'nama_barang' => 'Saus Sambal ABC',
    'stok' => 80,
    'satuan' => 'Botol',
    'harga' => 9000,
    'image' => 'default.jpg',
    'kategori_id' => 9,
    'supplier_id' => 15,
],

[
    'nama_barang' => 'Margarin Blue Band',
    'stok' => 55,
    'satuan' => 'Pack',
    'harga' => 11000,
    'image' => 'default.jpg',
    'kategori_id' => 4,
    'supplier_id' => 16,
],

[
    'nama_barang' => 'Yakult',
    'stok' => 95,
    'satuan' => 'Pack',
    'harga' => 12000,
    'image' => 'default.jpg',
    'kategori_id' => 7,
    'supplier_id' => 2,
],

[
    'nama_barang' => 'Milo Kotak',
    'stok' => 110,
    'satuan' => 'Kotak',
    'harga' => 6000,
    'image' => 'default.jpg',
    'kategori_id' => 7,
    'supplier_id' => 3,
],

[
    'nama_barang' => 'Pembersih Lantai Super Pell',
    'stok' => 50,
    'satuan' => 'Botol',
    'harga' => 17000,
    'image' => 'default.jpg',
    'kategori_id' => 11,
    'supplier_id' => 4,
],

[
    'nama_barang' => 'Sunlight Jeruk Nipis',
    'stok' => 65,
    'satuan' => 'Pouch',
    'harga' => 14000,
    'image' => 'default.jpg',
    'kategori_id' => 11,
    'supplier_id' => 5,
],

[
    'nama_barang' => 'Tissue Paseo',
    'stok' => 100,
    'satuan' => 'Pack',
    'harga' => 9000,
    'image' => 'default.jpg',
    'kategori_id' => 12,
    'supplier_id' => 6,
],

        ]);
    }
}