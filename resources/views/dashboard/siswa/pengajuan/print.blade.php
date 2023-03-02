<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Print Pengajuan</title>
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

    body {
      margin: 10px 60px 10px 60px;
    }

    .divhead {
      margin: auto;
      text-align: center;
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
      font-size: x-large;
      text-align: center;
      margin: auto;
    }
  </style>
</head>

<body>
  <div class="atas">
    <div class="divhead">
      <b class="header">SMK NEGERI 1 KOTA BEKASI
        <br>
        BIDAN HUBUNGAN INDUSTRI DAN MASYARAKAT
        <br>
        PRAKTIK KERJA INDUSTRI (PRAKERIN)
        <br>
        Jl. Bintara VIII No. 2 Bekasi Barat 17134 Telp.& Fax.(021) 8841383, (021) 88951151
        <br>
      </b>
    </div>
  </div>
  <hr class="garis">
  <div class="badan">
    <b class="badan1">
      PENGAJUAN
      <br>
      PESERTA PRAKTIK KERJA INDUSTRI
      <br>
    </b>
  </div>
  <br>
  <div style="text-align: left; width: full;" class="text-[17px]">Nama-nama dibawah adalah
    siswa/siswi
    SMK Negeri 1 Kota
    Bekasi yang telah memenuhi syarat untuk dapat mengikuti Praktik Kerja Industri pada:</div>
  <div>
    <br>
    <div>
      <table>
        <tr>
          <td class="w-[150px] font-bold">Nama Perusahaan</td>
          <td>:</td>
          <td class="pl-2">{{ $pengajuan->nama_perusahaan }}</td>
        </tr>
        <tr>
          <td class="w-[150px] font-bold">Alamat</td>
          <td>:</td>
          <td class="pl-2">{{ $pengajuan->alamat_perusahaan }}</td>
        </tr>
        <tr>
          <td class="w-[150px] font-bold">Telp/Fax</td>
          <td>:</td>
          <td class="pl-2">{{ $pengajuan->kontak_perusahaan }}</td>
        </tr>
      </table>
    </div>
    <br>
    <div>
      <table class="tabel border-collapse" cellspacing="0" cellpadding="15">
        <tr class="bg-slate-300">
          <th class="border-[1px] border-black bg-slate-300">No</th>
          <th class="border-[1px] border-black bg-slate-300">Nama</th>
          <th class="border-[1px] border-black bg-slate-300">NIS</th>
          <th class="border-[1px] border-black bg-slate-300">Kelas</th>
          <th class="border-[1px] border-black bg-slate-300">Tempat/Tanggal Lahir</th>
          <th class="border-[1px] border-black bg-slate-300">No. Tlp/HP</th>
        </tr>
        <tr>
          <td class="border-[1px] border-black text-center">1</td>
          <td class="border-[1px] border-black">{{ $pengajuan->nama_siswa }}</td>
          <td class="border-[1px] border-black">{{ $pengajuan->nis }}</td>
          <td class="border-[1px] border-black">{{ $pengajuan->tingkat_kelas }} {{ $pengajuan->akronim }}
            {{ $pengajuan->nama_kelas }}</td>
          <td class="border-[1px] border-black">{{ $pengajuan->tempat_lahir }}, {{ $pengajuan->tanggal_lahir }}</td>
          <td class="border-[1px] border-black">-</td>
        </tr>
      </table>
    </div>
    <br>
    <br>
  </div>
  <div class="flex flex-nowrap justify-between font-bold">
    <div>
      <span>Kepala Prog. Keahlian</span>
      <br><br>
      @if ($pengajuan->status_pengajuan > 4)
        <span class="border-2 border-green-500 p-2">TERVERIFIKASI</span>
      @endif
      <br><br>
      <span class="block">{{ $pengajuan->kepala_program }}</span>
      <span>NIP. {{ $pengajuan->nip_kaprog }}</span>
    </div>
    <div>
      <span>Wali Kelas</span>
      <br><br>
      @if ($pengajuan->status_pengajuan > 2)
        <span class="border-2 border-green-500 p-2">TERVERIFIKASI</span>
      @endif
      <br><br>
      <span class="block">{{ $pengajuan->wali_kelas }}</span>
      <span>NIP. {{ $pengajuan->nip_walas }}</span>
    </div>
  </div>
  <br>
  <span class="font-bold">Guru Pembimbing:</span>
  <br>
  <br>
  <br>
  <div class="m-auto w-[300px] text-center font-bold">
    <span>Mengetahui,</span><br>
    <span>Waka. Hubungan Industri & Masyarakat</span>
    <br><br>
    @if ($pengajuan->status_pengajuan == 7)
      <span class="border-2 border-green-500 p-2">TERVERIFIKASI</span>
    @endif
    <br><br>
    <span class="underline">Lubby Cahyadi, M.Pd</span>
    <span>NIP. 19730428 200501 1 005</span>
  </div>
  <script>
    window.print()
  </script>
</body>

</html>
