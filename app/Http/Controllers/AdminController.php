<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Constructor untuk memeriksa middleware 'auth' dan 'admin'
    public function __construct()
    {
        $this->middleware(['auth', 'admin']); // Pastikan hanya admin yang bisa mengakses
    }

    /**
     * Menampilkan dashboard admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Misalkan kamu ingin mengirim data tertentu ke dashboard admin
        // $data = SomeModel::all();  // Contoh jika kamu ingin mengambil data dari database

        // Return view ke halaman dashboard admin
        return view('admin.dashboard');  // Pastikan view ini ada
    }

    // Metode tambahan untuk fitur admin lainnya bisa ditambahkan di sini
    // Misalnya: manajemen pengguna, laporan, dll.
}
