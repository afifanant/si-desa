# 🏛️ SI-DESA: Sistem Informasi Persuratan Digital Terintegrasi

Sistem manajemen administrasi desa yang dirancang untuk mendigitalisasi proses kependudukan dan penerbitan surat resmi secara otomatis dan akurat.

## 🚀 Fitur Unggulan
* **Manajemen Relasi 4 Tabel**: Integrasi data antara Tabel Users (Admin), Tabel Penduduk, Tabel Jenis Surat (Master), dan Tabel Surat (Transaksi).
* **Automated PDF Generator**: Penerbitan dokumen resmi dengan penomoran surat otomatis yang dapat langsung diunduh.
* **Dashboard Statistik Real-time**: Visualisasi jumlah penduduk dan aktivitas persuratan terbaru.
* **Modern UI/UX**: Antarmuka responsif dengan tema Glassmorphism dan dukungan Mode Gelap (Dark Mode).

---

## 🛠️ Detail Teknis & Relasi Database
Proyek ini mengimplementasikan normalisasi database dengan struktur relasi sebagai berikut:
1. **Tabel Users**: Menyimpan data administrator sistem (Afif Ananta).
2. **Tabel Penduduk**: Master data identitas warga (NIK, Nama, Alamat).
3. **Tabel Jenis_Surats**: Master kategori surat (Domisili, SKU, SKTM).
4. **Tabel Surats**: Tabel transaksi yang menghubungkan ketiga tabel di atas melalui foreign key.



---

## 🔑 Akun Akses Pengujian (UAS)
Gunakan kredensial berikut untuk menguji fitur fungsional sistem:
* **Email**: `admin@desa.com`
* **Password**: `admibn desa`

---

## 📦 Cara Instalasi Lokal
Clone repositori:
git clone [https://github.com/username/si-desa.git](https://github.com/username/si-desa.git)
Install dependencies:
composer install
npm install && npm run build
Konfigurasi file .env (sesuaikan dengan database lokal lu).
Migrasi dan Import Database:
Buat database bernama desa.
Import file desa.sql yang tersedia di folder root.
Jalankan server:
php artisan serve
