@extends('layouts.app')

@section('content')
<h3 class="mb-4">History Verifikasi Log</h3>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-bordered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Nama Pegawai</th>
                    <th>Aktivitas</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Diverifikasi Oleh</th>
                    <th>Waktu Verifikasi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                <tr>
                    <td>{{ $log->user->name }}</td>
                    <td>{{ $log->aktivitas }}</td>
                    <td>{{ $log->tanggal }}</td>
                    <td>
                        @if($log->status === 'approved')
                            <span class="badge bg-success">Disetujui</span>
                        @else
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>
                    <td>
                        @if($log->status === 'approved')
                            {{ $log->approver->name ?? 'N/A' }}
                        @else
                            {{ $log->rejector->name ?? 'N/A' }}
                        @endif
                    </td>
                    <td>
                        @if($log->status === 'approved')
                            {{ $log->approved_at ? $log->approved_at->format('d/m/Y H:i') : 'N/A' }}
                        @else
                            {{ $log->rejected_at ? $log->rejected_at->format('d/m/Y H:i') : 'N/A' }}
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        Belum ada log yang diverifikasi
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('verifikasi.index') }}" class="btn btn-secondary">Kembali ke Verifikasi</a>
</div>
@endsection