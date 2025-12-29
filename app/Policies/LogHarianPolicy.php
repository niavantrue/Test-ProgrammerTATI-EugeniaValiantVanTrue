<?php

namespace App\Policies;

use App\Models\LogHarian;
use App\Models\User;

class LogHarianPolicy
{
    /**
     * User hanya boleh melihat log miliknya sendiri
     */
    public function view(User $user, LogHarian $log): bool
    {
        return $user->id === $log->user_id;
    }

    /**
     * User boleh membuat log untuk dirinya sendiri
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * User boleh mengedit log miliknya
     * SELAMA masih pending
     */
    public function update(User $user, LogHarian $log): bool
    {
        return $user->id === $log->user_id
            && $log->status === 'pending';
    }

    /**
     * User boleh menghapus log miliknya
     * SELAMA belum diverifikasi
     */
    public function delete(User $user, LogHarian $log): bool
    {
        return $user->id === $log->user_id
            && $log->status === 'pending';
    }

    /**
     * Atasan langsung boleh approve / reject
     */
    public function verify(User $user, LogHarian $log): bool
    {
        return $log->status === 'pending'
            && $log->user->atasan_id === $user->id;
    }

    /**
     * Untuk menu verifikasi (bukan ke satu log)
     */
    public function viewVerificationMenu(User $user): bool
    {
        return $user->bawahan()->exists();
    }
}
