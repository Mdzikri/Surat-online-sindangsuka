<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    protected $fillable = ['no', 'ketua'];

    public function rt()
    {
        return $this->hasMany(Rt::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
