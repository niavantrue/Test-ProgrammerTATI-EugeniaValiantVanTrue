@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Log Harian Saya</h3>
    <a href="{{ route('log-harian.create') }}" class="btn btn-primary">
        + Tambah Log
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Tanggal</th>
                    <th>Aktivitas</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                <tr>
                    <td>{{ $log->tanggal }}</td>
                    <td>{{ $log->aktivitas }}</td>
                    <td>
                        <span class="badge
                            @if($log->status === 'pending') bg-warning
                            @elseif($log->status === 'approved') bg-success
                            @else bg-danger @endif">
                            @if($log->status === 'pending')
                                Pending
                            @elseif($log->status === 'approved')
                                Disetujui
                            @else
                                Ditolak
                            @endif
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">
                        Belum ada log
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
