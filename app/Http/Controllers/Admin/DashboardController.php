<?php

namespace App\Http\Controllers\Admin;

use App\Desa;
use App\User;
use App\Ajuan;
use App\Kades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $desa = Desa::get()->first();
        $antrian = Ajuan::where('acc', 0)->oldest()->paginate(10);
        $kades = Kades::where('status', 1)->first();
        $user = User::get()->count();
        return view('admin.dashboard.index', [
            'kades' => $kades,
            'antrian' => $antrian,
            'desa' => $desa,
            'user' => $user,
        ]);
    }
}
