<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $fillable = ['nama_desa', 'alamat_kantor', 'logo_desa', 'kecamatan', 'kabupaten'];
}
