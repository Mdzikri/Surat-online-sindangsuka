<?php

namespace App\Http\Controllers\Admin;

use App\Desa;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rt;
use App\Rw;
use Illuminate\Support\Facades\Storage;

class PendudukController extends Controller
{
    public function index()
    {
        $desa = Desa::get()->first();
        $users = User::latest()->paginate(15);
        $rt = Rt::get();
        $rw = Rw::get();
        return view('admin.user.index', ['users' => $users, 'desa' => $desa, 'rt' => $rt, 'rw' => $rw]);
    }

    public function show(User $user)
    {
        $desa = Desa::get()->first();
        $rt = Rt::get();
        $rw = Rw::get();
        return view('admin.user.show', compact('user', 'desa', 'rt', 'rw'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'ttl' => 'required',
            'agama' => 'required',
            'jk' => 'required',
            'status' => 'required',
            'pekerjaan' => 'required',
            'rt_rw' => 'required',
            'alamat' => 'required',
            'kewarganegaraan' => 'required',
        ]);

        $user->update($data);
        return redirect('/user');
    }

    public function destroy($id)
    {
        // $user = User::findOrFail($id);
        // $user->ajuans()->delete();
        // Storage::delete('/public/fotoktp/' . $user->fotoktp);
        // Storage::delete('/public/fotokk/' . $user->fotokk);
        // $user->delete();
        // return redirect(route('user.index'));
        if ($id == 1) {
            return redirect(route('user.index'))->with('status', 'Anda tidak bisa menon-aktifkan Super Admin Master!')->with('warna', 'alert-danger');
        }

        $user = User::findOrFail($id);
        $user->update(['status_verifikasi' => 0]);
        return redirect(route('user.index'))->with('status', 'user telah dinon-aktifkan')->with('warna', 'alert-success');
    }
}
