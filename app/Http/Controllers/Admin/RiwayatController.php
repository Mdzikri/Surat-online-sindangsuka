<?php

namespace App\Http\Controllers\Admin;

use App\Desa;
use App\User;
use App\Ajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        $desa = Desa::get()->first();
        $user = User::get();
        // $penindak_id = Ajuan::get('penindak_id');
        // $penindak = User::get()->where('id', $penindak_id);
        // dump($penindak);
        $riwayat = Ajuan::whereIn('acc', [1, 2])->get();
        return view('admin.riwayat.index', compact('riwayat', 'desa', 'user'));
    }
}
