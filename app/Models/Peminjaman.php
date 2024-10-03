<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman'; // Nama tabel di database

    protected $fillable = [
        'nama_peminjam',
        'bidang',
        'jabatan',
        'arsip_id',
        'tanggal_pengembalian', // Tambahkan kolom ini
    ];

    protected $casts = [
        'tanggal_pengembalian' => 'datetime', // Pastikan kolom ini di-cast sebagai datetime
    ];

    public function arsip()
    {
        return $this->belongsTo(Arsip::class, 'arsip_id');
    }
}

