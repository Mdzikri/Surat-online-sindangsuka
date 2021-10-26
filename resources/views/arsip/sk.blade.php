<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <link href="{{ isset($desa) ? asset('images/' . $desa->logo_desa . '') : asset('images/logo.png') }}" rel="icon" type="image/png">
</head>

<body>
    <!-- KOP SURAT -->
    <table border="0" align="center" width=84%>
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
                    <u><font size="3"><b>SURAT KETERANGAN KEMATIAN</b></font></u><br>
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
                    Yang bertanda tangan di bawah ini, menerangkan bahwa :
                </p>
            </td>
        </tr>
    </table>

    <table border="0" align="center" width=83% style="padding-left: 0px;">
        <!-- IDENTITAS PENGAJU -->
        <thead>
            <tr>
                <td width=20%>Nama Lengkap</td>
                <td width=3%>:</td>
                <td style="text-transform: uppercase;">{{ $ajuan->sk->nama_alm }}</td>
            </tr>
        </thead>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $ajuan->sk->jk_alm }}</td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>:</td>
            <td>{{ $ajuan->sk->umur_alm }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $ajuan->sk->agama_alm }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $ajuan->sk->alamat_alm }}</td>
        </tr>
        <tr>
            <td colspan="3">
                <p style="text-align: justify;">Telah meninggal dunia pada :</p>
            </td>
        </tr>
        <tr>
            <td>Hari</td>
            <td>:</td>
            <td>{{ $ajuan->sk->hari }}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td>{{ $ajuan->sk->tanggal }}</td>
        </tr>
        <tr>
            <td>Pukul</td>
            <td>:</td>
            <td>{{ $ajuan->sk->pukul }}</td>
        </tr>
        <tr>
            <td>Tempat</td>
            <td>:</td>
            <td>{{ $ajuan->sk->tempat }}</td>
        </tr>
        <tr>
            <td>Penyebab</td>
            <td>:</td>
            <td>{{ $ajuan->sk->penyebab }}</td>
        </tr>
        <!-- PELAPOR -->
        <tr>
            <td colspan="3">
                <p style="text-align: justify;">Surat keterangan ini dibuat berdasarkan keterangan pelapor :</p>
            </td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td style="text-transform: uppercase;">{{ $user->nama }}</td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $user->ttl }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $user->pekerjaan }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $user->alamat }}</td>
        </tr>
        <tr>
            <td>Penyebab</td>
            <td>:</td>
            <td>{{ $ajuan->sk->penyebab }}</td>
        </tr>
        <tr>
            <td colspan="3">
                <p style="text-align: justify; display: inline;">Hubungan pelapor dengan yang meninggal : </p>
                <p style="text-transform: uppercase; display: inline;">{{ $ajuan->sk->hubungan }}</p>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p style="text-align: justify;">Demikian surat kematian ini dibuat dengan sebenar-benarnya agar dapat
                    dipergunakan sebagaimana mestinya</p>
            </td>
        </tr>
    </table>

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