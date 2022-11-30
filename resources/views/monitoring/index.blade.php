@extends('layouts.main')

@section('title', 'Monitoring - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp mr-auto">
        <a href="/monitoring"><button class="btn">Kembali</button></a>
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
            <td class="font-bold">NO</td>
            <th>PEMBIMBING</th>
            <th>PERUSAHAAN</th>
            <th>TANGGAL</th>
            <th>RESUME</th>
            <th>VERIFIKASI</th>
            <th>AKSI</th>
        </tr>

        @foreach ($monitoring as $key => $monit)
        <tr class="text-center">
            <td class="table-auto">{{$monitoring -> firstItem() + $key}}</td>
            <td class="table-auto">{{$monit -> id_ps}}</td>
            <td class="table-auto">{{$monit -> id_perusahaan}}</td>
            <td class="table-auto">{{$monit -> tanggal}}</td>
            <td class="table-auto">{{$monit -> resume}}</td>
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