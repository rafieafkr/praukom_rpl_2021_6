@extends('layouts.main')

@section('title', 'Monitoring - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp mr-auto">
        <a href="/dashboard"><button class="btn">Kembali</button></a>
    </div>
    <div class="flex-warp ml-auto">
        <a href="/monitoring/tambah"><button class="btn">Tambah Monitoring</button></a>
    </div>
</div>

<div class="overflow-x-auto mx-20 my-10">
    <table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
        <tr class="text-white border-collapse">
            <td colspan="7" class="bg-[#0A3A58] h-14 sticky w-max-auto">Monitoring</td>
        </tr>
        <tr>
            <td>NO</td>
            <td>PEMBIMBING</td>
            <td>PERUSAHAAN</td>
            <td>TANGGAL</td>
            <td>VERIFIKASI</td>
            <td>AKSI</td>
        </tr>

        <?php $i=1; ?>
        @foreach ($monitoring as $key => $monit)
        <tr class="text-center">
            <td class="table-auto">{{$i++}}</td>
            <td class="table-auto">{{$monit -> pembimbingsekolah[0] -> nama_ps}}</td>
            <td class="table-auto">{{$monit -> perusahaan[0] -> nama_perusahaan}}</td>
            <td class="table-auto">{{$monit -> tanggal}}</td>
            <td class="table-auto">{{$monit -> verifikasi}}</td>
            <td class="table-auto text-center">
                <a href="/monitoring/edit/{{$monit->id_monitoring}}"><button
                        class="btn bg-green-500 text-white">EDIT</button></a>
                <label for="my-modal-4" class="btn bg-[#eb2424] text-[#ffffff]">Hapus</label>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection