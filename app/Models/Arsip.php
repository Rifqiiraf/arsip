<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_arsip', 'lantai', 'ruangan', 'baris', 'rak', 'box'
    ];

    // Relasi ke model Peminjaman
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }

    // Method untuk mengecek apakah arsip sedang dipinjam
    public function sedangDipinjam()
    {
        // Cek jika ada peminjaman yang belum dikembalikan (tanggal_pengembalian null)
        return $this->peminjamans()->whereNull('tanggal_pengembalian')->exists();
    }
}
