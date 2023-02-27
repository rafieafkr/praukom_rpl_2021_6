@extends('layouts.main')

@section('title', 'Monitoring - SIMAK')

@section('container')
<div class="flex w-full">
    @if (Auth::user()->level_user == 4)
    <div class="flex-warp mr-2">
        <a href="/monitoring/tambah"
            class="cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300">Tambah</a>
    </div>
    @endif
    <div class="flex-warp">
        <a href="/dashboard"
            class="cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300">Kembali</a>
    </div>
</div>

@switch(Auth::user()->level_user)

@case(2)
<div class="overflow-x-auto mx-20 my-10 min-h-screen">
    <div class='w-fit h-[3em] ml-auto mb-3 flex'>
        <div class="flex-warp m-auto">
            @if (request('show'))
            <a href="/monitoring" class="cursor-pointer">
                <x-heroicon-o-x-mark class="w-[2em] mr-1 m-auto text-black" />
            </a>
            @endif
        </div>
        <div class="flex-warp">
            <form action="/monitoring/show" method="GET">
                <input class='input bg-white text-black' type="text" name="show" placeholder="Cari NIS Siswa"
                    value="{{ request('show') }}">
                <button class="btn bg-[#0A3A58] border-0" type="submit">
                    <x-heroicon-s-magnifying-glass class="w-[1em] m-auto text-white" />
                </button>
            </form>
        </div>
    </div>
    <table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
        <tr class="text-white border-collapse">
            <td colspan="7" class="bg-[#0A3A58] h-14 sticky w-max-auto">Monitoring - Kepala Program</td>
        </tr>
        <tr>
            <td class="bg-white text-black">No</td>
            <td class="bg-white text-black">Pembimbing</td>
            <td class="bg-white text-black">Perusahaan</td>
            <td class="bg-white text-black">Tanggal</td>
            <td class="bg-white text-black">Verifikasi</td>
            <td class="bg-white text-black">Aksi</td>
        </tr>

        <?php $i=1; ?>
        @foreach ($monitoring as $key => $monit)
        <tr class="text-center">
            <td class="table-auto bg-white text-black">{{$i++}}</td>
            <td class="table-auto bg-white text-black">{{$monit->pembimbingsekolah->guru->nama_guru}}</td>
            <td class="table-auto bg-white text-black">{{$monit->perusahaan->nama_perusahaan}}</td>
            <td class="table-auto bg-white text-black">{{$monit->tanggal}}</td>
            <td class="table-auto bg-white text-black">{{$monit->verifikasi}}</td>
            <td class="table-auto bg-white text-black text-center">
                <a href="/monitoring/edit/{{$monit->id_monitoring}}"><button
                        class="mr-2 rounded-lg bg-slate-300 px-5 py-2 shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-slate-400 active:bg-slate-500 text-black">
                        <x-heroicon-m-eye class="w-[1.5em]" />
                    </button></a>
                <a href="/monitoring/print/{{$monit->id_monitoring}}"><button
                        class="rounded-lg px-5 py-2 shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-green-600 active:bg-slate-500 bg-green-500 text-black">
                        <x-heroicon-o-printer class="w-[1.5em]" />
                    </button></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@break

@case(4)
<div class="overflow-x-auto mx-20 my-10 min-h-screen">
    <table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
        <tr class="text-white border-collapse">
            <td colspan="7" class="bg-[#0A3A58] h-14 sticky w-max-auto">Monitoring - Pembimbing Sekolah</td>
        </tr>
        <tr>
            <td class="bg-white text-black">No</td>
            <td class="bg-white text-black">Pembimbing</td>
            <td class="bg-white text-black">Perusahaan</td>
            <td class="bg-white text-black">Tanggal</td>
            <td class="bg-white text-black">Verifikasi</td>
            <td class="bg-white text-black">Aksi</td>
        </tr>

        <?php $i=1; ?>
        @foreach ($monitoring as $key => $monit)
        <tr class="text-center">
            <td class="table-auto bg-white text-black">{{$i++}}</td>
            <td class="table-auto bg-white text-black">{{$monit->pembimbingsekolah->guru->nama_guru}}</td>
            <td class="table-auto bg-white text-black">{{$monit->perusahaan->nama_perusahaan}}</td>
            <td class="table-auto bg-white text-black">{{$monit->tanggal}}</td>
            <td class="table-auto bg-white text-black">{{$monit->verifikasi}}</td>
            <td class="table-auto bg-white text-black text-center">
                <a href="/monitoring/edit/{{$monit->id_monitoring}}"><button
                        class="mr-2 rounded-lg bg-slate-300 px-5 py-2 shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-slate-400 active:bg-slate-500 text-black">
                        <x-heroicon-m-eye class="w-[1.5em]" />
                    </button></a>
                <a href="/monitoring/hapus/{{$monit->id_monitoring}}"><button
                        class="rounded-lg px-5 py-2 shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-red-600 active:bg-slate-500 bg-red-500 text-black">
                        <x-heroicon-o-trash class="w-[1.5em]" />
                    </button></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@break

@endswitch

@endsection