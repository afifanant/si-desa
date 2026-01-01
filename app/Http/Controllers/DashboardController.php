<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Penduduk;
use App\Models\User;
use App\Models\JenisSurat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_penduduk' => Penduduk::count(), // Narik jumlah dari tabel penduduks
            'total_surat'    => Surat::count(),    // Narik jumlah dari tabel surats
            'total_admin'    => User::count(),     // Narik jumlah dari tabel users
            'total_kategori' => JenisSurat::count(), // Narik jumlah dari tabel jenis_surats
            
            // Relasi 4 Tabel: Mengambil 5 surat terbaru beserta data warga dan kategorinya
            'recent_surats'  => Surat::with(['penduduk', 'jenisSurat'])
                                ->latest()
                                ->take(5)
                                ->get()
        ];

        return view('dashboard', $data);
    }
}