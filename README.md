<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

<p align="center">
<a href="https://github.com/iqbal-03"><img src="https://img.shields.io/badge/GitHub-IQBAL--03-181717?logo=github" alt="GitHub"></a>
<a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/License-MIT-success.svg" alt="License"></a>
</p>

# 🏥 MyUKS - Sistem Digitalisasi Manajemen Unit Kesehatan Sekolah

**MyUKS** adalah aplikasi web berbasis Laravel yang dirancang untuk memodernisasi dan mendigitalisasi pengelolaan Unit Kesehatan Sekolah (UKS). Aplikasi ini mempermudah petugas dan pengelola UKS dalam mencatat rekam medis kunjungan siswa, memantau ketersediaan stok obat secara real-time, serta menyajikan laporan kunjungan yang terstruktur.

---

## 🚀 Fitur Utama

- **📊 Dashboard Interaktif**: Menampilkan metrik utama (Total Siswa, Total Obat, Total Perawatan, dan Total Kelas) serta tabel kunjungan siswa terbaru.
- **🩺 Pencatatan Kunjungan & Rekam Medis (Treatments)**: Mencatat riwayat keluhan, diagnosa, serta pemberian obat kepada siswa. Sistem secara otomatis mengurangi stok obat yang diberikan.
- **💊 Manajemen Stok Obat (Medicines)**: Mengelola data nama obat, satuan, dan jumlah stok secara efisien.
- **👥 Manajemen Siswa & Kelas**: Mendata siswa beserta Nomor Induk Siswa (NIS), jenis kelamin, dan penempatan kelas guna mempermudah penelusuran riwayat medis.
- **📈 Laporan Kunjungan**: Rekapitulasi otomatis kunjungan UKS bulanan dan tahunan untuk kebutuhan pelaporan sekolah.
- **🔐 Sistem Hak Akses (Role-Based Access)**: Memisahkan wewenang antara **Admin** (akses penuh ke seluruh master data dan laporan) dan **Petugas** (fokus pada pencatatan kunjungan dan pembaruan stok obat). Dilengkapi juga dengan fitur verifikasi email dan reset sandi.

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 11 (PHP 8.2+)
- **Frontend**: Blade Templating, Tailwind CSS, Alpine.js
- **Database**: MySQL / SQLite (Mendukung skema migrasi Laravel)

---

## 🔑 Akun Akses Demo / Pengujian

Untuk mencoba aplikasi, Anda dapat menggunakan kredensial akun berikut yang telah dikonfigurasi:

| Peran (Role) | Email | Sandi (Password) | Hak Akses |
| :--- | :--- | :--- | :--- |
| **Admin** | `admin@gmail.com` | `Admin123` | Akses penuh (Master Data, Kunjungan, Laporan, Pengguna) |

---

## 📦 Panduan Instalasi & Konfigurasi Lokal

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek MyUKS di lingkungan pengembangan lokal Anda:

### 1. Kloning Repositori
```bash
git clone https://github.com/iqbal-03/MyUKS.git
cd MyUKS
```

### 2. Instalasi Dependensi
Pastikan Anda telah menginstal Composer dan Node.js di sistem Anda.
```bash
composer install
npm install
```

### 3. Konfigurasi Lingkungan (.env)
Salin file konfigurasi contoh dan sesuaikan pengaturan koneksi database Anda:
```bash
cp .env.example .env
```
Lalu jalankan perintah berikut untuk menghasilkan *application key*:
```bash
php artisan key:generate
```

### 4. Migrasi Database & Seeding
Jalankan migrasi untuk membuat tabel database beserta data awal (seeder akun):
```bash
php artisan migrate --seed
```

### 5. Menjalankan Server Pengembangan
Jalankan proses *build* aset frontend dan jalankan server lokal Laravel:
```bash
# Terminal 1 (Frontend assets)
npm run dev

# Terminal 2 (Backend server)
php artisan serve
```
Aplikasi kini dapat diakses melalui browser pada alamat: `http://localhost:8000`

---

## 📸 Cuplikan Layar (Screenshots)

Berikut adalah beberapa tampilan antarmuka dari sistem MyUKS:

- **Halaman Utama (Welcome)**: Akses masuk dan pendaftaran sistem.
- **Dashboard**: Ringkasan data statistik dan aktivitas kunjungan terkini.
- **Pencatatan Kunjungan**: Formulir pencatatan keluhan, diagnosa, dan alokasi obat.
- **Daftar Obat & Stok**: Pemantauan ketersediaan obat UKS secara langsung.

---
