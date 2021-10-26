<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MohonKtp extends Model
{
    protected $fillable = ['ajuan_id', 'jenis_permohonan', 'no_kk', 'nama_kk', 'kode_pos'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
