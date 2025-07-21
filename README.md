# E-Katalog Pemerintah

Proyek Laravel 12 ini adalah implementasi sederhana dari sistem E-Katalog Pemerintah yang menyediakan fitur pencatatan barang, transaksi pembelian, dan pemberian potongan harga berdasarkan jumlah pembelian tertentu.

# Fitur Utama

- Manajemen Data Barang (CRUD)
- Pencatatan Pembelian
- Logika Potongan Harga Otomatis:
  -  Diskon 50% jika jumlah pembelian habis dibagi 500
  -  Tidak ada diskon jika habis dibagi 100
  -  Diskon 10% jika habis dibagi 40
  -  Tidak ada diskon jika tidak memenuhi kondisi di atas
- Antarmuka Web Sederhana (Blade)

# Teknologi yang Digunakan

- Laravel 12
- PHP 8.x
- MySQL / phpMyAdmin
- Bootstrap (optional)

# Instalasi & Menjalankan Proyek

```bash
git clone https://github.com/Yosethimothy/seleksi2025-2.git
cd seleksi2025-2
composer install
cp .env.example .env
php artisan key:generate

# Edit konfigurasi DB di .env
# DB_DATABASE=ekatalog2025_2

php artisan migrate
php artisan serve
