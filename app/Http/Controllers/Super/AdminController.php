<?php

namespace App\Http\Controllers\Super;

use App\Desa;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Traits\HasRoles;

class AdminController extends Controller
{
    use HasRoles;
    public function index()
    {
        $desa = Desa::get()->first();
        $admin = User::role('admin')->get();
        $superadmin = User::role('superadmin')->get();
        return view('super.admin.index', [
            'admin' => $admin,
            'superadmin' => $superadmin,
            'desa' => $desa,
        ]);
    }

    public function create()
    {
        // $users = !(User::permission('setingumum'))->get();
        $desa = Desa::get()->first();
        $users = User::get();
        return view('super.admin.create', [
            'users' => $users,
            'desa' => $desa,
        ]);
    }

    public function store($id)
    {
        $user = User::findOrFail($id);
        $user->assignRole('admin');
        $user->removeRole('user');
        return redirect(route('admin.index'));
    }


    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->assignRole('user');
        $admin->removeRole('admin');
        return redirect(route('admin.index'));
    }
}
