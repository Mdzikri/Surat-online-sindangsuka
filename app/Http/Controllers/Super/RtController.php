<?php

namespace App\Http\Controllers\Super;

use App\Rt;
use App\Rw;
use App\Desa;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RtController extends Controller
{
    public function store(Request $request, $id)
    {
        $data = $request->validate([
            'no' => 'required',
        ]);
        $data['rw_id'] = $id;
        Rt::create($data);
        return redirect()->back();
    }

    public function edit($id)
    {
        $desa = Desa::get()->first();
        $user = User::get();
        $rt = Rt::get()->where('id', $id)->first();
        $ketua = User::where('id', $rt->ketua)->first();


        if (isset($rt->ketua)) {
            $pilihan = 0;
        } else {
            $pilihan = 1;
        }

        return view('super.rt-rw.edit-rt', compact(['pilihan', 'user', 'rt', 'ketua', 'desa', 'user']));
    }

    public function ganti($id)
    {
        $desa = Desa::get()->first();
        $user = User::get();
        $rt = Rt::get()->where('id', $id)->first();
        $ketua = User::where('id', $rt->ketua)->first();

        $pilihan = 2;

        return view('super.rt-rw.edit-rt', compact(['pilihan', 'user', 'rt', 'ketua', 'desa', 'user']));
    }

    public function updateKetua(Request $request, $id)
    {
        $rt = Rt::get()->where('id', $id)->first();
        $data = $request->validate([
            'ketua' => 'required',
        ]);

        $rt->update($data);
        // return redirect()->back();
        return redirect(route('rt.edit', $rt));
    }

    public function updateNo(Request $request, Rt $rt)
    {
        $data = $request->validate([
            'no' => 'required',
        ]);

        $rt->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $rt = Rt::where('id', $id);
        $rt->update(['no' => "-"]);
        return redirect()->back();
    }
}
