<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'nama', 'nik', 'no_kk', 'ttl', 'agama', 'jk', 'status', 'pekerjaan', 'rt_id', 'rw_id', 'alamat', 'kewarganegaraan', 'nama_ibu', 'nama_ayah', 'pendidikan', 'telp', 'penghasilan', 'pasfoto', 'fotoktp', 'fotokk', 'status_lengkap', 'status_user', 'password', 'status_verifikasi',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ajuans()
    {
        return $this->hasMany(Ajuan::class);
    }

    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }

    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
}
