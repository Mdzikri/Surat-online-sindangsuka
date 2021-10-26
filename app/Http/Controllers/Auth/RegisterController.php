<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Rt;
use App\Rw;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:16', 'min:16', 'unique:users'],
            'no_kk' => ['required', 'string', 'max:16', 'min:16'],
            'ttl' => ['required', 'string', 'max:255'],
            'agama' => ['required', 'string', 'max:20'],
            'jk' => ['required', 'string', 'max:20'],
            'status' => ['required', 'string', 'max:20'],
            'pendidikan' => ['required', 'string', 'max:30'],
            'pekerjaan' => ['required', 'string', 'max:255'],
            'nama_ibu' => ['required', 'string', 'max:30'],
            'nama_ayah' => ['required', 'string', 'max:30'],
            'rt_id' => ['required', 'string', 'max:20'],
            'rw_id' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string', 'max:255'],
            'kewarganegaraan' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nama' => $data['nama'],
            'nik' => $data['nik'],
            'no_kk' => $data['no_kk'],
            'ttl' => $data['ttl'],
            'agama' => $data['agama'],
            'jk' => $data['jk'],
            'status' => $data['status'],
            'nama_ibu' => $data['nama_ibu'],
            'nama_ayah' => $data['nama_ayah'],
            'pendidikan' => $data['pendidikan'],
            'pekerjaan' => $data['pekerjaan'],
            'rt_id' => $data['rt_id'],
            'rw_id' => $data['rw_id'],
            'alamat' => $data['alamat'],
            'kewarganegaraan' => $data['kewarganegaraan'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
