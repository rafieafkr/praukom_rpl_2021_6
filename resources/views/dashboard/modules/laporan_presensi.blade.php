<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @vite('resources/css/app.css')
</head>

<body>
  <center>
    <h1 class="mb-5 font-bold">LAPORAN PRESENSI SISWA PRAKERIN</h1>
  </center>

  <table class="w-full overflow-auto border border-black font-serif text-[12px] font-normal">
    <tr class="border border-black">

      <th class="border border-black">NAMA SISWA</th>
      <th class="w-[4em] border border-black">TANGGAL <br> KEHADIRAN</th>
      <th class="w-[5em] border border-black">JAM <br> MASUK</th>
      <th class="w-[5em] border border-black">JAM <br> KELUAR</th>
      <th class="w-[10em] border border-black px-2">KEGIATAN</th>
      <th class="w-[10px] border border-black px-2">KETERANGAN</th>
      <th class="w-[6em] border border-black">STATUS</th>

    </tr>
    @foreach ($data_presensi as $d)
      <tr class="border border-black">
        <td class="border border-black px-1">{{ $d->nama_siswa }}</td>
        <td class="border border-black px-1">{{ $d->tgl_kehadiran }}</td>
        <td class="border border-black px-1">{{ $d->jam_masuk }}</td>
        <td class="border border-black px-1">{{ $d->jam_keluar }}</td>
        <td class="border border-black px-1">{{ $d->kegiatan }}</td>
        <td class="border border-black px-1">
          <div class="w-10">
            {{ $d->keterangan }}
          </div>
        </td>
        <td class="w-[6em] border border-black px-1">{{ $d->status }}</td>

      </tr>
    @endforeach
  </table>
  <script>
    window.print()
  </script>
</body>

</html>
>>>>>>> 97fb61506287a0aca02bb0c8a40953809c15223b
