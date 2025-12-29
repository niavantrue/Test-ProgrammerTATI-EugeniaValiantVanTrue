<?php

namespace App\Http\Controllers;

use App\Models\LogHarian;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class LogHarianController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $logs = auth()->user()->logHarian;
        return view('log_harian.index', compact('logs'));
    }

    public function create()
    {
        return view('log_harian.create');
    }

    public function edit(LogHarian $log)
    {
        $this->authorize('update', $log);
        return view('log_harian.edit', compact('log'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'aktivitas' => 'required',
            'tanggal' => 'required|date'
        ]);

        LogHarian::create([
            'user_id' => auth()->id(),
            'aktivitas' => $request->aktivitas,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('log-harian.index');
    }
}
