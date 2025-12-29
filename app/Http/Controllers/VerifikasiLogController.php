<?php

namespace App\Http\Controllers;

use App\Models\LogHarian;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class VerifikasiLogController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $logs = LogHarian::where('status', 'pending')
            ->whereHas('user', function ($q) {
                $q->where('atasan_id', auth()->id());
            })
            ->get();

        return view('verifikasi.index', compact('logs'));
    }

    public function approve(LogHarian $log)
    {
        $this->authorize('verify', $log);

        $log->update([
            'status' => 'approved',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);
        return back();
    }

    public function reject(LogHarian $log)
    {
        $this->authorize('verify', $log);

        $log->update([
            'status' => 'rejected',
            'rejected_by' => auth()->id(),
            'rejected_at' => now(),
        ]);
        return back();
    }

    public function history()
    {
        $logs = LogHarian::whereHas('user', function ($q) {
                $q->where('atasan_id', auth()->id());
            })
            ->whereIn('status', ['approved', 'rejected'])
            ->with(['user', 'approver', 'rejector'])
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('verifikasi.history', compact('logs'));
    }

}