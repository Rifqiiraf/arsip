<!-- resources/views/user/search.blade.php -->

@extends('layouts.user') <!-- Menggunakan layout untuk user -->

@section('content')
<div class="container">
    <h2>Hasil Pencarian Arsip</h2>

    <!-- Form pencarian -->
    <form action="{{ route('user.search') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="query" placeholder="Cari arsip..." value="{{ request('query') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

    <!-- Tabel hasil pencarian -->
    @if($arsips->isNotEmpty())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Arsip</th>
                    <th>Lantai</th>
                    <th>Ruangan</th>
                    <th>Baris</th>
                    <th>Rak</th>
                    <th>Box</th>
                    <th>Status</th> <!-- Tambahkan kolom status -->
                </tr>
            </thead>
            <tbody>
                @foreach($arsips as $arsip)
                    <tr>
                        <td>{{ $arsip->nama_arsip }}</td>
                        <td>{{ $arsip->lantai }}</td>
                        <td>{{ $arsip->ruangan }}</td>
                        <td>{{ $arsip->baris }}</td>
                        <td>{{ $arsip->rak }}</td>
                        <td>{{ $arsip->box }}</td>
                        <td>
                            @if($arsip->sedangDipinjam())
                                <span class="text-danger">Sedang Dipinjam</span> <!-- Menampilkan status -->
                            @else
                                <span class="text-success">Tersedia</span> <!-- Menampilkan status -->
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada arsip yang ditemukan.</p>
    @endif
</div>
@endsection
