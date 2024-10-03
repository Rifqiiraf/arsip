@extends('layouts.app')

@section('title', 'Laporan Peminjaman')

@section('content')
<div class="container">
    <h2>Laporan Peminjaman Arsip</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Peminjam</th>
                <th>Arsip</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjamans as $peminjaman)
                <tr>
                    <td>{{ $peminjaman->nama_peminjam }}</td>
                    <td>{{ $peminjaman->arsip->nama_arsip }}</td>
                    <td>{{ $peminjaman->created_at->format('d-m-Y') }}</td>
                    <td>
                        {{ $peminjaman->tanggal_pengembalian ? $peminjaman->tanggal_pengembalian->format('d-m-Y') : 'Belum Dikembalikan' }}
                    </td>
                    <td>
                        @if($peminjaman->tanggal_pengembalian)
                            Dikembalikan
                        @elseif(now()->diffInDays($peminjaman->created_at) > 7)
                            Terlambat
                        @else
                            Aktif
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('peminjaman.exportPdf') }}" class="btn btn-primary">Unduh Laporan PDF</a>
</div>
@endsection
