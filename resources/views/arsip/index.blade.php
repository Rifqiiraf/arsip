@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Daftar Arsip</h4>
                </div>

                <div class="card-body">
                    <!-- Tampilkan pesan keberhasilan -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Form Pencarian -->
                    <form method="GET" action="{{ route('arsip.search') }}" class="d-flex mb-3">
                        <input type="text" name="query" class="form-control me-2" placeholder="Cari nama arsip..." value="{{ request()->input('query') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

                    <!-- Tabel Arsip -->
                    <table class="table table-bordered mt-3">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Arsip</th>
                                <th>Lantai</th>
                                <th>Ruangan</th>
                                <th>Baris</th>
                                <th>Rak</th>
                                <th>Box</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($arsips as $arsip)
                                <tr>
                                    <td>{{ $arsip->nama_arsip }}</td>
                                    <td>{{ $arsip->lantai }}</td>
                                    <td>{{ $arsip->ruangan }}</td>
                                    <td>{{ $arsip->baris }}</td>
                                    <td>{{ $arsip->rak }}</td>
                                    <td>{{ $arsip->box }}</td>
                                    <td>
                                        @if($arsip->sedangDipinjam())
                                            <button class="btn btn-secondary" disabled>Dipinjam</button>
                                        @else
                                            <a href="{{ route('peminjaman.create', $arsip->id) }}" class="btn btn-warning">Pinjam</a>
                                        @endif

                                        <a href="{{ route('arsip.edit', $arsip->id) }}" class="btn btn-info">Edit</a>

                                        <form action="{{ route('arsip.destroy', $arsip->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus arsip ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada arsip ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
