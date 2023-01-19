<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Nilai Siswa</title>
    @vite('resources/css/app.css')
</head>
<body>
    <center><h1 class="font-bold mb-5">LAPORAN PENILAIAN SISWA PRAKERIN</h1></center>
    
    <table class="border border-black font-serif font-normal text-[12px] w-full overflow-auto"> 
        <tr  class="border border-black">

                <th  class="border border-black w-[15em] px-2">NAMA SISWA</th>
                <th  class="border border-black  w-[15em] px-2">PEMBIMBING PERUSAHAAN</th>
                <th  class="border border-black px-2">KOMPETENSI</th>
                <th  class="border border-black w-[3em] px-2">NILAI</th>
               
        </tr>
        @foreach($data_penilaian as $d)
        <tr  class="border border-black">

                <td  class="border border-black px-1">{{$d->nama_siswa}}</td>
                <td  class="border border-black px-1">{{$d->nama_pp}}</td>
                <td  class="border border-black px-1">{{$d->nama_kompetensi}}</td>
                <td  class="border border-black px-1">{{$d->nilai}}</td>
                  
        </tr>
        @endforeach
    </table>
    <script>
        window.print()
    </script>
</body>
</html>