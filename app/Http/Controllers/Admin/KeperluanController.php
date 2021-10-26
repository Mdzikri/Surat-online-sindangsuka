<?php

namespace App\Http\Controllers\Admin;

use App\Keperluan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeperluanController extends Controller
{
    public function index()
    {
        // $keperluan = Keperluan::get();
        // return view('admin.surat.index', compact('keperluan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'keperluan' => 'required',
        ]);

        Keperluan::create($data);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $keperluan = Keperluan::find($id);
        $data = $request->validate(['keperluan' => 'required']);
        $keperluan->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $keperluan = Keperluan::where('id', $id);
        $keperluan->delete();
        return redirect()->back();
    }
}
