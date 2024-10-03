<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // Import kelas Authenticatable

class Admin extends Authenticatable
{
    use HasFactory;

    // Jika tabel memiliki nama yang tidak sesuai konvensi Laravel, tentukan nama tabel di sini
    protected $table = 'admins'; // Nama tabel di database

    // Jika ada field yang tidak dapat diisi massal, tentukan di sini
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Jika ada field yang perlu di-hash, gunakan mutator
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Jika menggunakan timestamp (created_at dan updated_at), pastikan ini diset ke true
    public $timestamps = true;
}
