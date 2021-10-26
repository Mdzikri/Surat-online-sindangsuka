<?php

namespace App\Http\Controllers\Ajuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkController extends Controller
{

    public function create()
    {
        return view('sk.create');
    }

    public function store(Request $request)
    {
        $sk = $request->validate([
            'keterangan' => 'required',
        ]);
        auth()->user()->sk()->create($sk);
    }

    public function destroy($id)
    {
        //
    }
}
