<?php

namespace App\Http\Controllers\User;

use App\Desa;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rt;
use App\Rw;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function editProfil()
    {
        $desa = Desa::get()->first();
        $rt = Rt::get();
        $rw = Rw::get();
        $user = auth()->user();
        return view('user.edit-profil', compact(['user', 'desa', 'rt', 'rw']));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'no_kk' => 'required',
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

        // dump($data['rt_id']);
        // dump($data['rw_id']);

        // edit profil user
        $user->update($data);
        return redirect()->back();
    }

    public function gantiPassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'password' => 'required',
        ]);

        if (!(Hash::check($request->passwordlama, $user->password))) {
            // $data = bcrypt($request->passwordbaru);
            // // edit profil user
            // $user->update($data);
            // return redirect(route('edit.profil'));
            return redirect(route('home'));
        } else {
            // echo "salah";
            return redirect(route('lengkapi.profil'));
        }
    }

    public function lengkapiProfil()
    {
        $desa = Desa::get()->first();
        $user = auth()->user();
        if ($user->status_lengkap) {
            // alihkan ke halaman anda error redirect yang nampilin data kelengkapan dan tombol ke edit lengkapi profil (method yang bawah)
        }
        return view('user.lengkapi-profil', compact('user', 'desa'));
    }

    public function storeLengkapi(Request $request)
    {
        // nangkep user
        $id = Auth::user()->id;
        $user = User::find($id);

        if ($user->status_lengkap == 1) {
            $data = $request->validate([
                'penghasilan' => 'required',
                'telp' => 'required',
                'fotoktp' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
                'fotokk' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
            ]);
            if ($request->hasFile('fotoktp')) {
                // Storage::delete('/public/fotoktp/' . $user->fotoktp);
                // $extktp = $request->file('fotoktp')->extension();
                // $request->fotoktp = date('dmyHis') . '.' . $extktp;
                // Storage::putFileAs('public/fotoktp', $request->file('fotoktp'), $request->fotoktp);

                File::delete('images/fotoktp/' . $user->fotoktp);
                $fotoktpname = $user->nik . "-ktp." . $request->file('fotoktp')->clientExtension();
                $request->file('fotoktp')->move('images/fotoktp', $fotoktpname);
            }
            if ($request->hasFile('fotokk')) {
                // Storage::delete('/public/fotokk/' . $user->fotokk);
                // $extkk = $request->file('fotokk')->extension();
                // $request->fotokk = date('dmyHis') . '.' . $extkk;
                // Storage::putFileAs('public/fotokk', $request->file('fotokk'), $request->fotokk);

                File::delete('images/fotokk/' . $user->fotokk);
                $fotokkname = $request->file('fotokk')->getClientOriginalName();
                $request->file('fotokk')->move('images/fotokk', $fotokkname);
            }
            if (!$request->hasFile('fotoktp')) {
                $request->fotoktp = $user->fotoktp;
            }
            if (!$request->hasFile('fotokk')) {
                $request->fotokk = $user->fotokk;
            }

            // lengkapi pake update ga pake insert
            $user->update([
                'penghasilan' => $data['penghasilan'],
                'telp' => $data['telp'],
                'fotoktp' => $request->fotoktp,
                'fotokk' => $request->fotokk,
            ]);
        } else if ($user->status_lengkap == 0) {
            // validasi
            $data = $request->validate([
                'penghasilan' => 'required',
                'telp' => 'required',
                'fotoktp' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
                'fotokk' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            ]);
            $data['status_lengkap'] = 1;
            // store image ke storage
            $extktp = $request->file('fotoktp')->extension();
            $extkk = $request->file('fotokk')->extension();
            $fotoktpname = date('dmyHis') . '.' . $extktp;
            $fotokkname = date('dmyHis') . '.' . $extkk;
            // Storage::putFileAs('public/fotoktp', $request->file('fotoktp'), $ktpname);
            // Storage::putFileAs('public/fotokk', $request->file('fotokk'), $kkname);


            // $fotoktpname = $request->file('fotoktp')->getClientOriginalName();
            // $fotokkname = $request->file('fotokk')->getClientOriginalName();

            // lengkapi pake update ga pake insert
            $user->update([
                'penghasilan' => $data['penghasilan'],
                'telp' => $data['telp'],
                'fotoktp' => $fotoktpname,
                'fotokk' => $fotokkname,
                'status_lengkap' => $data['status_lengkap'],
            ]);
            // dump($fotokkname);
            $request->file('fotoktp')->move('images/fotoktp', $fotoktpname);
            $request->file('fotokk')->move('images/fotokk', $fotokkname);


            // nambahin permission lengkap ke user
            $user->givePermissionTo('lengkap');
        }

        return redirect('sktm');
    }
}
