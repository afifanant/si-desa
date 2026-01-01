<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Penduduk;
use App\Models\JenisSurat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    /**
     * Menampilkan data dengan Eager Loading 3 Relasi Sekaligus!
     */
    public function index()
    {
        // Memanggil data surat beserta 3 relasi: Warga, Admin, dan Kategori
        $surats = Surat::with(['penduduk', 'user', 'jenisSurat'])->get();
        return view('surat.index', compact('surats'));
    }

    public function create()
    {
        // Mengambil data untuk dua dropdown relasi
        $penduduks = Penduduk::all(); 
        $jenisSurats = JenisSurat::all(); // Data dari tabel master baru
        return view('surat.create', compact('penduduks', 'jenisSurats'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'penduduk_id' => 'required|exists:penduduks,id',
            'jenis_surat_id' => 'required|exists:jenis_surats,id',
        ]);

        // Proses penyimpanan dengan relasi 3 arah
        Surat::create([
            'user_id' => auth()->id(), // Admin yang login
            'penduduk_id' => $request->penduduk_id, // Warga pemohon
            'jenis_surat_id' => $request->jenis_surat_id, // Kategori master
            'nomor_surat' => 'SRT/' . now()->format('Ymd') . '/' . rand(100, 999),
        ]);

        return redirect()->route('surat.index')->with('success', 'Surat resmi berhasil diterbitkan!');
    }

    public function edit(string $id)
    {
        $surat = Surat::findOrFail($id);
        $penduduks = Penduduk::all();
        $jenisSurats = JenisSurat::all(); // Tambahkan ini agar dropdown edit muncul
        return view('surat.edit', compact('surat', 'penduduks', 'jenisSurats'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'penduduk_id' => 'required|exists:penduduks,id',
            'jenis_surat_id' => 'required|exists:jenis_surats,id', // Update ke ID, bukan teks!
        ]);

        $surat = Surat::findOrFail($id);
        $surat->update([
            'penduduk_id' => $request->penduduk_id,
            'jenis_surat_id' => $request->jenis_surat_id,
        ]);

        return redirect()->route('surat.index')->with('success', 'Arsip surat diperbarui!');
    }

    public function destroy(string $id)
    {
        Surat::findOrFail($id)->delete();
        return redirect()->route('surat.index')->with('success', 'Arsip dihapus!');
    }
public function cetak($id)
{
    // 1. Eager Loading relasi agar data Warga, Admin, & Kategori muncul di PDF
    $surat = Surat::with(['penduduk', 'user', 'jenisSurat'])->findOrFail($id);

    // 2. Load view PDF dengan data yang sudah lengkap
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('surat.pdf', compact('surat'));
    
    // 3. KUNCI: Ganti "/" jadi "-" khusus untuk nama file agar tidak error #0
    $fileName = str_replace('/', '-', $surat->nomor_surat);
    
    // 4. Gunakan stream() kalau mau lihat dulu, atau download() untuk langsung unduh
    return $pdf->download('Surat_' . $fileName . '.pdf');
}
}