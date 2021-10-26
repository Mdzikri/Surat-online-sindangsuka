<?php

use App\Kades;
use Illuminate\Database\Seeder;

class KadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kades::create([
            'nama' => 'Ade Rustiana',
            'nik' => '1349810350',
            'ttl' => 'Bandung, 4 Mei 1970',
            'agama' => 'Islam',
            'jk' => 'Laki-laki',
            'alamat' => 'Kp. Kopeng RT 01/01',
            'jabatan' => 'Kepala Desa',
            'periode' => '2015-2020',
            'status' => 1,
            'ttdcap' => 'ttd1.png',
        ]);

        Kades::create([
            'nama' => 'Turnawan',
            'nik' => '1349810351',
            'ttl' => 'Garut, 4 April 1953',
            'agama' => 'Islam',
            'jk' => 'Laki-laki',
            'alamat' => 'Kp. Kopeng RT 02/02',
            'jabatan' => 'Kepala Desa',
            'periode' => '2010-2015',
            'status' => 0,
        ]);
    }
}
