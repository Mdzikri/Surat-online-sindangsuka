<center><h3>FORMULIR PERMOHONAN KARTU TANDA PENDUDUK INDONESIA</h3></center>
{{-- KOTAK --}}
<div style="border: 1px solid rgb(100, 100, 100); height: auto; overflow: auto; text-align: justify; width: auto;">
    <p>PERHATIAN :</p>
            1. Harap diisi dengan huruf cetak dan menggunakan tinta hitam<br>
            2. Beri tanda X (silang) pada kotak pilihan<br>
            3. Setelah formulir diisi dan ditandatangani darap diserahkan kembali ke Kantor Desa/Kelurahan
</div>
<hr>
<table border-collapse="collapse" align="center" width=100% style="padding-left: 10px; padding-right: 10px;">
    <tr>
        <td colspan="3">PEMERINTAH PROVINSI JAWA BARAT</td>
    </tr>
    <tr>
        <td colspan="3">PEMERINTAH KABUPATEN GARUT</td>
    </tr>
    <tr>
        <td width="20%">KECAMATAN</td>
        <td width="1%">:</td>
        <td>{{ isset($desa) ? $desa->kecamatan : '*atur nama kecamatan' }}</td>
    </tr>
    <tr>
        <td>DESA</td>
        <td>:</td>
        <td>{{ isset($desa) ? $desa->nama_desa : '*atur nama Desa' }}</td>
    </tr>
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td colspan="3" style="text-transform: uppercase"><b><u><i>Permohonan KTP</i></u> : <i>{{ $ajuan->mohonKtp->jenis_permohonan }}</i></b></td>
    </tr>
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td>:</td>
        <td>{{ $ajuan->user->nama }}</td>
        <td width="10%">&nbsp;</td>
        <td>Nama KK</td>
        <td width="1%">:</td>
        <td>{{ $ajuan->mohonKtp->nama_kk }}</td>
    </tr>
    <tr>
        <td>No KK</td>
        <td>:</td>
        <td>{{ $ajuan->mohonKtp->no_kk }}</td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td><b>{{ $ajuan->user->nik }}</b></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><b>{{ $ajuan->user->alamat }}</b></td>
    </tr>
</table>

<br>

<table border="0.5" align="center" width=100% style="padding-left: 10px; padding-right: 10px; text-align:center;">
    <tr><td>Pas Photo</td><td>Cap Jempol</td><td>Specimen tanda tangan</td></tr>
    <tr><td>&nbsp;<br><br><br><br><br><br><br><br></td><td>&nbsp;</td><td>&nbsp;</td></tr>
</table>
