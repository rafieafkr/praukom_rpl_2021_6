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
                <td  class="border border-black px-1"><p><center>{{$d->nilai}}</center></p></td>
                  
        </tr>
        @endforeach
    </table>
        <br><br>
    <table class="border border-black font-serif w-full font-normal text-[12px] overflow-auto"> 
        <tr  class="border border-black">

                <th  class="border border-black w-[60em] px-2">SIKAP MENTAL</th>
                <th  class="border border-black  w-[1em] px-2">NILAI</th>
        </tr>
        @foreach($data_sikap as $s)
        <tr  class="border border-black">
                <td  class="border border-black px-1 ">Disiplin Waktu</td>
                <td  class="border border-black px-1 "><center>{{$s->disiplin_waktu}}</center></td>      
        </tr>
        <tr  class="border border-black">
                <td  class="border border-black px-1 ">Kemauan Kerja dan Motivasi</td>
                <td  class="border border-black px-1 "><center>{{$s->kemauan_kerja_dan_motivasi}}</center></td>      
        </tr>
        <tr  class="border border-black">
                <td  class="border border-black px-1 ">Kualitas Kerja</td>
                <td  class="border border-black px-1 "><center>{{$s->kualitas_kerja}}</center></td>      
        </tr>
        <tr  class="border border-black">
                <td  class="border border-black px-1 ">Inisiatif Kerja</td>
                <td  class="border border-black px-1 "><center>{{$s->inisiatif_kerja}}</center></td>      
        </tr>
        <tr  class="border border-black">
                <td  class="border border-black px-1 ">Perilaku</td>
                <td  class="border border-black px-1 "><center>{{$s->perilaku}}</center></td>      
        </tr>
        @endforeach
    </table>
    <script>
        window.print()
    </script>
</body>
</html>
