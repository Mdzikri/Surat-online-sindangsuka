<?php

use App\Keperluan;
use Illuminate\Database\Seeder;

class KeperluanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keperluan::create([
            'keperluan' => 'Mohon SKCK ke Polres Garut',
        ]);
        Keperluan::create([
            'keperluan' => 'Perlengkapan Administrasi',
        ]);
        Keperluan::create([
            'keperluan' => 'Pengajuan Keringanan Biaya Listrik (Listrik Bersubsidi)',
        ]);
        Keperluan::create([
            'keperluan' => 'Laporan Kematian',
        ]);
    }
}
