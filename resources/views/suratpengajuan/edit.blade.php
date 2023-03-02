@extends('layouts.main')

@section('title', 'Verifikasi Surat Pengajuan - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp mr-auto">
        <a href="/suratpengajuan"
            class="hidden cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300 lg:inline-block">Kembali</a>
    </div>
</div>

<div class="mb-3 flex w-full justify-center align-middle">
    <p class="font-light text-black uppercase" style="font-size: 32px">Verifikasi Surat Pengajuan</p>
</div>
<div class="w-full flex-col gap-5 lg:grid lg:grid-cols-2">
    {{-- div 1 --}}
    <div class='w-full'>
        {{-- nis --}}
        <label class="text-black">
            NIS
            <br>
            <input disabled value="{{$edit->nis}}"
                class="disabled:bg-white disabled:border-none w-full input bg-white" />
        </label>
        <br><br>
        {{-- perusahaan --}}
        <label class="text-black">
            Perusahaan
            <br>
            <input disabled value="{{$edit->perusahaan->nama_perusahaan}}"
                class="disabled:bg-white disabled:border-none w-full input bg-white" />
        </label>
        <br><br>
        {{-- alamat perusahaan --}}
        <label class="text-black">
            Alamat Perusahaan
            <br>
            <input disabled value="{{ $edit->perusahaan->alamat_perusahaan }}"
                class="disabled:bg-white disabled:border-none w-full input bg-white" />
        </label>
        <br><br>
        {{-- telp perusahaan --}}
        <label class="text-black">
            Telepon Perusahaan
            <br>
            @if (!isset($edit->perusahaan->kontak_perusahaan->kontak_perusahaan))
            <input disabled value="-" class="disabled:bg-white disabled:border-none w-full input bg-white" />
            @else
            <input disabled value="{{ $edit->perusahaan->kontak_perusahaan->kontak_perusahaan }}"
                class="disabled:bg-white disabled:border-none w-full input bg-white" />
            @endif
        </label>
        <br><br>
        {{-- status pengajuan --}}
        <label class="text-black">
            Status Pengajuan
            <br>
            @switch($edit->status_pengajuan)
            @case('1')
            <span class="rounded-full bg-yellow-300 px-3 py-1 mt-2">
                <x-heroicon-o-clock class="inline-block w-5 text-black" />
                Menunggu konfirmasi Wali Kelas
            </span>
            @break

            @case('2')
            <span class="rounded-full bg-red-500 px-3 py-1 mt-2 text-white">
                <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                Ditolak Wali Kelas
            </span>
            @break

            @case('3')
            <span class="rounded-full bg-yellow-300 px-3 py-1 mt-2">
                <x-heroicon-o-clock class="inline-block w-5 text-black" />
                Menunggu konfirmasi Kepala Program
            </span>
            @break

            @case('4')
            <span class="rounded-full bg-red-500 px-3 py-1 mt-2 text-white">
                <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                Ditolak Kepala Program
            </span>
            @break

            @case('5')
            <span class="rounded-full bg-yellow-300 px-3 py-1 mt-2">
                <x-heroicon-o-clock class="inline-block w-5 text-black" />
                Menunggu konfirmasi Hubin
            </span>
            @break

            @case('6')
            <span class="rounded-full bg-red-500 px-3 py-1 mt-2 text-white">
                <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                Ditolak Hubin
            </span>
            @break

            @default
            <span class="rounded-full bg-green-500 px-3 py-1 mt-2 text-white">
                <x-heroicon-m-check-badge class="inline-block w-5 text-white" />
                Surat Pengajuan sudah sah
            </span>
            @endswitch
        </label>
        <br><br>

        {{-- Tolak / Terima --}}
        <div class="">
            <label class="text-black">
                <div class="flex">
                    <div class="flex-warp">
                        <form action="tolakpengajuan/{{$edit->id_pengajuan}}" method="POST">
                            @csrf
                            <input type="text" name="id_pengajuan" class="hidden" value="{{$edit->id_pengajuan}}">
                            @switch(Auth::user()->level_user)

                            @case (3)
                            <input type="text" name="status_pengajuan" class="hidden" value="2">
                            @break

                            @case (2)
                            <input type="text" name="status_pengajuan" class="hidden" value="4">
                            @break

                            @case (1)
                            <input type="text" name="status_pengajuan" class="hidden" value="6">
                            @break

                            @endswitch
                            <button type="submit"
                                class="cursor-pointer rounded-lg px-5 py-2 text-[#ffffff] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 hover:text-red-500 active:bg-slate-300 lg:inline-block bg-red-500 mr-2">Tolak</button>
                        </form>
                    </div>
                    <div class="flex-warp">
                        @if (Auth::user()->level_user == 3 || Auth::user()->level_user == 2)
                        <form action="terimapengajuan/{{$edit->id_pengajuan}}" method="POST">
                            @csrf
                            <input type="text" name="id_pengajuan" class="hidden" value="{{$edit->id_pengajuan}}">
                            @switch(Auth::user()->level_user)

                            @case (3)
                            <input type="text" name="status_pengajuan" class="hidden" value="3">
                            @break

                            @case (2)
                            <input type="text" name="status_pengajuan" class="hidden" value="5">
                            @break

                            @endswitch
                            <button type="submit"
                                class="cursor-pointer rounded-lg px-5 py-2 text-[#ffffff] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 hover:text-green-500 active:bg-slate-300 lg:inline-block bg-[#06283D]">Terima</button>
                        </form>
                        @else
                        <form action="/suratpengajuan/detail/pengesahan/{id_pengajuan}" method="POST">
                            @csrf
                            <input type="text" name="id_pengajuan" class="hidden" value="{{$edit->id_pengajuan}}">
                            <input type="text" name="nis" class="hidden" value="{{$edit->nis}}">
                            <input type="text" name="id_kaprog" class="hidden" value="{{$edit->id_kaprog}}">
                            <input type="text" name="id_perusahaan" class="hidden" value="{{$edit->id_perusahaan}}">
                            <input type="text" name="status_pengajuan" class="hidden" value="7">
                            <button type="submit"
                                class="cursor-pointer rounded-lg px-5 py-2 text-[#ffffff] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 hover:text-green-500 active:bg-slate-300 lg:inline-block bg-[#06283D]">Terima</button>
                        </form>
                        @endif
                    </div>
                </div>
            </label>
        </div>
    </div>

    {{-- div 2 --}}
    <div class='w-full'>
        {{-- kaprog --}}
        <label class="text-black">
            Kepala Program
            <br>
            <input disabled value="{{$edit->kepalaprogram->guru->nama_guru}}"
                class="disabled:bg-white disabled:border-none w-full input bg-white" />
        </label>
        <br><br>
        {{-- walas --}}
        <label class="text-black">
            Wali Kelas
            <br>
            <input disabled value="{{$edit->walikelas->guru->nama_guru}}"
                class="disabled:bg-white disabled:border-none w-full input bg-white" />
        </label>
        <br><br>
        {{-- staff hubin --}}
        <label class="text-black">
            Staff Hubin
            <br>
            <input disabled value="{{$edit->staffhubin->guru->nama_guru}}"
                class="disabled:bg-white disabled:border-none w-full input bg-white" />
        </label>
        <br><br>
        {{-- bukti terima --}}
        <label class="text-black">
            <span class="mb-1 block">Bukti Terima</span>
            @if ($edit->bukti_terima !== null)
            <span class="rounded-full bg-green-500 px-3 py-1 text-white">
                <x-heroicon-m-check-badge class="inline-block w-5 text-white" />
                Terlampir
            </span>
            <div class="mt-2">
                <img src="{{ asset('storage/' . $edit->bukti_terima)}}" alt="bukti-terima" class="w-1/3">
            </div>
            @else
            <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                Tidak ada
            </span>
            @endif
            <br>
        </label>
        <br><br>
    </div>
</div>
@endsection