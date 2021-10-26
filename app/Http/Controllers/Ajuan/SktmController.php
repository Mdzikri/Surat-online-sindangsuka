<?php

namespace App\Http\Controllers\Ajuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SktmController extends Controller
{
    public function create()
    {
        return view('sktm.create');
    }

    public function store(Request $request)
    {
        $sktm = $request->validate([
            'keterangan' => 'required',
        ]);
        auth()->user()->sktm()->create($sktm);
    }

    public function destroy($id)
    {
        //
    }
}
