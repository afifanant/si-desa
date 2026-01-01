<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index() {
        $data = Penduduk::all();
        return view('penduduk.index', compact('data'));
    }

    public function create() {
        return view('penduduk.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nik' => 'required|unique:penduduks',
            'nama' => 'required',
        ]);
        Penduduk::create($request->all());
        return redirect()->route('penduduk.index');
    }
// Menampilkan halaman form edit
public function edit(Penduduk $penduduk) 
{
    return view('penduduk.edit', compact('penduduk'));
}

// Memproses perubahan data ke database
public function update(Request $request, Penduduk $penduduk) 
{
    $request->validate([
        'nik' => 'required|unique:penduduks,nik,' . $penduduk->id,
        'nama' => 'required',
    ]);

    $penduduk->update($request->all());
    return redirect()->route('penduduk.index')->with('success', 'Data diperbarui!');
}

// Menghapus data dari database
public function destroy(Penduduk $penduduk) 
{
    $penduduk->delete();
    return redirect()->route('penduduk.index')->with('success', 'Data dihapus!');
}

}