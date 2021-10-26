<?php

namespace App\Http\Controllers\Super;

use App\Rt;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RtController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'rw_id' => 'required',
            'no' => 'required',
            'ketua' => 'required',
        ]);

        // Tambah Ketua RT
        $nik = $data['ketua'];
        $ketua = User::where('nik', $nik)->first();
        if (!isset($ketua)) {
            return redirect()->back()->with('status', 'ketua RT belum melakukan pendaftaran pada website ini. silahkan yang bersangkutan untuk registrasi terlebih dahulu!')->with('warna', 'alert-danger');
        }
        $data['ketua'] = $ketua->nama;

        // pengulangan membuat no rt
        // $jumlah_rt = $data['jumlah_rt'];
        // for ($i = 1; $i == $jumlah_rt; $i++) {
        //     Rt::create([
        //         'rw_id' => $data['rw_id'],
        //         'no' => $i,
        //     ]);
        // }
        Rt::create($data);
        return redirect()->back();
    }

    public function show(Rt $rt)
    {
        //
    }

    public function edit(Rt $rt)
    {
        //
    }

    public function update(Request $request, Rt $rt)
    {
        echo "Updated";
    }

    public function destroy(Rt $rt)
    {
        echo "Destroy";
    }
}
