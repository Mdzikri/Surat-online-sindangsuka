<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <link href="{{ isset($desa) ? asset('images/' . $desa->logo_desa . '') : asset('images/logo.png') }}" rel="icon" type="image/png">
</head>

<body>
    <!-- KOP SURAT -->
    <table border="0" align="center" style="margin-top: 10px;" width=84%>
        <tr>
            <td width=14%><img src="{{ isset($desa) ? asset('images/' . $desa->logo_desa . '') : asset('images/logo.png') }}" alt="" width="85" height="85">
            </td>
            <td>
                <center>
                    <font size="3" style="text-transform: uppercase">PEMERINTAH KABUPATEN {{ isset($desa) ? $desa->kabupaten : '*atur kabupaten' }}</font>
                    <font size="3" style="text-transform: uppercase">KECAMATAN {{ isset($desa) ? $desa->kecamatan : '*atur kecamatan' }}</font> <br>
                    <font size="5" style="text-transform: uppercase"><b>DESA {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</b></font> <br>
                    <font size="3"><i>{{ isset($desa) ? $desa->alamat_kantor : '*atur alamat kantor desa' }}</i></font>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr style="border-width: medium; border-style: double;">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <br>
                <center>
                    <u><font size="3"><b>SURAT KETERANGAN TIDAK MAMPU</b></font></u><br>
                    <font size="3" style="margin-top:15px;">NO. {{ $ajuan->nosurat }}</font>
                </center>
                <br>
            </td>
        </tr>
    </table>

    <table border="0" align="center" width=83%>
        <!-- KETERANGAN -->
        <tr>
            <td>
                <p style="text-align: justify;">
                    &nbsp;&nbsp;&nbsp;Yang bertanda tangan dibawah ini Kepala Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }} Kecamatan Cibatu
                    Kabupaten Garut, menerangkan bahwa :
                </p>
            </td>
        </tr>
    </table>

    <table border="0" align="center" width=83% style="padding-left: 30px;">
        <!-- IDENTITAS PENGAJU -->
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td style="text-transform: uppercase;">{{ $user->nama }}</td>
        </tr>
        <tr>
            <td>No NIK</td>
            <td>:</td>
            <td>{{ $user->nik }}</td>
        </tr>
        <tr>
            <td>Tempat Tgl Lahir</td>
            <td>:</td>
            <td>{{ $user->ttl }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $user->jk }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>{{ $user->status }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $user->agama }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $user->pekerjaan }}</td>
        </tr>
        <tr>
            <td>Kewarganegaraan</td>
            <td>:</td>
            <td>{{ $user->kewarganegaraan }}</td>
        </tr>
        <tr>
            <td>Alamat Domisili</td>
            <td>:</td>
            <td>{{ $user->alamat }}</td>
        </tr>
    </table>

    <table border="0" align="center" width=83%>
        <!-- KETERANGAN -->
        <tr>
            <td>
                <p style="text-align: justify;">
                    &nbsp;&nbsp;&nbsp;Berdasarkan keterangan dari Ketua RT/RW setempat, yang bersangkutan adalah benar
                    warga Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}, Kecamatan Cibatu, Kabupaten Garut, sebagaimana data-data diatas di
                    kategorikan <b>Keluarga Tidak/Kurang Mampu</b>
                </p>
            </td>
        </tr>
    </table>

    <table border="0" align="center" width=83%>
        <!-- KETERANGAN -->
        <tr>
            <td style="text-align: justify;">
                &nbsp;&nbsp;&nbsp;Surat Keterangan Tidak Mampu ini dipergunakan untuk :
            </td>
        </tr>
        <tr>
            <td style="text-align: center; text-transform: uppercase;">
                <p>
                    <b><i>{{ $ajuan->keterangan }}</i></b>
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: justify;">
                &nbsp;&nbsp;&nbsp;Demikian surat keterangan ini dibuat dengan sebenarnya untuk diketahui dan
                dipergunakan sebagaimana mestinya. Dalam kepentingan {{ $ajuan->keterangan }}.
            </td>
        </tr>
    </table>

    <br><br>

    <table border="0" align="center" width=83%>
        <!-- KETERANGAN -->
        <tr>
            <td style="text-align: right;">
                {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}, {{ $ajuan->updated_at->format('d F Y') }}
            </td>
        </tr>
        <tr>
            <td style="text-align: right; padding-right: 20px;">
                Kepala Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}
            </td>
        </tr>
        <tr>
            <td style="text-align: right; ">
                <img src="{{ asset('images/ttdcap/'.$ajuan->ttd.'') }}" alt="" width="145">
            </td>
        </tr>
        <tr>
            <td style="text-align: right; padding-right: 53px;">{{ $ajuan->kades }}</td>
        </tr>
    </table>

</body>

</html>