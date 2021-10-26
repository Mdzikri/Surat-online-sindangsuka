<?php

namespace App\Http\Controllers\Ajuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkuController extends Controller
{
    public function create()
    {
        return view('sku.create');
    }

    public function store(Request $request)
    {
        $sku = $request->validate([
            'keterangan' => 'required',
        ]);
        auth()->user()->sku()->create($sku);
    }

    public function destroy($id)
    {
        //
    }
}
