<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PesanPenolakan;
use Illuminate\Http\Request;

class PesanPenolakanController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'isi' => 'required',
        ]);
        PesanPenolakan::create($data);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $pesan_penolakan = PesanPenolakan::find($id);
        $data = $request->validate(['isi' => 'required']);
        $pesan_penolakan->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $pesan_penolakan = PesanPenolakan::where('id', $id);
        $pesan_penolakan->delete();
        return redirect()->back();
    }
}
