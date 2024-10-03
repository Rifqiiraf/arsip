<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;

class ArsipController extends Controller
{
    // Metode untuk menampilkan daftar arsip
    public function index()
    {
        $arsips = Arsip::all();
        return view('arsip.index', compact('arsips'));
    }

    // Metode untuk menampilkan form tambah arsip
    public function create()
    {
        return view('arsip.create');
    }

    // Metode untuk menyimpan arsip baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_arsip' => 'required|string',
            'lantai' => 'required|string',
            'ruangan' => 'required|string',
            'baris' => 'required|string',
            'rak' => 'required|string',
            'box' => 'required|string',
        ]);

        Arsip::create($validated);

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil ditambahkan.');
    }
    public function edit($id)
{
    $arsip = Arsip::findOrFail($id);
    return view('arsip.edit', compact('arsip'));
}

public function update(Request $request, $id)
{
    $arsip = Arsip::findOrFail($id);

    // Validasi input
    $request->validate([
        'nama_arsip' => 'required',
        'lantai' => 'required',
        'ruangan' => 'required',
        'baris' => 'required',
        'rak' => 'required',
        'box' => 'required',
    ]);

    // Update data arsip
    $arsip->update($request->all());

    return redirect()->route('arsip.index')->with('success', 'Arsip berhasil diperbarui!');
}

public function destroy($id)
{
    $arsip = Arsip::findOrFail($id);
    $arsip->delete();

    return redirect()->route('arsip.index')->with('success', 'Arsip berhasil dihapus!');
}


    // Metode untuk mencari arsip
    public function search(Request $request)
    {
        $query = $request->input('query');

        $arsips = Arsip::where('nama_arsip', 'LIKE', "%{$query}%")
            ->orWhere('lantai', 'LIKE', "%{$query}%")
            ->orWhere('ruangan', 'LIKE', "%{$query}%")
            ->orWhere('baris', 'LIKE', "%{$query}%")
            ->orWhere('rak', 'LIKE', "%{$query}%")
            ->orWhere('box', 'LIKE', "%{$query}%")
            ->get();

        return view('arsip.index', compact('arsips'));
    }
}




