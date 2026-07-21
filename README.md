# Inventory Management System with Stock Prediction Using XGBoost
<img width="1346" height="639" alt="Cuplikan layar 2026-07-05 085324" src="https://github.com/user-attachments/assets/6a7824f8-d7d4-4e1b-8d4b-0c3938033d65" />

## 📌 Deskripsi

Inventory Management System merupakan aplikasi berbasis web yang dikembangkan untuk membantu UMKM dalam mengelola persediaan barang secara efektif. Sistem ini dibangun menggunakan framework Laravel dengan database MySQL dan dilengkapi fitur Artificial Intelligence menggunakan algoritma XGBoost untuk memprediksi kebutuhan stok berdasarkan histori transaksi keluar.

Prediksi yang dihasilkan bukan berupa stok akhir, melainkan jumlah barang yang diperkirakan akan terjual pada periode berikutnya. Hasil prediksi kemudian dibandingkan dengan stok yang tersedia sehingga sistem dapat memberikan rekomendasi kebutuhan restock.

---

# Teknologi

- PHP 8.4
- Laravel 9
- MySQL
- Python 3.1
- XGBoost
- Pandas
- Scikit-Learn
- Bootstrap 5
- ApexCharts
- Tabler UI

---

# Fitur Sistem

## Admin

- Dashboard
- Manajemen Barang
- Manajemen Kategori
- Manajemen Supplier
- Monitoring Stok
- Laporan
- Prediksi Stok AI
- Pengaturan Akun

Admin bertugas mengelola seluruh data master serta menjalankan proses prediksi menggunakan model XGBoost.

---
## Akun  Admin
```
email : admin@gmail.com
password : password
```

## Customer

- Dashboard
- Barang Masuk
- Barang Keluar
- Riwayat Transaksi
- Prediksi Barang
- Pengaturan Akun

Customer hanya dapat melihat dan mengelola transaksi miliknya sendiri.

---

# Hak Akses

## Admin

- CRUD Barang
- CRUD Supplier
- CRUD Kategori
- Melihat seluruh transaksi
- Menjalankan proses prediksi AI
- Melihat laporan
- Melihat seluruh hasil prediksi


## Customer

- Login
- Input Barang Masuk
- Input Barang Keluar
- Melihat riwayat transaksi sendiri
- Melihat hasil prediksi
- Mengubah profil

---

# Konsep Prediksi

Model AI menggunakan histori transaksi keluar sebagai dataset pelatihan.

Dataset dibentuk dari:

- tanggal
- barang_id
- jumlah keluar

Kemudian diproses menggunakan Python dan algoritma XGBoost sehingga menghasilkan prediksi jumlah penjualan pada periode berikutnya.

Alur proses:

```
Histori Transaksi Keluar
            │
            ▼
       Dataset Training
            │
            ▼
      Python + XGBoost
            │
            ▼
Prediksi Jumlah Penjualan
            │
            ▼
 Simpan ke tabel prediksi_stok
            │
            ▼
 Ditampilkan pada Laravel
```

---

# Status Prediksi

Setelah memperoleh hasil prediksi, sistem membandingkan stok saat ini dengan prediksi penjualan.

Kategori status:

### Aman

```
Stok > Prediksi × 1.2
```

Stok masih jauh di atas kebutuhan.

---

### Mendekati Minimum

```
Prediksi ≤ Stok ≤ Prediksi × 1.2
```

Stok mulai mendekati batas kebutuhan sehingga perlu dipantau.

---

### Restock

```
Stok < Prediksi
```

Stok diperkirakan tidak mencukupi sehingga disarankan melakukan restock.

---

# Struktur Database

Tabel utama

```
users
barang
kategori
supplier
transaksi_masuk
transaksi_keluar
detail_transaksi
prediksi_stok
```

Relasi transaksi menggunakan tabel:

```
detail_transaksi
```

sehingga satu transaksi dapat memiliki lebih dari satu barang.

---

# Struktur Folder

```
app
 ├── Http
 │    ├── Controllers
 │    │      ├── Admin
 │    │      └── Customer
 │    └── Models

resources
 └── views
      ├── admin
      ├── customer
      └── layouts

routes
 └── web.php

database

ai
 ├── python_predict.py
 ├── dataset.csv
 └── model_xgboost.pkl
```

---

# Instalasi

Clone repository

```bash
git clone https://github.com/username/inventory-xgboost.git
```

Masuk folder project

```bash
cd inventory-xgboost
```

Install dependency

```bash
composer install
```

Copy file environment

```bash
cp .env.example .env
```

Generate key

```bash
php artisan key:generate
```

Konfigurasi database pada file `.env`

```
DB_DATABASE=inventory
DB_USERNAME=root
DB_PASSWORD=
```

Migrasi database

```bash
php artisan migrate
```

Jalankan server

```bash
php artisan serve
```

---

# Menjalankan Prediksi

Masuk ke halaman:

```
Admin
→ Prediksi Stok
→ Jalankan Prediksi
```

Laravel akan menjalankan

```
python ai/python_predict.py
```

Python akan:

- membaca histori transaksi keluar
- melakukan preprocessing
- melatih model XGBoost
- menghasilkan prediksi
- menyimpan hasil ke tabel

```
prediksi_stok
```

---

# Dashboard Prediksi

Halaman prediksi menampilkan:

- Ringkasan hasil prediksi
- Grafik Stok Saat Ini vs Prediksi Penjualan
- Status Prediksi
- Tabel hasil prediksi

Kolom tabel:

- Nama Barang
- Stok Saat Ini
- Prediksi Penjualan
- Batas Stok
- Tanggal Prediksi
- Status

---

# Algoritma

Model Machine Learning:

```
Extreme Gradient Boosting (XGBoost)
```

Model digunakan untuk mempelajari pola penjualan berdasarkan histori transaksi keluar dan menghasilkan estimasi jumlah barang yang akan terjual pada periode berikutnya.

---

# Pengembangan Selanjutnya

Beberapa fitur yang dapat dikembangkan:

- Notifikasi otomatis restock
- Prediksi multi-periode
- Forecast musiman
- Integrasi supplier otomatis
- Export laporan PDF
- Dashboard analitik penjualan
- API Mobile

---
