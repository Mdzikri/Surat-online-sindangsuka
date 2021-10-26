<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BelumMenikah extends Model
{
    protected $fillable = ['ajuan_id', 'tanggal_awal', 'tanggal_akhir'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
