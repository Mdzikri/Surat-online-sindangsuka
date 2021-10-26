<?php

use App\Sk;
use App\Sku;
use App\Ajuan;
use Illuminate\Database\Seeder;

class AjuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ajuan::create([
            'user_id' => 1,
            'jenis' => 'Surat Domisili',
            'keterangan' => 'Saya mengajukan surat ini untuk kelengkapan administrasi',
            'acc' => 0,
        ]);

        Ajuan::create([
            'user_id' => 3,
            'jenis' => 'Surat Domisili',
            'keterangan' => 'Saya mengajukan surat ini untuk kelengkapan administrasi',
            'acc' => 0,
        ]);

        Ajuan::create([
            'user_id' => 1,
            'jenis' => 'SKCK',
            'keterangan' => 'Untuk ke polres Garut tanggal 9 Januari',
            'acc' => 0,
        ]);

        Ajuan::create([
            'user_id' => 5,
            'jenis' => 'SKCK',
            'keterangan' => 'Untuk ke polres Garut tanggal 9 Januari',
            'acc' => 0,
        ]);

        Ajuan::create([
            'user_id' => 1,
            'jenis' => 'SKTM',
            'keterangan' => 'Untuk pengajuan keringanan bayar listrik selama pandemi',
            'acc' => 0,
        ]);

        $sku = Ajuan::create([
            'user_id' => 1,
            'jenis' => 'Surat Keterangan Usaha',
            'keterangan' => 'Saya mengajukan surat ini untuk kelengkapan administrasi',
            'acc' => 0,
        ]);

        Sku::create([
            'ajuan_id' => $sku->id,
            'nama_usaha' => 'Keripik Emping Jagung',
            'alamat_usaha' => 'Komplek Permata Biru',
        ]);

        $sk = Ajuan::create([
            'user_id' => 1,
            'jenis' => 'Surat Kematian',
            'keterangan' => '-',
            'acc' => 0,
        ]);

        Sk::create([
            'ajuan_id' => $sk->id,
            'hubungan' => 'Keluarga',
            'nama_alm' => 'Mamin',
            'jk_alm' => 'Laki-laki',
            'umur_alm' => '59',
            'alamat_alm' => 'Bumi Panyawangan No.11',
            'agama_alm' => 'Islam',
            'hari' => 'Senin',
            'tanggal' => '19 April',
            'pukul' => '09.50',
            'tempat' => 'Garut',
            'penyebab' => 'Copit',
        ]);
    }
}
