@extends('layouts.app')

@section('content')
<h3 class="mb-4">Verifikasi Log Bawahan</h3>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-bordered mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Nama Pegawai</th>
                    <th>Aktivitas</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                <tr>
                    <td>{{ $log->user->name }}</td>
                    <td>{{ $log->aktivitas }}</td>
                    <td>{{ $log->tanggal }}</td>
                    <td class="d-flex gap-2">
                        @can('verify', $log)
                            <form method="POST" action="{{ route('log.approve', $log) }}">
                                @csrf
                                <button class="btn btn-success btn-sm">Setujui</button>
                            </form>

                            <form method="POST" action="{{ route('log.reject', $log) }}">
                                @csrf
                                <button class="btn btn-danger btn-sm">Tolak</button>
                            </form>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Tidak ada log pending
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
