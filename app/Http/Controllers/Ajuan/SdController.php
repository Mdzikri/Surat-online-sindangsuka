<?php

namespace App\Http\Controllers\Ajuan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SdController extends Controller
{
    public function create()
    {
        $punya = auth()->user()->sd_id;
        return view('sd.create', [
            'punya' => $punya,
        ]);
    }

    public function store(Request $request)
    {
        $sd = $request->validate([
            'keterangan' => 'required',
        ]);
        auth()->user()->sd()->create($sd);
    }
}
