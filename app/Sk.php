<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sk extends Model
{
    protected $fillable = ['ajuan_id', 'nomor', 'hubungan', 'nama_alm', 'jk_alm', 'umur_alm', 'alamat_alm', 'agama_alm', 'hari', 'tanggal', 'pukul', 'tempat', 'penyebab'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
