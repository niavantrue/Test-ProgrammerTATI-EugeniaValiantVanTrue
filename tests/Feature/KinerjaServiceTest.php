<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\KinerjaService;

class KinerjaServiceTest extends TestCase
{
    public function test_predikat_sangat_baik()
    {
        $hasil = KinerjaService::predikat(
            'diatas ekspektasi',
            'diatas ekspektasi'
        );

        $this->assertEquals('Sangat Baik', $hasil);
    }

    public function test_predikat_baik()
    {
        $hasil = KinerjaService::predikat(
            'sesuai ekspektasi',
            'diatas ekspektasi'
        );

        $this->assertEquals('Baik', $hasil);
    }

    public function test_predikat_butuh_perbaikan()
    {
        $hasil = KinerjaService::predikat(
            'dibawah ekspektasi',
            'sesuai ekspektasi'
        );

        $this->assertEquals('Butuh perbaikan', $hasil);
    }

    public function test_predikat_sangat_kurang()
    {
        $hasil = KinerjaService::predikat(
            'dibawah ekspektasi',
            'dibawah ekspektasi'
        );

        $this->assertEquals('Sangat Kurang', $hasil);
    }
}
