<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sktb extends Model
{
    protected $fillable = ['ajuan_id', 'properti', 'lokasi', 'luas', 'atas_nama', 'harga'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
