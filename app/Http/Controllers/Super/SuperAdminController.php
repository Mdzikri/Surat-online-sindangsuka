<?php

namespace App\Http\Controllers\Super;


use App\Desa;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuperAdminController extends Controller
{
    public function create()
    {
        $desa = Desa::get()->first();
        $users = User::get();
        return view('super.super-admin.create', [
            'users' => $users,
            'desa' => $desa,
        ]);
    }

    public function store($id)
    {
        $user = User::findOrFail($id);
        $user->assignRole('superadmin');
        $user->removeRole('user');
        return redirect(route('admin.index'));
    }

    public function toAdmin($id)
    {
        if ($id == 1) {
            return redirect(route('admin.index'))->with('status', 'Anda tidak bisa mencopot izin dari Super Admin Master!')->with('warna', 'alert-danger');
        }
        $spr = User::find($id);
        $spr->assignRole('admin');
        $spr->removeRole('superadmin');
        return redirect(route('admin.index'));
    }

    public function toUser($id)
    {
        if ($id == 1) {
            return redirect(route('admin.index'))->with('status', 'Anda tidak bisa mencopot izin dari Super Admin Master!')->with('warna', 'alert-danger');
        }
        $spr = User::find($id);
        $spr->assignRole('user');
        $spr->removeRole('superadmin');
        return redirect(route('admin.index'));
    }
}
