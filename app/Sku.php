<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    protected $fillable = ['ajuan_id', 'nomor', 'nama_usaha', 'alamat_usaha'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
