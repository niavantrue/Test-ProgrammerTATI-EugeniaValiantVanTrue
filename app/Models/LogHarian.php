<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogHarian extends Model
{
    protected $fillable = [
        'user_id',
        'aktivitas',
        'tanggal',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}