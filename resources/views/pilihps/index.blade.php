@extends('layouts.main')

@section('title', 'Pilih Pembimbing Sekolah - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp mr-auto">
        <a href="/dashboard"><button class="btn">Kembali</button></a>
    </div>
</div>

<div class="overflow-x-auto mx-20 my-10">
    <table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
        <tr class="text-white border-collapse">
            <td colspan="8" class="bg-[#0A3A58] h-14 sticky w-max-auto">Pilih Pembimbing Sekolah</td>
        </tr>
        <tr>
            <td>NO</td>
            <td>NIS</td>
            <td>NAMA SISWA</td>
            <td>PEMBIMBING PERUSAHAAN</td>
            <td>PEMBIMBING SEKOLAH</td>
            <td>PERUSAHAAN</td>
            <td>AKSI</td>
        </tr>

        <?php $i=1; ?>

        @foreach ($prakerin as $key => $prak)
        <tr class="text-center">
            <td class="table-auto">{{$i++}}</td>
            <td class="table-auto">{{$prak->nis}}</td>
            <td class="table-auto">{{$prak->siswa[0]->nama_siswa}}</td>
            <td class="table-auto">{{$prak->nik_pp}}</td>
            @if ($prak->id_ps !== null)
            <td class="table-auto">{{$prak->pembimbingsekolah[0]->nama_ps}}</td>
            @else
            <td class="table-auto text-red-500">Belum Ada</td>
            @endif
            <td class="table-auto">{{$prak->perusahaan[0]->nama_perusahaan}}</td>
            <td class="table-auto text-center">
                <a href="/pilihpembimbingsekolah/edit/{{$prak->id_prakerin}}"><button
                        class="btn bg-green-500 text-white">Pilih</button></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection