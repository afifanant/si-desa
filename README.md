
# 🏛️ SI-DESA: Sistem Informasi Persuratan Digital Terintegrasi

Sistem manajemen administrasi desa yang dirancang untuk mendigitalisasi proses kependudukan dan penerbitan surat resmi secara otomatis dan akurat. Proyek ini dibangun menggunakan **Laravel 12**, **Bootstrap 5**, dan **DomPDF**.

## 🚀 Fitur Unggulan
* **Manajemen Relasi 4 Tabel**: Integrasi data antara Tabel Users (Admin), Tabel Penduduk, Tabel Jenis Surat (Master), dan Tabel Surat (Transaksi).
* **Automated PDF Generator**: Penerbitan dokumen resmi dengan penomoran surat otomatis yang dapat langsung diunduh.
* **Dashboard Statistik Real-time**: Visualisasi jumlah penduduk, surat terbit, dan aktivitas petugas admin secara langsung.
* **Modern UI/UX**: Antarmuka responsif dengan tema Glassmorphism, dukungan Dark Mode, dan Live Clock.

---

## 🛠️ Detail Teknis & Relasi Database
Proyek ini mengimplementasikan normalisasi database dengan struktur relasi sebagai berikut:
1. **Tabel Users**: Menyimpan identitas administrator sistem (Contoh: Afif Ananta).
2. **Tabel Penduduk**: Master data kependudukan (NIK, Nama, Alamat).
3. **Tabel Jenis_Surats**: Master kategori surat resmi (Domisili, SKU, SKTM).
4. **Tabel Surats**: Tabel transaksi yang menghubungkan ketiga tabel master di atas melalui Foreign Key.



---

## 🔑 Akun Akses Pengujian (UAS)
Administrator dapat menggunakan kredensial berikut untuk menguji seluruh fitur sistem:
* **Email**: `admin@desa.com`
* **Password**: `admibn desa` (Sudah terdaftar di database `desa.sql`)

---

## 📦 Cara Instalasi Lokal

1. **Clone Repositori**
   ```bash
   git clone [https://github.com/username/si-desa.git](https://github.com/username/si-desa.git)
   cd si-desa

```

2. **Install Dependencies**
```bash
composer install
npm install && npm run build

```


3. **Konfigurasi Environment**
* Copy file `.env.example` menjadi `.env`.
* Sesuaikan `DB_DATABASE=desa` dan kredensial database lokal Anda.
* Jalankan perintah: `php artisan key:generate`


4. **Persiapan Database**
* Buat database baru bernama `desa` di phpMyAdmin.
* Import file `desa.sql` yang terletak di folder root proyek ini.


5. **Menjalankan Aplikasi**
```bash
php artisan serve

```


Akses melalui: `http://localhost:8000`

---

## 👨‍💻 Author

**Afif Ananta** *Program Studi Sistem Informasi - UINSU Medan*

```
