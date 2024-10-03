@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Edit Arsip</h4>
                </div>

                <div class="card-body">
                    <!-- Tampilkan pesan kesalahan -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('arsip.update', $arsip->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_arsip" class="form-label">Nama Arsip</label>
                            <input type="text" name="nama_arsip" class="form-control" value="{{ $arsip->nama_arsip }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="lantai" class="form-label">Lantai</label>
                            <input type="text" name="lantai" class="form-control" value="{{ $arsip->lantai }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="ruangan" class="form-label">Ruangan</label>
                            <input type="text" name="ruangan" class="form-control" value="{{ $arsip->ruangan }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="baris" class="form-label">Baris</label>
                            <input type="text" name="baris" class="form-control" value="{{ $arsip->baris }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="rak" class="form-label">Rak</label>
                            <input type="text" name="rak" class="form-control" value="{{ $arsip->rak }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="box" class="form-label">Box</label>
                            <input type="text" name="box" class="form-control" value="{{ $arsip->box }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Arsip</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
