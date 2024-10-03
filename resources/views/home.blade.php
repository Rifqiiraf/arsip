<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{ __('You are logged in!') }}

    <div class="mt-3">
        <a href="{{ route('arsip.index') }}" class="btn btn-primary">Manage Arsip</a>
        <a href="{{ route('laporan.peminjaman') }}" class="btn btn-secondary">View Reports</a>
        <!-- Tambahkan tautan lainnya sesuai kebutuhan -->
    </div>
</div>
