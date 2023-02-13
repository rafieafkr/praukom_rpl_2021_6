@extends('layouts.main')

@section('title', 'Pilih Pembimbing Sekolah - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp mr-auto">
        <a href="/dashboard"
            class="hidden cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300 lg:inline-block">Kembali</a>
    </div>
</div>

<div class="overflow-x-auto mx-20 my-10 min-h-screen">
    <div class='w-fit h-[3em] ml-auto mb-3 flex'>
        <div class="flex-warp m-auto">
            @if (request('show'))
            <a href="/pilihpembimbingsekolah" class="cursor-pointer">
                <x-heroicon-o-x-mark class="w-[2em] mr-1 m-auto text-black" />
            </a>
            @endif
        </div>
        <div class="flex-warp">
            <form action="/pilihpembimbingsekolah/show" method="GET">
                <input class='input bg-white text-black' type="text" name="show" placeholder="Cari NIS Siswa" value="">
                <button class="btn bg-[#0A3A58] border-0" type="submit">
                    <x-heroicon-s-magnifying-glass class="w-[1em] m-auto text-white" />
                </button>
            </form>
        </div>
    </div>
    <table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
        <tr class="text-white border-collapse">
            <td colspan="8" class="bg-[#0A3A58] h-14 sticky w-max-auto">Pilih Pembimbing Sekolah</td>
        </tr>
        <tr>
            <td class="bg-white text-black">NO</td>
            <td class="bg-white text-black">NIS</td>
            <td class="bg-white text-black">Nama Siswa</td>
            <td class="bg-white text-black">Pembimbing Sekolah</td>
            <td class="bg-white text-black">Perusahaan</td>
            <td class="bg-white text-black">Aksi</td>
        </tr>

        <?php $i=1; ?>

        @foreach ($prakerin as $key => $prak)
        <tr class="text-center">
            <td class="table-auto bg-white text-black">{{$i++}}</td>
            <td class="table-auto bg-white text-black">{{$prak->nis}}</td>
            <td class="table-auto bg-white text-black">{{$prak->nama_siswa}}</td>
            @if ($prak->id_ps !== null)
            <td class="table-auto bg-white text-black">{{$prak->nama_ps}}</td>
            @else
            <td class="table-auto bg-white text-red-500">Belum Ada</td>
            @endif
            <td class="table-auto bg-white text-black">{{$prak->nama_perusahaan}}</td>
            <td class="table-auto bg-white text-black text-center">
                <a href="/pilihpembimbingsekolah/edit/{{$prak->id_prakerin}}"><button
                        class="mr-2 rounded-lg px-5 py-2 shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-slate-400 active:bg-slate-500 text-black bg-green-500">
                        <x-heroicon-m-pencil-square class="w-[1.5em]" />
                    </button></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection