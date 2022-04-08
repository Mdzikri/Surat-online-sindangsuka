<?php

namespace App\Http\Controllers\Admin;

use App\Rt;
use App\Rw;
use App\Desa;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
        $rtnya = Rt::where('id', $user->rt_id);
        $rwnya = Rw::where('id', $user->rw_id);
        $desa = Desa::get()->first();
        $rt = Rt::get();
        $rw = Rw::get();
        return view('admin.user.show', compact('user', 'desa', 'rt', 'rw', 'rtnya', 'rwnya'));
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
            'rt_id' => 'required',
            'rw_id' => 'required',
            'alamat' => 'required',
            'kewarganegaraan' => 'required',
        ]);

        $user->update($data);
        return redirect('/user');
    }

    public function nonAktifkan($id)
    {
        $user = User::find($id);
        $user->update([
            'status_verifikasi' => 0
        ]);
        return redirect()->back();
    }

    public function verifikasi($id)
    {
        $user = User::find($id);
        $user->update([
            'status_verifikasi' => 1
        ]);
        return redirect()->back();
    }

    public function resetPassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'password' => 'required',
        ]);
        $user->forceFill([
            'password' => Hash::make($request->password)
        ]);
        $user->save();
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
