<?php

namespace App\Http\Controllers\Admin;

use App\Sd;
use App\Sk;
use App\Sku;
use App\Desa;
use App\Skck;
use App\Sktm;
use App\Ajuan;
use App\BedaNama;
use App\BelumMenikah;
use App\Kades;
use App\Keperluan;
use App\PesanPenolakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\MohonKtp;
use App\Sktb;
use Illuminate\Support\Facades\Auth;

class AntrianController extends Controller
{

    public function index()
    {
        $desa = Desa::get()->first();
        $antrian = Ajuan::where('acc', 0)->oldest()->paginate(10);
        return view('admin.antrian.index', ['antrian' => $antrian, 'desa' => $desa]);
    }


    public function show($id)
    {
        $desa = Desa::get()->first();
        $ajuan = Ajuan::find($id);
        return view('admin.antrian.show', compact('ajuan', 'desa'));
    }


    public function edit($id)
    {
        $desa = Desa::get()->first();
        $ajuan = Ajuan::find($id);
        $keperluan = Keperluan::get();
        $pesan_penolakan = PesanPenolakan::get();
        return view('admin.antrian.edit', compact(['ajuan', 'keperluan', 'pesan_penolakan', 'desa']));
    }


    public function updateSK(Request $request, $id)
    {
        $kades_aktif = Kades::where('status', 1)->first();

        if (is_null($kades_aktif->ttdcap)) {
            return redirect(route('antrian.index'))->with('status', 'Mohon upload file Ttd dan Cap pada kades aktif terlebih dahulu, sebelum anda menyetujui ajuan surat.')->with('warna', 'alert-danger');
        } else {
            $request->validate([
                'keterangan' => 'required',
            ]);
            $ajuan = Ajuan::find($id);

            // Penomoran Surat
            $stringtetap = '474.2004';
            $bulan = (int)date('n');
            $bulanromawi = $this->getRomawi($bulan);
            $tahun = date('Y');

            // Nomor yang bertambah otomatis dan diulang dari 1 ketika awal bulan
            $urutan = Sk::max('nomor');

            $ajuansblm = Sk::where('nomor', $urutan)->first();
            $bulansblm = (int)$ajuansblm->created_at->format('n');

            if ($bulan = $bulansblm) {
                $urutan = $urutan + 1;
            } elseif ($bulan != $bulansblm) {
                $urutan = 1;
            }
            $nosurat = $stringtetap . '/' . $bulanromawi . '/' . $urutan . '/' . $tahun;

            $ajuan->update([
                'kades' => $kades_aktif->nama,
                'ttd' => $kades_aktif->ttdcap,
                'acc' => 1,
                'keterangan' => request('keterangan'),
                'nosurat' => $nosurat,
                'penindak' => Auth::user()->nama,
            ]);
            $ajuan->sk()->update([
                'nomor' => $urutan,
            ]);

            return redirect(route('antrian.index'));
        }
    }

    public function updateBelumMenikah(Request $request, $id)
    {
        $kades_aktif = Kades::where('status', 1)->first();

        if (is_null($kades_aktif->ttdcap)) {
            return redirect(route('antrian.index'))->with('status', 'Mohon upload file Ttd dan Cap pada kades aktif terlebih dahulu, sebelum anda menyetujui ajuan surat.')->with('warna', 'alert-danger');
        } else {
            $request->validate([
                'keterangan' => 'required',
            ]);
            $ajuan = Ajuan::find($id);

            // Penomoran Surat
            $stringtetap = '474.2004';
            $bulan = (int)date('n');
            $bulanromawi = $this->getRomawi($bulan);
            $tahun = date('Y');

            // Nomor yang bertambah otomatis dan diulang dari 1 ketika awal bulan
            $tabel_kosong = DB::table('belum_menikahs')->count();
            if ($tabel_kosong == 0) {
                $urutan = 1;
            } else {
                $urutan = BelumMenikah::max('nomor');
                $ajuansblm = BelumMenikah::where('nomor', $urutan)->first();
                $bulansblm = (int)$ajuansblm->created_at->format('n');

                if ($bulan = $bulansblm) {
                    $urutan = $urutan + 1;
                } else {
                    $urutan = 1;
                }
            }

            $nosurat = $stringtetap . '/' . $bulanromawi . '/' . $urutan . '/' . $tahun;

            $ajuan->belumMenikah()->update([
                'nomor' => $urutan,
            ]);
            $ajuan->update([
                'kades' => $kades_aktif->nama,
                'ttd' => $kades_aktif->ttdcap,
                'acc' => 1,
                'keterangan' => request('keterangan'),
                'nosurat' => $nosurat,
                'penindak' => Auth::user()->nama,
            ]);

            return redirect(route('antrian.index'));
        }
    }

    public function updateBedaNama(Request $request, $id)
    {
        $kades_aktif = Kades::where('status', 1)->first();

        if (is_null($kades_aktif->ttdcap)) {
            return redirect(route('antrian.index'))->with('status', 'Mohon upload file Ttd dan Cap pada kades aktif terlebih dahulu, sebelum anda menyetujui ajuan surat.')->with('warna', 'alert-danger');
        } else {
            $request->validate([
                'keterangan' => 'required',
            ]);
            $ajuan = Ajuan::find($id);

            // Penomoran Surat
            $stringtetap = '474.2004';
            $bulan = (int)date('n');
            $bulanromawi = $this->getRomawi($bulan);
            $tahun = date('Y');

            // Nomor yang bertambah otomatis dan diulang dari 1 ketika awal bulan
            $tabel_kosong = DB::table('beda_namas')->count();
            if ($tabel_kosong == 0) {
                $urutan = 1;
            } else {
                $urutan = BedaNama::max('nomor');
                $ajuansblm = BedaNama::where('nomor', $urutan)->first();
                $bulansblm = (int)$ajuansblm->created_at->format('n');

                if ($bulan = $bulansblm) {
                    $urutan = $urutan + 1;
                } else {
                    $urutan = 1;
                }
            }

            $nosurat = $stringtetap . '/' . $bulanromawi . '/' . $urutan . '/' . $tahun;

            $ajuan->bedaNama()->update([
                'nomor' => $urutan,
            ]);
            $ajuan->update([
                'kades' => $kades_aktif->nama,
                'ttd' => $kades_aktif->ttdcap,
                'acc' => 1,
                'keterangan' => request('keterangan'),
                'nosurat' => $nosurat,
                'penindak' => Auth::user()->nama,
            ]);

            return redirect(route('antrian.index'));
        }
    }

    public function updateSktb(Request $request, $id)
    {
        $kades_aktif = Kades::where('status', 1)->first();

        if (is_null($kades_aktif->ttdcap)) {
            return redirect(route('antrian.index'))->with('status', 'Mohon upload file Ttd dan Cap pada kades aktif terlebih dahulu, sebelum anda menyetujui ajuan surat.')->with('warna', 'alert-danger');
        } else {
            $request->validate([
                'keterangan' => 'required',
            ]);
            $ajuan = Ajuan::find($id);

            // Penomoran Surat
            $stringtetap = '474.2004';
            $bulan = (int)date('n');
            $bulanromawi = $this->getRomawi($bulan);
            $tahun = date('Y');

            // Nomor yang bertambah otomatis dan diulang dari 1 ketika awal bulan
            $tabel_kosong = DB::table('sktbs')->count();
            if ($tabel_kosong == 0) {
                $urutan = 1;
            } else {
                $urutan = Sktb::max('nomor');
                $ajuansblm = Sktb::where('nomor', $urutan)->first();
                $bulansblm = (int)$ajuansblm->created_at->format('n');

                if ($bulan = $bulansblm) {
                    $urutan = $urutan + 1;
                } else {
                    $urutan = 1;
                }
            }

            $nosurat = $stringtetap . '/' . $bulanromawi . '/' . $urutan . '/' . $tahun;

            $ajuan->sktb()->update([
                'nomor' => $urutan,
            ]);
            $ajuan->update([
                'kades' => $kades_aktif->nama,
                'ttd' => $kades_aktif->ttdcap,
                'acc' => 1,
                'keterangan' => request('keterangan'), 'nosurat' => $nosurat,
                'penindak' => Auth::user()->nama,
            ]);

            return redirect(route('antrian.index'));
        }
    }

    public function updateMohonKtp(Request $request, $id)
    {
        $kades_aktif = Kades::where('status', 1)->first();

        if (is_null($kades_aktif->ttdcap)) {
            return redirect(route('antrian.index'))->with('status', 'Mohon upload file Ttd dan Cap pada kades aktif terlebih dahulu, sebelum anda menyetujui ajuan surat.')->with('warna', 'alert-danger');
        } else {
            $request->validate([
                'keterangan' => 'required',
            ]);
            $ajuan = Ajuan::find($id);

            // Penomoran Surat
            $stringtetap = '474.2004';
            $bulan = (int)date('n');
            $bulanromawi = $this->getRomawi($bulan);
            $tahun = date('Y');

            // Nomor yang bertambah otomatis dan diulang dari 1 ketika awal bulan
            $tabel_kosong = DB::table('mohon_ktps')->count();
            if ($tabel_kosong == 0) {
                $urutan = 1;
            } else {
                $urutan = MohonKtp::max('nomor');
                $ajuansblm = MohonKtp::where('nomor', $urutan)->first();
                $bulansblm = (int)$ajuansblm->created_at->format('n');

                if ($bulan = $bulansblm) {
                    $urutan = $urutan + 1;
                } else {
                    $urutan = 1;
                }
            }

            $nosurat = $stringtetap . '/' . $bulanromawi . '/' . $urutan . '/' . $tahun;

            $ajuan->mohonKtp()->update([
                'nomor' => $urutan,
            ]);
            $ajuan->update([
                'penindak' => Auth::user()->nama,
                'kades' => $kades_aktif->nama,
                'ttd' => $kades_aktif->ttdcap,
                'acc' => 1,
                'keterangan' => request('keterangan'),
                'nosurat' => $nosurat,
            ]);

            return redirect(route('antrian.index'));
        }
    }

    public function updateSKCK(Request $request, $id)
    {
        $kades_aktif = Kades::where('status', 1)->first();

        if (is_null($kades_aktif->ttdcap)) {
            return redirect(route('antrian.index'))->with('status', 'Mohon upload file Ttd dan Cap pada kades aktif terlebih dahulu, sebelum anda menyetujui ajuan surat.')->with('warna', 'alert-danger');
        } else {
            $request->validate([
                'keterangan' => 'required',
            ]);
            $ajuan = Ajuan::find($id);

            // Penomoran Surat
            $stringtetap = '474.2004';
            $bulan = (int)date('n');
            $bulanromawi = $this->getRomawi($bulan);
            $tahun = date('Y');

            // Nomor yang bertambah otomatis dan diulang dari 1 ketika awal bulan

            // cek kosong
            $tabel_kosong = DB::table('skcks')->count();
            // dump($tabel_kosong);

            if ($tabel_kosong == 0) {
                $urutan = 1;
                // dump($urutan);
            } else {
                $urutan = Skck::max('nomor');
                // dump($urutan);

                $ajuansblm = Skck::where('nomor', $urutan)->first();
                $bulansblm = (int)$ajuansblm->created_at->format('n');
                // dump($bulansblm);
                // dump($bulan);

                if ($bulan = $bulansblm) {
                    $urutan = $urutan + 1;
                    // dump('sama');
                } else {
                    $urutan = 1;
                }
                // dump($urutan);
            }

            $nosurat = $stringtetap . '/' . $bulanromawi . '/' . $urutan . '/' . $tahun;

            $ajuan->skck()->update([
                'nomor' => $urutan,
            ]);
            $ajuan->update([
                'kades' => $kades_aktif->nama,
                'ttd' => $kades_aktif->ttdcap,
                'acc' => 1,
                'keterangan' => request('keterangan'), 'nosurat' => $nosurat,
                'penindak' => Auth::user()->nama,
            ]);

            return redirect(route('antrian.index'));
        }
    }

    public function updateSD(Request $request, $id)
    {
        $kades_aktif = Kades::where('status', 1)->first();

        if (is_null($kades_aktif->ttdcap)) {
            return redirect(route('antrian.index'))->with('status', 'Mohon upload file Ttd dan Cap pada kades aktif terlebih dahulu, sebelum anda menyetujui ajuan surat.')->with('warna', 'alert-danger');
        } else {
            $request->validate([
                'keterangan' => 'required',
            ]);
            $ajuan = Ajuan::find($id);

            // Penomoran Surat
            $stringtetap = '474.2004';
            $bulan = (int)date('n');
            $bulanromawi = $this->getRomawi($bulan);
            $tahun = date('Y');

            // Nomor yang bertambah otomatis dan diulang dari 1 ketika awal bulan
            $urutan = Sd::max('nomor');

            $tabel_kosong = DB::table('sds')->count();

            if ($tabel_kosong == 0) {
                $urutan = 1;
            } else {
                $ajuansblm = Sd::where('nomor', $urutan)->first();
                $bulansblm = (int)$ajuansblm->created_at->format('n');
                if ($bulan = $bulansblm) {
                    $urutan = $urutan + 1;
                } else {
                    $urutan = 1;
                }
            }
            $nosurat = $stringtetap . '/' . $bulanromawi . '/' . $urutan . '/' . $tahun;

            $ajuan->update([
                'kades' => $kades_aktif->nama,
                'ttd' => $kades_aktif->ttdcap,
                'acc' => 1,
                'keterangan' => request('keterangan'), 'nosurat' => $nosurat,
                'penindak' => Auth::user()->nama,
            ]);
            $ajuan->sd()->update([
                'nomor' => $urutan,
            ]);

            return redirect(route('antrian.index'));
        }
    }

    public function updateSKU(Request $request, $id)
    {
        $kades_aktif = Kades::where('status', 1)->first();

        if (is_null($kades_aktif->ttdcap)) {
            return redirect(route('antrian.index'))->with('status', 'Mohon upload file Ttd dan Cap pada kades aktif terlebih dahulu, sebelum anda menyetujui ajuan surat.')->with('warna', 'alert-danger');
        } else {
            $request->validate([
                'keterangan' => 'required',
            ]);
            $ajuan = Ajuan::find($id);

            // Penomoran Surat
            $stringtetap = '474.2004';
            $bulan = (int)date('n');
            $bulanromawi = $this->getRomawi($bulan);
            $tahun = date('Y');

            // Nomor yang bertambah otomatis dan diulang dari 1 ketika awal bulan
            $urutan = Sku::max('nomor');

            $ajuansblm = Sku::where('nomor', $urutan)->first();
            $bulansblm = (int)$ajuansblm->created_at->format('n');

            if ($bulan = $bulansblm) {
                $urutan = $urutan + 1;
            } elseif ($bulan != $bulansblm) {
                $urutan = 1;
            }
            $nosurat = $stringtetap . '/' . $bulanromawi . '/' . $urutan . '/' . $tahun;

            $ajuan->update([
                'kades' => $kades_aktif->nama,
                'ttd' => $kades_aktif->ttdcap,
                'acc' => 1,
                'keterangan' => request('keterangan'), 'nosurat' => $nosurat,
                'penindak' => Auth::user()->nama,
            ]);
            $ajuan->sku()->update([
                'nomor' => $urutan,
            ]);

            return redirect(route('antrian.index'));
        }
    }

    public function updateSKTM(Request $request, $id)
    {
        $kades_aktif = Kades::where('status', 1)->first();

        if (is_null($kades_aktif->ttdcap)) {
            return redirect(route('antrian.index'))->with('status', 'Mohon upload file Ttd dan Cap pada kades aktif terlebih dahulu, sebelum anda menyetujui ajuan surat.')->with('warna', 'alert-danger');
        } else {
            $request->validate([
                'keterangan' => 'required',
            ]);
            $ajuan = Ajuan::find($id);

            // Penomoran Surat
            $stringtetap = '474.2004';
            $bulan = (int)date('n');
            $bulanromawi = $this->getRomawi($bulan);
            $tahun = date('Y');

            // Nomor yang bertambah otomatis dan diulang dari 1 ketika awal bulan
            $urutan = Sktm::max('nomor');

            $tabel_kosong = DB::table('sktms')->count();

            if ($tabel_kosong == 0) {
                $urutan = 1;
            } else {
                $ajuansblm = Sktm::where('nomor', $urutan)->first();
                $bulansblm = (int)$ajuansblm->created_at->format('n');
                if ($bulan = $bulansblm) {
                    $urutan = $urutan + 1;
                } else {
                    $urutan = 1;
                }
            }
            $nosurat = $stringtetap . '/' . $bulanromawi . '/' . $urutan . '/' . $tahun;

            $ajuan->update([
                'kades' => $kades_aktif->nama,
                'ttd' => $kades_aktif->ttdcap,
                'acc' => 1,
                'keterangan' => request('keterangan'),
                'nosurat' => $nosurat,
                'penindak' => Auth::user()->nama,
            ]);
            $ajuan->sktm()->update([
                'nomor' => $urutan,
            ]);

            return redirect(route('antrian.index'));
        }
    }

    public function tolak($id)
    {
        $ajuan = Ajuan::where('id', $id);
        $ajuan->update([
            'acc' => 2,
            'pesan_penolakan' => request('pesan_penolakan'),
            'penindak' => Auth::user()->nama,
        ]);

        return redirect(route('antrian.index'));
    }

    public function riwayatPengajuan()
    {
        return view('admin.pengajuan.index');
    }

    function getRomawi($bln)
    {
        switch ($bln) {
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }
}
