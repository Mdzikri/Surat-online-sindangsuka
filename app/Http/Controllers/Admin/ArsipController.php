<?php

namespace App\Http\Controllers\Admin;

use App\Desa;
use App\User;
use App\Ajuan;
use App\Kades;
use App\Exports\AjuansExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ArsipController extends Controller
{
    public function index()
    {
        $desa = Desa::get()->first();
        $arsip = Ajuan::where('acc', 1)->latest()->paginate();
        return view('admin.arsip.index', compact('arsip', 'desa'));
    }

    public function lihat($id)
    {
        $ajuan = Ajuan::find($id);
        $data['desa'] = Desa::get()->first();
        $data['ajuan'] = $ajuan;
        $data['user'] = User::find($ajuan->user_id);
        $data['kades'] = Kades::where('status', 1)->first();

        if ($ajuan->jenis == 'Surat Domisili') {
            $pdf = \PDF::loadView('arsip.sd', $data);
            return $pdf->stream('Surat Domisili.pdf');
        } else if ($ajuan->jenis == 'Surat Kematian') {
            $pdf = \PDF::loadView('arsip.sk', $data);
            return $pdf->stream('Surat Kematian.pdf');
        } else if ($ajuan->jenis == 'Surat Keterangan Usaha') {
            $pdf = \PDF::loadView('arsip.sku', $data);
            return $pdf->stream('Surat Keterangan Usaha.pdf');
        } else if ($ajuan->jenis == 'SKCK') {
            $pdf = \PDF::loadView('arsip.skck', $data);
            return $pdf->stream('SKCK.pdf');
        } else if ($ajuan->jenis == 'SKTM') {
            $pdf = \PDF::loadView('arsip.sktm', $data);
            return $pdf->stream('SKTM.pdf');
        } else if ($ajuan->jenis == 'SKTB') {
            $pdf = \PDF::loadView('arsip.sktb', $data);
            return $pdf->stream('SKTB.pdf');
        } else if ($ajuan->jenis == 'Surat Keterangan Beda Nama') {
            $pdf = \PDF::loadView('arsip.beda-nama', $data);
            return $pdf->stream('Surat Keterangan Beda Nama.pdf');
        } else if ($ajuan->jenis == 'Surat Keterangan Belum Menikah') {
            $pdf = \PDF::loadView('arsip.belum-menikah', $data);
            return $pdf->stream('Surat Keterangan Belum Menikah.pdf');
        } else if ($ajuan->jenis == 'Formulir Permohonan KTP') {
            $pdf = \PDF::loadView('arsip.mohon-ktp', $data);
            return $pdf->stream('Formulir Permohonan KTP.pdf');
        }
    }

    public function download($id)
    {
        $ajuan = Ajuan::find($id);
        $data['desa'] = Desa::get()->first();
        $data['ajuan'] = $ajuan;
        $data['user'] = User::find($ajuan->user_id);

        if ($ajuan->jenis == 'Surat Domisili') {
            $pdf = \PDF::loadView('arsip.sd', $data);
            return $pdf->download('Surat Domisili.pdf');
        } else if ($ajuan->jenis == 'Surat Kematian') {
            $pdf = \PDF::loadView('arsip.sk', $data);
            return $pdf->download('Surat Kematian.pdf');
        } else if ($ajuan->jenis == 'Surat Keterangan Usaha') {
            $pdf = \PDF::loadView('arsip.sku', $data);
            return $pdf->download('Surat Keterangan Usaha.pdf');
        } else if ($ajuan->jenis == 'SKCK') {
            $pdf = \PDF::loadView('arsip.skck', $data);
            return $pdf->download('SKCK.pdf');
        } else if ($ajuan->jenis == 'SKTM') {
            $pdf = \PDF::loadView('arsip.sktm', $data);
            return $pdf->download('SKTM.pdf');
        } else if ($ajuan->jenis == 'SKTB') {
            $pdf = \PDF::loadView('arsip.sktb', $data);
            return $pdf->download('SKTB.pdf');
        } else if ($ajuan->jenis == 'Surat Keterangan Beda Nama') {
            $pdf = \PDF::loadView('arsip.beda-nama', $data);
            return $pdf->download('Surat Keterangan Beda Nama.pdf');
        } else if ($ajuan->jenis == 'Surat Keterangan Belum Menikah') {
            $pdf = \PDF::loadView('arsip.belum-menikah', $data);
            return $pdf->download('Surat Keterangan Belum Menikah.pdf');
        } else if ($ajuan->jenis == 'Formulir Permohonan KTP') {
            $pdf = \PDF::loadView('arsip.mohon-ktp', $data);
            return $pdf->download('Formulir Permohonan KTP.pdf');
        }
    }


    // LAPORAN
    public function laporan()
    {
        return Excel::download(new AjuansExport, 'surat-keluar.xlsx');
    }
}
