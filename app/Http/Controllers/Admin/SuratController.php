<?php

namespace App\Http\Controllers\Admin;

use App\Desa;
use App\Keperluan;
use App\PesanPenolakan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratController extends Controller
{
    public function index()
    {
        $desa = Desa::get()->first();
        $keperluan = Keperluan::get();
        $pesan_penolakan = PesanPenolakan::get();

        return view('admin.surat.index', [
            'keperluan' => $keperluan,
            'pesan_penolakan' => $pesan_penolakan,
            'desa' => $desa,
        ]);
    }
}
