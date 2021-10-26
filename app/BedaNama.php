<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BedaNama extends Model
{
    protected $fillable = ['ajuan_id', 'perbedaan', 'dokumen1', 'data1', 'dokumen2', 'data2'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
