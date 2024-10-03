@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pinjam Arsip</h2>
    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" required>
        </div>
        <div class="mb-3">
            <label for="bidang" class="form-label">Bidang</label>
            <input type="text" class="form-control" id="bidang" name="bidang" required>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
        </div>
        <input type="hidden" name="arsip_id" value="{{ $arsip->id }}">
        <button type="submit" class="btn btn-primary">Simpan Peminjaman</button>
    </form>
</div>
@endsection
