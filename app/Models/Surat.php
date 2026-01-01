<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    // KUNCI: Hapus 'jenis_surat', ganti dengan 'jenis_surat_id'
    protected $fillable = [
        'penduduk_id', 
        'jenis_surat_id', 
        'user_id', 
        'nomor_surat'
    ];

    /**
     * Relasi 1: Surat -> Penduduk
     */
    public function penduduk() 
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }

    /**
     * Relasi 2: Surat -> User (Admin)
     */
    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi 3: Surat -> JenisSurat (Master)
     */
    public function jenisSurat() 
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }
}