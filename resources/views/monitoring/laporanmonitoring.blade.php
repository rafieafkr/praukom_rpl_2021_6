<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @media print {
        body {
            -webkit-print-color-adjust: exact;
        }
    }

    @page {
        size: auto;
        margin: 0mm;
    }

    .atas {
        display: flex;
        margin-top: 2px;
    }

    .divhead {
        width: 70%;
        text-align: center;
    }

    .foto {
        margin-top: -2px;
        width: 15%;
    }

    .header {
        font-size: medium;
    }

    .header2 {
        font-size: small;
    }

    .header3 {
        width: 15%;
    }

    .garis {
        width: 98%;
        height: 7px;
        margin: auto;
        margin-bottom: 5px;
        background-color: black !important;
        print-color-adjust: exact;
    }

    .garis2 {
        width: 100%;
        height: 2px;
        margin: auto;
        background-color: black !important;
        print-color-adjust: exact;
    }

    .badan {
        margin-top: 9px;
        width: fit-content;
        align-items: center;
        margin: auto;
        text-align: center;
    }

    .badan1 {
        font-size: larger;
        text-align: center;
        margin: auto;
    }

    .isi {
        width: 90%;
        margin: auto;
        margin-top: 15px;
    }

    .tabel {
        width: 100%;
    }

    .footer {
        width: 90%;
    }

    .ttd {
        width: 30%;
        margin: auto;
        margin-right: 0px;
    }
    </style>
</head>

<body>
    <div class="atas">
        <div class="foto">
            <img src="{{ asset('foto_profile/jabar.png') }}" alt="" style="width: 100px;">
        </div>
        <div class="divhead">
            <b class="header">PEMERINTAH DAERAH PROVINSI JAWA BARAT
                <br>
                DINAS PENDIDIKAN
                <br>
                CABANG DINAS PENDIDIKAN WILAYAH III
                <br>
                SMK NEGERI 1 KOTA BEKASI
                <br>
            </b>
            <b class="header2">
                Jl. Bintara VII No.2 Kec.Bekasi Barat 17134 Tlp.(021)88951151 Fax.(021)8851383
                <br>
                Website: https://www.smkn1kotabekasi.sch.id E-mail: info@smkn1kotabekasi.sch.id
                <br>
                B e k a s i
            </b>
        </div>
        <div class="header3"></div>
    </div>
    <hr class="garis">
    <div class="badan">
        <u class="badan1">
            <b class="badan1">
                NOTA DINAS
                <br>
                SURAT PERINTAH PERJALANAN DINAS
                <br>
            </b>
        </u>
    </div>
    <div class="isi">
        <table class="tabel">
            @foreach ($print as $print)
            <tr>
                <td colspan="3">PEJABAT PEMBERI PERINTAH :</td>
            </tr>
            <tr>
                <td></td>
                <td>Nama</td>
                <td style="width: 410px;">: {{ $print->nama_kepsek }}</td>
            </tr>
            <tr>
                <td></td>
                <td>NIP</td>
                <td style="width: 410px;">: {{ $print->nip_kepsek }}</td>
            </tr>
            <tr>
                <td></td>
                <td>Jabatan</td>
                <td style="width: 410px;">: {{ $print->jabatan }}</td>
            </tr>
            @endforeach
        </table>
        <br>
        <br>
        <table class="tabel">
            @foreach ($print2 as $print)
            <tr>
                <td colspan="3">PEGAWAI YANG DIPERINTAHKAN :</td>
            </tr>
            <tr>
                <td></td>
                <td>Nama</td>
                <td style="width: 410px;">: {{ $print->nama_ps }}</td>
            </tr>
            <tr>
                <td></td>
                <td>NIP</td>
                <td style="width: 410px;">:
                    @if ($print->nip_ps == null)
                    0
                    @else
                    {{ $print->nip_ps }}
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Jabatan</td>
                <td style="width: 410px;">: Guru SMKN 1 Kota Bekasi</td>
            </tr>
            <tr>
                <td></td>
                <td>Tanggal</td>
                <td style="width: 410px;">: {{ $print->tanggal }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Maksud Perjalanan Dinas</td>
                <td style="width: 410px;">: Monitoring Siswa Peserta Prakerin Praktik Kerja Industri</td>
            </tr>
            <tr>
                <td></td>
                <td>Tempat Tujuan</td>
                <td style="width: 410px;">: <b>{{ $print->nama_perusahaan }}<b></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="width: 410px;"> {{ $print->alamat_perusahaan }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="isi">
        <h2 style="text-align: center;"><u>Resume</u></h2>
        @foreach ($print3 as $print)
        <p>{{ $print->resume }}</p>
        @endforeach
    </div>
    <div class="footer">
        <div class="ttd">
            @foreach ($print4 as $print)
            <p>Bekasi, <u>{{ $print->tanggal }}</u> <br>Hormat Saya,</p>
            <br>
            <br>
            <br>
            <b>{{ $print->nama_ps }}</b>
            <hr class="garis2">
            @if ($print->nip_ps == null)
            <b>NIP .0</b>
            @else
            <b>NIP. {{ $print->nip_ps }}</b>
            @endif
            @endforeach
        </div>
    </div>
    <script>
    window.print()
    </script>
</body>

</html>