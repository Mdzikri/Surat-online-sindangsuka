<?php

namespace App\Http\Controllers\Super;

use App\Desa;
use App\Kades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class KadesController extends Controller
{

    public function index(Kades $kades)
    {
        $desa = Desa::get()->first();
        $kades = $kades->get();
        $kades_aktif = Kades::get()->where('status', 1)->first();
        return view('super.kades.index', compact(['kades', 'kades_aktif', 'desa']));
    }

    public function aktifkan($id)
    {
        $kades = Kades::find($id);
        $kades_aktif = Kades::where('status', 1);
        if (isset($kades_aktif)) {
            $kades_aktif->update([
                'status' => 0,
            ]);
            $kades->update([
                'status' => 1,
            ]);
            return redirect(route('kades.index'))->with('status', 'Kades aktif telah diubah, mohon lengkapi foto ttd kades jika belum!')->with('warna', 'alert-success');
        } else {
            $kades->update([
                'status' => 1,
            ]);
            return redirect(route('kades.index'))->with('status', 'Kades aktif telah diubah, mohon lengkapi foto ttd kades jika belum!')->with('warna', 'alert-success');
        }
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required', 'nik' => 'required', 'ttl' => 'required', 'agama' => 'required', 'jk' => 'required', 'alamat' => 'required', 'jabatan' => 'required', 'periode' => 'required',
        ]);
        Kades::create($data);
        return redirect(route('kades.index'));
    }


    public function edit($id)
    {
        $desa = Desa::get()->first();
        $kades = Kades::find($id);
        return view('super.kades.edit', compact('kades', 'desa'));
    }


    public function update(Request $request, $id)
    {
        $kades = Kades::find($id);
        $data = $request->validate([
            'nama' => 'required', 'nik' => 'required', 'ttl' => 'required', 'agama' => 'required', 'jk' => 'required', 'alamat' => 'required', 'jabatan' => 'required', 'periode' => 'required',
        ]);
        $kades->update($data);
        return redirect(route('kades.index'));
    }

    public function foto(Request $request, $id)
    {
        $kades = Kades::find($id);
        $request->validate([
            'fotokades' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
            'ttdcap' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);
        // foto kades
        if ($request->hasFile('fotokades')) {
            // biar foto default yang dikasih nama kades.jpg gak kehapus kalau ada yang mau update pas pertama kali
            if ($kades->fotokades == 'kades.jpg') {
                // $extfotokades = $request->file('fotokades')->extension();
                // $fotokadesname = date('dmyHis') . '.' . $extfotokades;
                // Storage::putFileAs('public/fotokades', $request->file('fotokades'), $fotokadesname);
                $fotokadesname = $request->file('fotokades')->getClientOriginalName();
                $request->file('fotokades')->move('images/fotokades', $fotokadesname);
            } else {
                // Storage::delete('/public/fotokades/' . $kades->fotokades);
                // $extfotokades = $request->file('fotokades')->extension();
                // $fotokadesname = date('dmyHis') . '.' . $extfotokades;
                // Storage::putFileAs('public/fotokades', $request->file('fotokades'), $fotokadesname);
                File::delete('images/fotokades/' . $kades->fotokades);
                $fotokadesname = $request->file('fotokades')->getClientOriginalName();
                $request->file('fotokades')->move('images/fotokades', $fotokadesname);
            }
        } else {
            $fotokadesname = $kades->fotokades;
        }
        // ttd cap
        if ($request->hasFile('ttdcap')) {
            if ($kades->ttdcap) {
                // Storage::delete('/public/ttdcap/' . $kades->ttdcap);
                // $extttdcap = $request->file('ttdcap')->extension();
                // $ttdcapname = date('dmyHis') . '.' . $extttdcap;
                // Storage::putFileAs('public/ttdcap', $request->file('ttdcap'), $ttdcapname);
                File::delete('images/ttdcap/' . $kades->ttdcap);
                $ttdcapname = $request->file('ttdcap')->getClientOriginalName();
                $request->file('ttdcap')->move(
                    'images/ttdcap',
                    $ttdcapname
                );
            } else {
                // $extttdcap = $request->file('ttdcap')->extension();
                // $ttdcapname = date('dmyHis') . '.' . $extttdcap;
                // Storage::putFileAs('public/ttdcap', $request->file('ttdcap'), $ttdcapname);
                $ttdcapname = $request->file('ttdcap')->getClientOriginalName();
                $request->file('ttdcap')->move('images/ttdcap', $ttdcapname);
            }
        } else {
            $ttdcapname = $kades->ttdcap;
        }

        $kades->update([
            'fotokades' => $fotokadesname,
            'ttdcap' => $ttdcapname,
        ]);
        return redirect()->back();
    }


    public function destroy($id)
    {
        $kades = Kades::find($id);
        $kades->delete();
        return redirect(route('kades.index'));
    }
}
