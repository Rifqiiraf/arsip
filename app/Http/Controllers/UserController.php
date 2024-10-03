<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;

class UserController extends Controller
{
    // Halaman dashboard user
    public function index()
    {
        return view('user.dashboard'); // Pastikan ada view 'user.dashboard'
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // Ambil input pencarian dari user

        // Lakukan pencarian di database berdasarkan kolom yang ada
        $arsips = Arsip::where('nama_arsip', 'LIKE', "%{$query}%")
                        ->orWhere('lantai', 'LIKE', "%{$query}%")
                        ->orWhere('ruangan', 'LIKE', "%{$query}%")
                        ->orWhere('baris', 'LIKE', "%{$query}%")
                        ->orWhere('rak', 'LIKE', "%{$query}%")
                        ->orWhere('box', 'LIKE', "%{$query}%")
                        ->get(); // Dapatkan semua hasil pencarian

        return view('user.search', compact('arsips'));
    }
}
