@extends('layouts.main')

@section('title', 'Surat Pengajuan - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp mr-1">
        <a href="/dashboard"
            class="cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300">Kembali</a>
    </div>
</div>
<div class="mt-5 w-fit">
    {{-- session flash message --}}
    @if (Session::has('alert'))
    <div class="mb-5 w-[400px] rounded-lg bg-red-500 p-3 py-3 text-white shadow-[1px_2px_10px_rgba(0,0,1,0.3)]">
        <span class="leading-3">
            <x-heroicon-m-x-circle class="inline-block w-7" />
            {{ Session::get('alert') }}
        </span>
    </div>
    @endif

    @if (Session::has('success'))
    <div class="mb-5 w-[400px] rounded-lg bg-green-500 p-3 py-3 text-white shadow-[1px_2px_10px_rgba(0,0,1,0.3)]">
        <span class="leading-3">
            <x-heroicon-m-check-circle class="inline-block w-7" />
            {{ Session::get('success') }}
        </span>
    </div>
    @endif
</div>

@switch(Auth::user()->level_user)

@case(1)
<div class="overflow-x-auto mx-20 my-10 min-h-screen">
    <div class='w-fit h-[3em] ml-auto mb-3 flex'>
        <div class="flex-warp m-auto">
            @if (request('show'))
            <a href="/suratpengajuan" class="cursor-pointer">
                <x-heroicon-o-x-mark class="w-[2em] mr-1 m-auto text-black" />
            </a>
            @endif
        </div>
        <div class="flex-warp">
            <form action="/suratpengajuan/show" method="GET">
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
            <td colspan="6" class="bg-[#0A3A58] h-14 sticky w-max-auto">Verifikasi Surat Pengajuan - Hubin</td>
        </tr>
        <tr>
            <td class="bg-white text-black">NO</td>
            <td class="bg-white text-black">NIS</td>
            <td class="bg-white text-black">Perusahaan</td>
            <td class="bg-white text-black">Bukti Penerimaan</td>
            <td class="bg-white text-black">Status Pengajuan</td>
            <td class="bg-white text-black">Aksi</td>
        </tr>
        <?php 
        $no = 1;
    ?>
        @foreach($sp3 as $sp3s)
        <tr>
            <td class="bg-white text-black">{{$no++}}</td>
            <td class="bg-white text-black">{{$sp3s->nis}}</td>
            <td class="bg-white text-black">{{$sp3s->perusahaan[0]->nama_perusahaan}}</td>
            <td class="bg-white text-black">
                @if ($sp3s->bukti_terima !== null)
                <span class="rounded-full bg-green-500 px-3 py-1 text-white">
                    <x-heroicon-m-check-badge class="inline-block w-5 text-white" />
                    Terlampir
                </span>
                @else
                <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                    <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                    Tidak ada
                </span>
                @endif
            </td>
            <td class="p-4 bg-white text-black">
                @switch($sp3s->status_pengajuan)
                @case('1')
                <span class="rounded-full bg-yellow-300 px-3 py-1">
                    <x-heroicon-o-clock class="inline-block w-5 text-black" />
                    Menunggu konfirmasi Wali Kelas
                </span>
                @break

                @case('2')
                <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                    <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                    Ditolak Wali Kelas
                </span>
                @break

                @case('3')
                <span class="rounded-full bg-yellow-300 px-3 py-1">
                    <x-heroicon-o-clock class="inline-block w-5 text-black" />
                    Menunggu konfirmasi Kepala Program
                </span>
                @break

                @case('4')
                <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                    <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                    Ditolak Kepala Program
                </span>
                @break

                @case('5')
                <span class="rounded-full bg-yellow-300 px-3 py-1">
                    <x-heroicon-o-clock class="inline-block w-5 text-black" />
                    Menunggu konfirmasi Hubin
                </span>
                @break

                @case('6')
                <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                    <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                    Ditolak Hubin
                </span>
                @break

                @default
                <span class="rounded-full bg-green-500 px-3 py-1 text-white">
                    <x-heroicon-m-check-badge class="inline-block w-5 text-white" />
                    Surat Pengajuan sudah sah
                </span>
                @endswitch
            </td>
            <td class="bg-white text-black">
                <div class='flex m-auto w-full items-center text-center'>
                    <div class="flex-warp mr-auto items-center text-center w-1/2">
                        <a href="/suratpengajuan/detail/{{$sp3s->id_pengajuan}}"><button
                                class="mr-2 rounded-lg bg-slate-300 px-5 py-2 shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-slate-400 active:bg-slate-500 text-black">
                                <x-heroicon-m-eye class="w-[1.5em]" />
                            </button></a>
                    </div>
                    <div class="flex-warp ml-auto items-center text-center w-1/2">
                        <form action="/suratpengajuan/hapus/{{$sp3s->id_pengajuan}}" method="POST">
                            @csrf
                            <input type="text" name="id_pengajuan" class="hidden" value="{{$sp3s->id_pengajuan}}">
                            <button type="submit"
                                class="mr-2 rounded-lg px-5 py-2 shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-red-600 active:bg-slate-500 bg-red-500 text-black">
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
@break

@case(2)
<div class="overflow-x-auto mx-20 my-10 min-h-screen">
    <div class='w-fit h-[3em] ml-auto mb-3 flex'>
        <div class="flex-warp m-auto">
            @if (request('show'))
            <a href="/suratpengajuan" class="cursor-pointer">
                <x-heroicon-o-x-mark class="w-[2em] mr-1 m-auto text-black" />
            </a>
            @endif
        </div>
        <div class="flex-warp">
            <form action="/suratpengajuan/show" method="GET">
                <input class='input bg-white text-black' type="text" name="show" placeholder="Cari NIS Siswa" value="">
                <button class="btn bg-[#0A3A58] border-0" type="submit">
                    <x-heroicon-s-magnifying-glass class="w-[1em] m-auto text-white" />
                </button>
            </form>
        </div>
    </div>
    <table border="1" cellpadding="0" class="table w-full text-center border-collapse bg-white">
        <tr class="text-white border-collapse">
            <td colspan="6" class="bg-[#0A3A58] h-14 sticky w-max-auto">Verifikasi Surat Pengajuan - Kepala Program</td>
        </tr>
        <tr>
            <td class="bg-white text-black">NO</td>
            <td class="bg-white text-black">NIS</td>
            <td class="bg-white text-black">Perusahaan</td>
            <td class="bg-white text-black">Bukti Penerimaan</td>
            <td class="bg-white text-black">Status Pengajuan</td>
            <td class="bg-white text-black">Aksi</td>
        </tr>
        <?php 
        $no = 1;
    ?>
        @foreach($sp as $sp1)
        <tr>
            <td class="bg-white text-black">{{$no++}}</td>
            <td class="bg-white text-black">{{$sp1->nis}}</td>
            <td class="bg-white text-black">{{$sp1->perusahaan[0]->nama_perusahaan}}</td>
            <td class="bg-white text-black">
                @if ($sp1->bukti_terima !== null)
                <span class="rounded-full bg-green-500 px-3 py-1 text-white">
                    <x-heroicon-m-check-badge class="inline-block w-5 text-white" />
                    Terlampir
                </span>
                @else
                <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                    <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                    Tidak ada
                </span>
                @endif
            </td>
            <td class="p-4 bg-white text-black">
                @switch($sp1->status_pengajuan)
                @case('1')
                <span class="rounded-full bg-yellow-300 px-3 py-1">
                    <x-heroicon-o-clock class="inline-block w-5 text-black" />
                    Menunggu konfirmasi Wali Kelas
                </span>
                @break

                @case('2')
                <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                    <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                    Ditolak Wali Kelas
                </span>
                @break

                @case('3')
                <span class="rounded-full bg-yellow-300 px-3 py-1">
                    <x-heroicon-o-clock class="inline-block w-5 text-black" />
                    Menunggu konfirmasi Kepala Program
                </span>
                @break

                @case('4')
                <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                    <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                    Ditolak Kepala Program
                </span>
                @break

                @case('5')
                <span class="rounded-full bg-yellow-300 px-3 py-1">
                    <x-heroicon-o-clock class="inline-block w-5 text-black" />
                    Menunggu konfirmasi Hubin
                </span>
                @break

                @case('6')
                <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                    <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                    Ditolak Hubin
                </span>
                @break

                @default
                <span class="rounded-full bg-green-500 px-3 py-1 text-white">
                    <x-heroicon-m-check-badge class="inline-block w-5 text-white" />
                    Surat Pengajuan sudah sah
                </span>
                @endswitch
            </td>
            <td class="bg-white text-black">
                <div class='flex m-auto w-full items-center text-center'>
                    <div class="flex-warp mr-auto items-center text-center w-1/2">
                        <a href="/suratpengajuan/detail/{{$sp1->id_pengajuan}}"><button
                                class="mr-2 rounded-lg bg-slate-300 px-5 py-2 shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-slate-400 active:bg-slate-500 text-black">
                                <x-heroicon-m-eye class="w-[1.5em]" />
                            </button></a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="mt-2">
        {{ $sp->links() }}
    </div>
</div>
@break

@case(3)
<div class="overflow-x-auto mx-20 my-10 min-h-screen">
    <div class='w-fit h-[3em] ml-auto mb-3 flex'>
        <div class="flex-warp m-auto">
            @if (request('show'))
            <a href="/suratpengajuan" class="cursor-pointer">
                <x-heroicon-o-x-mark class="w-[2em] mr-1 m-auto text-black" />
            </a>
            @endif
        </div>
        <div class="flex-warp">
            <form action="/suratpengajuan/show" method="GET">
                <input class='input bg-white text-black' type="text" name="show" placeholder="Cari NIS Siswa" value="">
                <button class="btn bg-[#0A3A58] border-0" type="submit">
                    <x-heroicon-s-magnifying-glass class="w-[1em] m-auto text-white" />
                </button>
            </form>
        </div>
    </div>
    <table border="1" cellpadding="0" class="table w-full text-center border-collapse bg-white">
        <tr class="text-white border-collapse">
            <td colspan="6" class="bg-[#0A3A58] h-14 sticky w-max-auto">Verifikasi Surat Pengajuan - Wali Kelas</td>
        </tr>
        <tr>
            <td class="bg-white text-black">NO</td>
            <td class="bg-white text-black">NIS</td>
            <td class="bg-white text-black">Perusahaan</td>
            <td class="bg-white text-black">Bukti Penerimaan</td>
            <td class="bg-white text-black">Status Pengajuan</td>
            <td class="bg-white text-black">Aksi</td>
        </tr>
        <?php 
        $no = 1;
    ?>
        @foreach($sp2 as $sp2s)
        <tr>
            <td class="bg-white text-black">{{$no++}}</td>
            <td class="bg-white text-black">{{$sp2s->nis}}</td>
            <td class="bg-white text-black">{{$sp2s->perusahaan[0]->nama_perusahaan}}</td>
            <td class="bg-white text-black">
                @if ($sp2s->bukti_terima !== null)
                <span class="rounded-full bg-green-500 px-3 py-1 text-white">
                    <x-heroicon-m-check-badge class="inline-block w-5 text-white" />
                    Terlampir
                </span>
                @else
                <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                    <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                    Tidak ada
                </span>
                @endif
            </td>
            <td class="p-4 bg-white text-black">
                @switch($sp2s->status_pengajuan)
                @case('1')
                <span class="rounded-full bg-yellow-300 px-3 py-1">
                    <x-heroicon-o-clock class="inline-block w-5 text-black" />
                    Menunggu konfirmasi Wali Kelas
                </span>
                @break

                @case('2')
                <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                    <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                    Ditolak Wali Kelas
                </span>
                @break

                @case('3')
                <span class="rounded-full bg-yellow-300 px-3 py-1">
                    <x-heroicon-o-clock class="inline-block w-5 text-black" />
                    Menunggu konfirmasi Kepala Program
                </span>
                @break

                @case('4')
                <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                    <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                    Ditolak Kepala Program
                </span>
                @break

                @case('5')
                <span class="rounded-full bg-yellow-300 px-3 py-1">
                    <x-heroicon-o-clock class="inline-block w-5 text-black" />
                    Menunggu konfirmasi Hubin
                </span>
                @break

                @case('6')
                <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                    <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                    Ditolak Hubin
                </span>
                @break

                @default
                <span class="rounded-full bg-green-500 px-3 py-1 text-white">
                    <x-heroicon-m-check-badge class="inline-block w-5 text-white" />
                    Surat Pengajuan sudah sah
                </span>
                @endswitch
            </td>
            <td class="bg-white text-black">
                <div class='flex m-auto w-full items-center text-center'>
                    <div class="flex-warp mr-auto items-center text-center w-1/2">
                        <a href="/suratpengajuan/detail/{{$sp2s->id_pengajuan}}"><button
                                class="mr-2 rounded-lg bg-slate-300 px-5 py-2 shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-slate-400 active:bg-slate-500 text-black">
                                <x-heroicon-m-eye class="w-[1.5em]" />
                            </button></a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="mt-2">
        {{ $sp2->links() }}
    </div>
</div>
@break

@endswitch

@endsection