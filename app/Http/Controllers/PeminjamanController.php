<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Arsip;
use Barryvdh\DomPDF\Facade\Pdf;

class PeminjamanController extends Controller
{
    public function create($arsip_id)
    {
        // Cari arsip berdasarkan ID
        $arsip = Arsip::findOrFail($arsip_id);

        // Kembalikan view peminjaman
        return view('peminjaman.create', compact('arsip'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_peminjam' => 'required|string',
            'bidang' => 'required|string',
            'jabatan' => 'required|string',
            'arsip_id' => 'required|exists:arsips,id',
        ]);

        // Cek apakah arsip sedang dipinjam
        $arsip = Arsip::findOrFail($validated['arsip_id']);
        if ($arsip->sedangDipinjam()) {
            return redirect()->back()->with('error', 'Arsip ini sedang dipinjam, tidak bisa melakukan peminjaman.');
        }

        // Simpan data peminjaman di database
        Peminjaman::create($validated);

        // Arahkan ke halaman daftar peminjaman dengan notifikasi
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dilakukan.');
    }

    public function index()
    {
        $peminjamans = Peminjaman::with('arsip')->get();
        return view('peminjaman.index', compact('peminjamans'));
    }

    public function return($id)
    {
        $peminjaman = Peminjaman::find($id);

        if ($peminjaman) {
            $peminjaman->tanggal_pengembalian = now();
            $peminjaman->status = 'dikembalikan'; // Update status
            $peminjaman->save();

            return redirect()->back()->with('success', 'Arsip berhasil dikembalikan.');
        }

        return redirect()->back()->with('error', 'Arsip tidak ditemukan.');
    }

    public function laporan()
    {
        $peminjamans = Peminjaman::with('arsip')->get();
        return view('peminjaman.laporan', compact('peminjamans'));
    }

    public function exportPdf()
    {
        $peminjamans = Peminjaman::with('arsip')->get();
        $pdf = Pdf::loadView('peminjaman.laporan', compact('peminjamans'));
        return $pdf->download('laporan_peminjaman.pdf');
    }
}
