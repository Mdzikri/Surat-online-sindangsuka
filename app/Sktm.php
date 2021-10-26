<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sktm extends Model
{
    protected $fillable = ['ajuan_id', 'nomor'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
