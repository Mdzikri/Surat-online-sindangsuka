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
        return view('super.rt-rw.index', compact(['rw', 'rt', 'desa']));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'no' => 'required',
            'ketua' => 'required',
        ]);
        // dump($data['ketua']);
        $nik = $data['ketua'];
        $ketua = User::where('nik', $nik)->first();
        if (!isset($ketua)) {
            return redirect()->back()->with('status', 'ketua RW belum melakukan pendaftaran pada website ini. silahkan yang bersangkutan untuk registrasi terlebih dahulu!')->with('warna', 'alert-danger');
        }
        // dump($ketua);

        $ketua->assignRole('admin');

        $data['ketua'] = $ketua->nama;

        Rw::create($data);
        return redirect()->back();
    }

    public function show(Rw $rw)
    {
        //
    }

    public function edit(Rw $rw)
    {
        //
    }

    public function update(Request $request, Rw $rw)
    {
        echo "Updated";
    }

    public function destroy($id)
    {
        $rw = Rw::where('id', $id);
        $rw->delete();
        return redirect()->back();
    }
}
