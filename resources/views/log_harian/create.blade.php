@extends('layouts.app')

@section('content')
<h3 class="mb-4">Tambah Log Harian</h3>

<div class="card col-md-6">
    <div class="card-body">
        <form method="POST" action="{{ route('log-harian.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Aktivitas</label>
                <textarea name="aktivitas" rows="4" class="form-control" required></textarea>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('log-harian.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
