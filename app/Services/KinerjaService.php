<?php

namespace App\Services;

class KinerjaService
{
    public static function predikat(string $hasil, string $perilaku): string
    {
        $matrix = [
            'diatas ekspektasi' => [
                'dibawah ekspektasi' => 'Kurang / misconduct',
                'sesuai ekspektasi'  => 'Baik',
                'diatas ekspektasi'  => 'Sangat Baik',
            ],
            'sesuai ekspektasi' => [
                'dibawah ekspektasi' => 'Kurang / misconduct',
                'sesuai ekspektasi'  => 'Baik',
                'diatas ekspektasi'  => 'Baik',
            ],
            'dibawah ekspektasi' => [
                'dibawah ekspektasi' => 'Sangat Kurang',
                'sesuai ekspektasi'  => 'Butuh perbaikan',
                'diatas ekspektasi'  => 'Butuh perbaikan',
            ],
        ];

        if (!isset($matrix[$hasil][$perilaku])) {
            throw new InvalidArgumentException('Input tidak valid');
        }

        return $matrix[$hasil][$perilaku];
    }
}