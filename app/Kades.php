<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kades extends Model
{
    protected $fillable = ['nama', 'nik', 'ttl', 'agama', 'jk', 'alamat', 'jabatan', 'periode', 'ttdcap', 'fotokades', 'status'];
}
