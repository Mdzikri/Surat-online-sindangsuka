<?php

namespace App\Http\Controllers\Super;

use App\Desa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class DesaController extends Controller
{

    public function index()
    {
        $desa = Desa::get()->first();
        return view('super.desa.index', compact('desa'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_desa' => 'required', 'alamat_kantor' => 'required', 'kecamatan' => 'required', 'kabupaten' => 'required'
        ]);
        Desa::create($data);
        return redirect(route('desa.index'))->with('status', 'Data Desa berhasil disimpan!')->with('warna', 'alert-info');
    }

    public function logo(Request $request, $id)
    {
        $logo_desa = Desa::find($id);
        $request->validate([
            'logo_desa' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);
        // foto logo_desa
        if ($request->hasFile('logo_desa')) {
            if ($logo_desa->logo_desa == 'logo_desa.jpg') {
                $logo_desaname = $request->file('logo_desa')->getClientOriginalName();
                $request->file('logo_desa')->move('images/', $logo_desaname);
            } else {
                File::delete('images/' . $logo_desa->logo_desa);
                $logo_desaname = $request->file('logo_desa')->getClientOriginalName();
                $request->file('logo_desa')->move('images/', $logo_desaname);
            }
        } else {
            $logo_desaname = $logo_desa->logo_desa;
        }

        $logo_desa->update([
            'logo_desa' => $logo_desaname,
        ]);
        return redirect()->back();
    }

    public function update(Request $request)
    {
    }
}
