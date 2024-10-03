@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Peminjaman Arsip</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Peminjam</th>
                <th>Bidang</th>
                <th>Jabatan</th>
                <th>Nama Arsip</th>
                <th>Tanggal Pengembalian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjamans as $peminjaman)
            <tr>
                <td>{{ $peminjaman->nama_peminjam }}</td>
                <td>{{ $peminjaman->bidang }}</td>
                <td>{{ $peminjaman->jabatan }}</td>
                <td>{{ $peminjaman->arsip->nama_arsip }}</td>
                <td>
                    @if($peminjaman->tanggal_pengembalian)
                        {{ $peminjaman->tanggal_pengembalian->format('d-m-Y') }}
                    @else
                        <span class="text-danger">Belum dikembalikan</span>
                    @endif
                </td>
                <td>
                    @if(!$peminjaman->tanggal_pengembalian)
                    <form action="{{ route('peminjaman.return', $peminjaman->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin mengembalikan arsip ini?')">Kembalikan</button>
                    </form>
                    @else
                        <span class="text-muted">Sudah Dikembalikan</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
