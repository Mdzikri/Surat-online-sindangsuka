<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ajuan extends Model
{
    protected $fillable = ['user_id', 'penindak_id', 'jenis', 'keterangan', 'kades', 'ttd', 'acc', 'pesan_penolakan', 'nosurat', 'kode'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sku()
    {
        return $this->hasOne(Sku::class);
    }

    public function sk()
    {
        return $this->hasOne(Sk::class);
    }

    public function sktm()
    {
        return $this->hasOne(Sktm::class);
    }

    public function skck()
    {
        return $this->hasOne(Skck::class);
    }

    public function sd()
    {
        return $this->hasOne(Sd::class);
    }


    // tambahan
    public function belumMenikah()
    {
        return $this->hasOne(BelumMenikah::class);
    }

    public function sktb()
    {
        return $this->hasOne(Sktb::class);
    }

    public function bedaNama()
    {
        return $this->hasOne(BedaNama::class);
    }

    public function mohonKtp()
    {
        return $this->hasOne(MohonKtp::class);
    }
}
