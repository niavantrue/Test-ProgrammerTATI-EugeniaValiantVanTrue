<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
{
    $kepalaDinas = User::create([
        'name' => 'Kepala Dinas',
        'jabatan' => 'Kepala Dinas',
        'email' => 'kepala@dinas.com',
        'password' => bcrypt('password'),
    ]);

    $kabid1 = User::create([
        'name' => 'Kepala Bidang 1',
        'jabatan' => 'Kepala Bidang',
        'atasan_id' => $kepalaDinas->id,
        'email' => 'kabid1@dinas.com',
        'password' => bcrypt('password'),
    ]);

    User::create([
        'name' => 'Staff 1',
        'jabatan' => 'Staff',
        'atasan_id' => $kabid1->id,
        'email' => 'staff1@dinas.com',
        'password' => bcrypt('password'),
    ]);

    $kabid2 = User::create([
        'name' => 'Kepala Bidang 2',
        'jabatan' => 'Kepala Bidang',
        'atasan_id' => $kepalaDinas->id,
        'email' => 'kabid2@dinas.com',
        'password' => bcrypt('password'),
    ]);

    User::create([
        'name' => 'Staff 2',
        'jabatan' => 'Staff',
        'atasan_id' => $kabid2->id,
        'email' => 'staff2@dinas.com',
        'password' => bcrypt('password'),
    ]);
}
}
