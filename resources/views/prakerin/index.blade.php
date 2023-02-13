@extends('layouts.main')

@section('title', 'Data Prakerin - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp mr-1">
        <a href="/dashboard"
            class="cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300">Kembali</a>
    </div>
</div>
<div class="overflow-x-auto mx-20 my-10 min-h-screen">
    <div class='w-fit h-[3em] ml-auto mb-3 flex'>
        <div class="flex-warp m-auto">
            @if (request('show'))
            <a href="/dataprakerin" class="cursor-pointer">
                <x-heroicon-o-x-mark class="w-[2em] mr-1 m-auto text-black" />
            </a>
            @endif
        </div>
        <div class="flex-warp">
            <form action="/dataprakerin/show" method="GET">
                <input class='input bg-white text-black' type="text" name="show" placeholder="Cari NIS Siswa"
                    value="{{ request('show') }}">
                <button class="btn bg-[#0A3A58] border-0" type="submit">
                    <x-heroicon-s-magnifying-glass class="w-[1em] m-auto text-white" />
                </button>
            </form>
        </div>
    </div>
    <table border="1" cellpadding="0" class="table w-full text-center border-collapse bg-white">
        <tr class="text-white border-collapse">
            <td colspan="6" class="bg-[#0A3A58] h-14 sticky w-max-auto">Data Prakerin</td>
        </tr>
        <tr>
            <td class="bg-white text-black">NO</td>
            <td class="bg-white text-black">NIS</td>
            <td class="bg-white text-black">Nama Siswa</td>
            <td class="bg-white text-black">Perusahaan</td>
            <td class="bg-white text-black">Aksi</td>
        </tr>
        <?php 
        $no = 1;
    ?>
        @foreach($prakerin as $p)
        <tr>
            <td class="bg-white text-black">{{$no++}}</td>
            <td class="bg-white text-black">{{$p->nis}}</td>
            <td class="bg-white text-black">{{$p->nama_siswa}}</td>
            <td class="bg-white text-black">{{$p->nama_perusahaan}}</td>
            <td class="bg-white text-black">
                <div class='flex m-auto w-full items-center text-center'>
                    <div class="flex-warp mr-auto items-center text-center w-1/2">
                        <a href="/dataprakerin/detail/{{$p->id_prakerin}}"><button
                                class="rounded-lg bg-slate-300 px-5 py-2 shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-slate-400 active:bg-slate-500 text-black">
                                <x-heroicon-m-eye class="w-[1.5em]" />
                            </button></a>
                    </div>
                    <div class="flex-warp ml-auto items-center text-center w-1/2">
                        <form action="/dataprakerin/hapus/{{$p->id_prakerin}}" method="POST">
                            @csrf
                            <input type="text" name="id_pengajuan" class="hidden" value="{{$p->id_pengajuan}}">
                            <button type="submit"
                                class="rounded-lg px-5 py-2 shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-red-600 active:bg-slate-500 bg-red-500 text-black">
                                <x-heroicon-o-trash class="w-[1.5em]" />
                            </button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="mt-2">
    </div>
</div>

@endsection