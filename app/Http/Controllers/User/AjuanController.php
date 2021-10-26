<?php

namespace App\Http\Controllers\User;

use App\Desa;
use App\Ajuan;
use App\Exports\AjuansExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AjuanController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis' => 'required',
            'keterangan' => 'required',
        ]);

        if ($request->jenis == 'Surat Domisili') {
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Domisili')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Domisili')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->sd()->create();
                    return redirect(route('suratsaya'))->with('status', 'Surat Domisili berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Domisili lagi. Tunggu sampai Surat Domisili Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Domisili Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->sd()->create();
                return redirect(route('suratsaya'))->with('status', 'Surat Domisili berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Keterangan Belum Menikah') {
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Belum Menikah')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Belum Menikah')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->belumMenikah()->create();
                    return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Belum Menikah berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Belum Menikah lagi. Tunggu sampai Surat Keterangan Belum Menikah Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Belum Menikah Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->belumMenikah()->create();
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Belum Menikah berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Keterangan Usaha') {
            $sku = $request->validate([
                'nama_usaha' => 'required', 'alamat_usaha' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Usaha')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Usaha')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->sku()->create($sku);
                    return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Usaha berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Usaha lagi. Tunggu sampai Surat Keterangan Usaha Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Usaha Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->sku()->create($sku);
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Usaha berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        // skck baru
        if ($request->jenis == 'SKCK') {
            $cek = auth()->user()->ajuans()->where('jenis', 'SKCK')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'SKCK')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->skck()->create();
                    return redirect(route('suratsaya'))->with('status', 'SKCK berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan SKCK lagi. Tunggu sampai SKCK Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan SKCK Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->skck()->create();
                return redirect(route('suratsaya'))->with('status', 'SKCK berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        // skck baru
        if ($request->jenis == 'SKTM') {
            $cek = auth()->user()->ajuans()->where('jenis', 'SKTM')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'SKTM')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->sktm()->create();
                    return redirect(route('suratsaya'))->with('status', 'SKTM berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan SKTM lagi. Tunggu sampai SKTM Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan SKTM Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->sktm()->create();
                return redirect(route('suratsaya'))->with('status', 'SKTM berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Kematian') {
            $sk = $request->validate([
                'hubungan' => 'required',
                'nama_alm' => 'required',
                'jk_alm' => 'required',
                'umur_alm' => 'required',
                'alamat_alm' => 'required',
                'agama_alm' => 'required',
                'hari' => 'required',
                'tanggal' => 'required',
                'pukul' => 'required',
                'tempat' => 'required',
                'penyebab' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Kematian')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Kematian')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->sk()->create($sk);
                    return redirect(route('suratsaya'))->with('status', 'Surat Kematian berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Kematian lagi. Tunggu sampai Surat Kematian Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Kematian Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->sk()->create($sk);
                return redirect(route('suratsaya'))->with('status', 'Surat Kematian berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Surat Keterangan Beda Nama') {
            $bedaNama = $request->validate([
                'perbedaan' => 'required',
                'dokumen1' => 'required',
                'data1' => 'required',
                'dokumen2' => 'required',
                'data2' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Beda Nama')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Surat Keterangan Beda Nama')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->bedaNama()->create($bedaNama);
                    return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Beda Nama berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Surat Keterangan Beda Nama lagi. Tunggu sampai Surat Keterangan Beda Nama Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Surat Keterangan Beda Nama Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->bedaNama()->create($bedaNama);
                return redirect(route('suratsaya'))->with('status', 'Surat Keterangan Beda Nama berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'SKTB') {
            $sktb = $request->validate([
                'properti' => 'required',
                'luas' => 'required',
                'lokasi' => 'required',
                'atas_nama' => 'required',
                'harga' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'SKTB')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'SKTB')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->sktb()->create($sktb);
                    return redirect(route('suratsaya'))->with('status', 'SKTB berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan SKTB lagi. Tunggu sampai SKTB Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan SKTB Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->sktb()->create($sktb);
                return redirect(route('suratsaya'))->with('status', 'SKTB berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }

        if ($request->jenis == 'Formulir Permohonan KTP') {
            $mohonKtp = $request->validate([
                'jenis_permohonan' => 'required',
                'no_kk' => 'required|max:16|min:16',
                'nama_kk' => 'required',
                'kode_pos' => 'required',
            ]);
            $cek = auth()->user()->ajuans()->where('jenis', 'Formulir Permohonan KTP')->get();
            if ($cek->count() != 0) {
                if (auth()->user()->ajuans()->where('jenis', 'Formulir Permohonan KTP')->where('acc', 0)->doesntExist()) {
                    $aj = auth()->user()->ajuans()->create($data);
                    $aj->mohonKtp()->create($mohonKtp);
                    return redirect(route('suratsaya'))->with('status', 'Formulir Permohonan KTP berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
                } else {
                    return redirect(route('home'))->with('status', 'Anda belum bisa mengajukan Formulir Permohonan KTP lagi. Tunggu sampai Formulir Permohonan KTP Anda yang sebelumnya disetujui oleh Admin Desa. Atau, batalkan pengajuan Formulir Permohonan KTP Anda yang sebelumnya')->with('warna', 'alert-danger');
                }
            } else {
                $aj = auth()->user()->ajuans()->create($data);
                $aj->mohonKtp()->create($mohonKtp);
                return redirect(route('suratsaya'))->with('status', 'Formulir Permohonan KTP berhasil diajukan. Mohon menunggu persetujuan untuk memperoleh surat Anda!')->with('warna', 'alert-info');
            }
        }
    }

    public function destroy($id)
    {
        $ajuan = Ajuan::where('id', $id);
        $ajuan->delete();
        return redirect()->back();
    }

    public function sdForm()
    {
        $desa = Desa::get()->first();
        return view('form-ajuan.sd', compact(['desa']));
    }

    public function skForm()
    {
        $desa = Desa::get()->first();
        return view('form-ajuan.sk', compact(['desa']));
    }

    public function skuForm()
    {
        $desa = Desa::get()->first();
        return view('form-ajuan.sku', compact(['desa']));
    }

    public function skckForm()
    {
        $desa = Desa::get()->first();
        return view('form-ajuan.skck', compact(['desa']));
    }

    public function sktmForm()
    {
        $desa = Desa::get()->first();
        return view('form-ajuan.sktm', compact(['desa']));
    }

    public function sktbForm()
    {
        $desa = Desa::get()->first();
        return view('form-ajuan.sktb', compact(['desa']));
    }

    public function belumMenikahForm()
    {
        $desa = Desa::get()->first();
        return view('form-ajuan.belum-menikah', compact(['desa']));
    }

    public function bedaNamaForm()
    {
        $desa = Desa::get()->first();
        return view('form-ajuan.beda-nama', compact(['desa']));
    }

    public function mohonKtpForm()
    {
        $desa = Desa::get()->first();
        return view('form-ajuan.mohon-ktp', compact(['desa']));
    }
}
