<?php

use App\PesanPenolakan;
use Illuminate\Database\Seeder;

class PesanPenolakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PesanPenolakan::create([
            'isi' => 'Data yang anda masukan belum benar',
        ]);
        PesanPenolakan::create([
            'isi' => 'Data pengajuan yang anda masukan tidak tepat',
        ]);
        PesanPenolakan::create([
            'isi' => 'Data yang anda masukan tidak sesuai standar aturan desa',
        ]);
    }
}
