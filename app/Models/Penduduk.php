<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    // Mengizinkan kolom untuk diisi secara massal
    protected $fillable = ['nik', 'nama', 'alamat'];

    /**
     * Relasi One-to-Many
     * Satu penduduk bisa memiliki banyak riwayat surat
     */
    public function surats()
    {
        return $this->hasMany(Surat::class);
    }
}