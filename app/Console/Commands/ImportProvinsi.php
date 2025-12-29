<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Provinsi;

class ImportProvinsi extends Command
{
    protected $signature = 'import:provinsi';
    protected $description = 'Import data provinsi dari wilayah.id';

    public function handle()
    {
        $response = Http::get('https://wilayah.id/api/provinces.json');

        if (!$response->successful()) {
            $this->error('Gagal mengambil data provinsi');
            return;
        }

        $data = $response->json()['data'];

        foreach ($data as $item) {
            Provinsi::updateOrCreate(
                ['kode' => $item['code']],
                ['nama' => $item['name']]
            );
        }

        $this->info('Import provinsi berhasil');
    }
}
