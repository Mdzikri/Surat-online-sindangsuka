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
                    <font size="3"><i>{{ isset($desa) ? $desa->alamat_kantor : '*atur alamat kantor' }}</i></font>
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
                    <u><font size="3"><b>SURAT KETERANGAN</b></font></u><br>
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
                    &nbsp;&nbsp;&nbsp;Yang bertanda tangan dibawah ini Kepala Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }} Kecamatan {{ isset($desa) ? $desa->kecamatan : '*atur nama kecamatan' }}
                    Kabupaten {{ isset($desa) ? $desa->kabupaten : '*atur nama kabupaten' }}, menerangkan bahwa :
                </p>
            </td>
        </tr>
    </table>

    <table border="0" align="center" width=83% style="padding-left: 30px;">
        <!-- IDENTITAS PENGAJU -->
        <tr>
            <td width="35%">Nama</td>
            <td width="3%">:</td>
            <td style="text-transform: uppercase;">{{ $user->nama }}</td>
        </tr>
        <tr>
            <td>No Induk Kependudukan</td>
            <td>:</td>
            <td>{{ $user->nik }}</td>
        </tr>
        <tr>
            <td>Nomor Kartu Keluarga</td>
            <td>:</td>
            <td>{{ $user->no_kk }}</td>
        </tr>
        <tr>
            <td>Tempat, tanggal lahir</td>
            <td>:</td>
            <td>{{ $user->ttl }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $user->jk }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $user->agama }}</td>
        </tr>
        <tr>
            <td>Pendidikan</td>
            <td>:</td>
            <td>{{ $user->pendidikan }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $user->pekerjaan }}</td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>{{ $user->status }}</td>
        </tr>
        <tr>
            <td>Nama Orang Tua</td>
            <td>:</td>
            <td style="text-transform: uppercase;">{{ $user->nama_ayah }} / {{ $user->nama_ibu }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $user->alamat }}</td>
        </tr>
    </table>

    <table border="0" align="center" width=83%>
        <!-- KETERANGAN -->
        <tr>
            <td>
                <p style="text-align: justify;">
                    &nbsp;&nbsp;&nbsp;Berdasarkan keterangan dari RT/RW setempat dan data yang ada, benar bahwa yang bersangkutan Penduduk Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }} Kecamatan {{ isset($desa) ? $desa->kecamatan : '*atur nama kecamatan' }} dan yang bersangkutan :
                </p>
            </td>
        </tr>
    </table>

     <table border="0" align="center" width=83%>
        <tr>
            <td style="text-align: center; text-transform: uppercase;">
            <b style="text-transform: uppercase"><i>== benar memiliki {{ $ajuan->sktb->properti }} di lokasi {{ $ajuan->sktb->lokasi }} dengan luas {{ $ajuan->sktb->luas }} atas nama sertifikat {{ $ajuan->sktb->atas_nama }} dengan harga kisaran {{ $ajuan->sktb->harga }} ==</i></b>
            </td>
        </tr>
        <tr>
            <td style="text-align: justify;">
                Surat keterangan ini dipergunakan untuk : {{ $ajuan->keterangan }} <br>Demikian keterangan ini, untuk dipergunakan semestinya.
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