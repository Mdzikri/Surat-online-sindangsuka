<?php

namespace App\Http\Controllers\Super;

use App\Desa;
use App\Rw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Rt;
use App\User;

class RwController extends Controller
{
    public function index()
    {
        $desa = Desa::get()->first();
        $rw = Rw::get();
        $rt = Rt::get();
        $user = User::get();
        return view('super.rt-rw.index', compact(['rw', 'user', 'rt', 'desa']));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'no' => 'required',
        ]);

        Rw::create($data);
        return redirect()->back();
    }

    public function edit($id)
    {
        $desa = Desa::get()->first();
        $user = User::get();
        $rw = Rw::get()->where('id', $id)->first();
        $rt = Rt::get()->where('rw_id', $id);
        $ketua = User::where('id', $rw->ketua)->first();

        if (isset($rw->ketua)) {
            $pilihan = 0;
        } else {
            $pilihan = 1;
        }

        return view('super.rt-rw.edit-rw', compact(['rw', 'pilihan', 'user', 'rt', 'ketua', 'desa', 'user']));
    }

    public function ganti(Request $request, $id)
    {
        // $desa = Desa::get()->first();
        // $user = User::get();
        // $rw = Rw::get()->where('id', $id)->first();
        // $rt = Rt::get()->where('rw_id', $id);
        // $ketua = User::where('id', $rw->ketua)->first();

        // $ketua->removeRole('admin');
        // $pilihan = 1;

        // $data = $request->validate([
        //     'ketua' => 'required',
        // ]);

        // $ketuabaru = User::where('id', $data['ketua'])->first();
        // $ketuabaru->assignRole('admin');

        // dd($ketuabaru);

        // $rw->update([
        //     'ketua' => $data['ketua'],
        // ]);

        // return view('super.rt-rw.edit-rw', compact(['rw', 'pilihan', 'rt', 'ketua', 'desa', 'user']));
        $desa = Desa::get()->first();
        $user = User::get();
        $rw = Rw::get()->where('id', $id)->first();
        $rt = Rt::get()->where('rw_id', $id);
        $ketua = User::where('id', $rw->ketua)->first();

        $pilihan = 1;
        $ketua->removeRole('admin');

        return view('super.rt-rw.edit-rw', compact(['pilihan', 'user', 'rt', 'rw', 'ketua', 'desa', 'user']));
    }

    public function updateKetua(Request $request, Rw $rw)
    {
        $data = $request->validate([
            'ketua' => 'required',
        ]);

        $ketua = User::where('id', $data['ketua'])->first();
        $ketua->assignRole('admin');

        $rw->update([
            'ketua' => $data['ketua'],
        ]);
        // $pilihan = 0;
        return redirect(route('rw.edit', $rw));
    }

    public function updateNo(Request $request, Rw $rw)
    {
        $data = $request->validate([
            'no' => 'required',
        ]);

        $rw->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $rw = Rw::where('id', $id);
        $rw->delete();
        return redirect()->back();
    }
}
