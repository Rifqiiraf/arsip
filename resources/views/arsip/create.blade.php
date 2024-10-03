@extends('layouts.app') <!-- Menggunakan layout utama -->

@section('title', 'Tambah Arsip') <!-- Menentukan title halaman -->

@section('content') <!-- Bagian konten utama -->
<div class="container">
    <h2>Tambah Arsip Baru</h2>
    <!-- Form untuk menambah arsip -->
    <form method="POST" action="{{ route('arsip.store') }}">
        @csrf <!-- Token CSRF untuk keamanan -->
        <div class="mb-3">
            <label for="nama_arsip" class="form-label">Nama Arsip</label>
            <input type="text" class="form-control" id="nama_arsip" name="nama_arsip" required>
        </div>
        <div class="mb-3">
            <label for="lantai" class="form-label">Lantai</label>
            <input type="text" class="form-control" id="lantai" name="lantai" required>
        </div>
        <div class="mb-3">
            <label for="ruangan" class="form-label">Ruangan</label>
            <input type="text" class="form-control" id="ruangan" name="ruangan" required>
        </div>
        <div class="mb-3">
            <label for="baris" class="form-label">Baris</label>
            <input type="text" class="form-control" id="baris" name="baris" required>
        </div>
        <div class="mb-3">
            <label for="rak" class="form-label">Rak</label>
            <input type="text" class="form-control" id="rak" name="rak" required>
        </div>
        <div class="mb-3">
            <label for="box" class="form-label">Box</label>
            <input type="text" class="form-control" id="box" name="box" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan Arsip</button>
    </form>
</div>
@endsection
