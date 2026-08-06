# Inventory Management System with Stock Prediction Using XGBoost
<img width="1346" height="639" alt="Cuplikan layar 2026-07-05 085324" src="https://github.com/user-attachments/assets/6a7824f8-d7d4-4e1b-8d4b-0c3938033d65" />

## 📌 Deskripsi

Inventory Management System merupakan aplikasi berbasis web yang dikembangkan untuk membantu UMKM dalam mengelola persediaan barang secara efektif. Sistem ini dibangun menggunakan framework Laravel dengan database MySQL dan dilengkapi fitur Artificial Intelligence menggunakan algoritma XGBoost untuk memprediksi kebutuhan stok berdasarkan histori transaksi keluar.

Prediksi yang dihasilkan bukan berupa stok akhir, melainkan jumlah barang yang diperkirakan akan terjual pada periode berikutnya. Hasil prediksi kemudian dibandingkan dengan stok yang tersedia sehingga sistem dapat memberikan rekomendasi kebutuhan restock.

---

## 🚀 Features

- Dashboard
- Product Management
- Category Management
- Supplier Management
- Customer Management
- Inventory Management
- Incoming Goods
- Outgoing Goods
- Sales History
- Automatic Stock Prediction (XGBoost)
- Stock Status Recommendation
- Reports

---

## 🛠️ Technologies Used

### Backend

- Laravel 
- PHP 
- MySQL 

### Frontend

- HTML
- CSS
- Bootstrap
- JavaScript

### Machine Learning

- Python 
- XGBoost
- Pandas
- NumPy
- Scikit-learn

### Server

- Laragon
- Apache
- MySQL

---

# System Requirements

Before running the application, make sure your computer has:

- Windows 10/11
- Laragon
- PHP 8.2+
- Composer
- Python 3.10+
- MySQL

---

# Installation Guide

## 1. Copy Project

Copy the project folder into

```
C:\laragon\www\
```

---

## 2. Start Laragon

Open Laragon

Click

```
Start All
```

Ensure:

- Apache Running
- MySQL Running

---

## 3. Create Database

Open browser

```
http://localhost/phpmyadmin
```

Create a database

Example:

```
smartstock
```

---

## 4. Import Database

Click

```
Import
```

Select

```
database.sql
```

Click

```
Go
```

> **Note**
>
> This project already uses **database.sql**, therefore you **DO NOT** need to run migration.

---

## 5. Configure Environment

Open

```
.env
```

Adjust database configuration

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smartstock
DB_USERNAME=root
DB_PASSWORD=
```

Adjust according to your MySQL configuration.

---

## 6. Install Composer Dependency

Open Terminal

```
composer install
```

---

## 7. Generate Application Key

Run

```
php artisan key:generate
```

---

## 8. Storage Link

Run

```
php artisan storage:link
```

Only if the application stores files in storage.

---

## 9. Run Laravel

```
php artisan serve
```

Open browser

```
http://127.0.0.1:8000
```

or

```
http://localhost:8000
```

---

# Running Machine Learning Prediction

This application integrates Python with Laravel for inventory prediction.

If prediction is required manually, run the prediction script:

```
python predict.py
```

or use the corresponding Python prediction file contained in this project.

Prediction results will be stored in the database and displayed in the application.

---

# Login

Administrator

```
Email    : admin@gmail.com
Password : password
```

---

# Project Structure

```
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
vendor/

database.sql
README.md
```

---

# Notes

- Database already exists in **database.sql**
- Migration is **NOT REQUIRED**
- Apache and MySQL must be running
- Configure `.env` before running
- Make sure Composer dependencies have been installed

---

# Troubleshooting

## Error

```
Class not found
```

Solution

```
composer install
composer dump-autoload
```

---

## Error

```
APP_KEY missing
```

Solution

```
php artisan key:generate
```

---

## Error

```
Database connection failed
```

Check

```
.env
```

Database name

Username

Password

---

## Error

```
404 Not Found
```

Run

```
php artisan serve
```

---

## Error

```
CSS or JS not loaded
```

Check

```
public/dist
```

and ensure assets exist.

---

# Developer

**Thoriq Azhar Fauzan**

Universitas Pelita Bangsa

Bachelor of Informatics Engineering

2026

---

# License

This project was developed for academic purposes (Final Project / Undergraduate Thesis).
