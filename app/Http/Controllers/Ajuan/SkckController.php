<?php

namespace App\Http\Controllers\Ajuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkckController extends Controller
{
    public function create()
    {
        return view('skck.create');
    }

    public function store(Request $request)
    {
        $skck = $request->validate([
            'keterangan' => 'required',
        ]);
        auth()->user()->skck()->create($skck);
    }

    public function destroy($id)
    {
        //
    }
}
