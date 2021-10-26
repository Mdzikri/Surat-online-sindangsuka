<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    protected $fillable = ['rw_id', 'no', 'ketua'];

    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
