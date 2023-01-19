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
    <center><h1 class="font-bold mb-5">LAPORAN PRESENSI SISWA PRAKERIN</h1></center>
    
    <table class="border border-black font-serif font-normal text-[12px] w-full overflow-auto"> 
        <tr  class="border border-black">

                <th  class="border border-black ">NAMA SISWA</th>
                <th  class="border border-black w-[4em]">TANGGAL <br> KEHADIRAN</th>
                <th  class="border border-black w-[5em]">JAM <br> MASUK</th>
                <th  class="border border-black w-[5em]">JAM <br> KELUAR</th>
                <th  class="border border-black w-[10em] px-2">KEGIATAN</th>
                <th  class="border border-black w-[10px] px-2">KETERANGAN</th>
                <th  class="border border-black w-[6em]">STATUS</th>
               
        </tr>
        @foreach($data_presensi as $d)
        <tr  class="border border-black">
                <td  class="border border-black px-1">{{$d->nama_siswa}}</td>
                <td  class="border border-black px-1">{{$d->tgl_kehadiran}}</td>
                <td  class="border border-black px-1">{{$d->jam_masuk}}</td>
                <td  class="border border-black px-1">{{$d->jam_keluar}}</td>
                <td  class="border border-black px-1">{{$d->kegiatan}}</td>
                <td  class="border border-black px-1 ">
                    <div class="w-10">
                        {{$d->keterangan}}
                    </div>
                </td>
                <td  class="border border-black px-1 w-[6em]">{{$d->status}}</td>
               
        </tr>
        @endforeach
    </table>
    <script>
        window.print()
    </script>
</body>
</html>