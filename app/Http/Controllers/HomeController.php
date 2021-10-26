<?php

namespace App\Http\Controllers;

use App\Desa;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $desa = Desa::get()->first();
        $ajuans = auth()->user()->ajuans()->get();
        return view('home', compact(['ajuans', 'desa']));
    }

    public function suratSaya()
    {
        $desa = Desa::get()->first();
        $ajuans = auth()->user()->ajuans()->get();
        $adatolak = $ajuans->where('acc', 2);
        $adaterima = $ajuans->where('acc', 1);
        $adabelum = $ajuans->where('acc', 0);
        return view('user.surat-saya', compact(['ajuans', 'adatolak', 'adaterima', 'adabelum', 'desa']));
    }
    public function diterima()
    {
        $ajuans = auth()->user()->ajuans()->get();
        $adaterima = $ajuans->where('acc', 1);
        return view('user.navbar-surat.diterima', compact('adaterima'));
    }
    public function ditolak()
    {
        $ajuans = auth()->user()->ajuans()->get();
        $adatolak = $ajuans->where('acc', 2);
        return view('user.navbar-surat.ditolak', compact('adatolak'));
    }
    public function menunggu()
    {
        $ajuans = auth()->user()->ajuans()->get();
        $adabelum = $ajuans->where('acc', 0);
        return view('user.navbar-surat.menunggu', compact('adabelum'));
    }
}
