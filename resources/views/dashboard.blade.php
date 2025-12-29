@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="mb-4">Dashboard</h1>
        <p>Selamat datang di Sistem Log Harian Pegawai.</p>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Log Harian</h5>
                        <p class="card-text">Kelola log harian Anda.</p>
                        <a href="{{ route('log-harian.index') }}" class="btn btn-primary">Lihat Log</a>
                    </div>
                </div>
            </div>
            @if(auth()->user()->jabatan !== 'staff')
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Verifikasi Log</h5>
                        <p class="card-text">Verifikasi log bawahan.</p>
                        <a href="{{ route('verifikasi.index') }}" class="btn btn-success">Verifikasi</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
