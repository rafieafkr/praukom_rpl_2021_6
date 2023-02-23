@extends('layouts.main')

@section('title', 'Detail Data Prakerin - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp mr-1">
        <a href="/dataprakerin"
            class="cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300">Kembali</a>
    </div>
</div>
<div class="mb-3 flex w-full justify-center align-middle">
    <p class="font-light text-black uppercase" style="font-size: 32px">Detail Data Prakerin</p>
</div>
<br>
<div class="w-2/4 m-auto min-h-screen text-center">
    {{-- div 1 --}}
    <div class='w-full'>
        {{-- nis dan nama siswa --}}
        <label class="text-black">
            NIS & Nama Siswa
            <br>
            <input disabled value="{{$edit->nis}} - {{$edit->siswa->nama_siswa}}"
                class="disabled:bg-white disabled:border-none text-center w-full input bg-white" />
        </label>
        <br><br>
        {{-- nik dan nama pp --}}
        <label class="text-black">
            NIK & Nama Pembimbing Perusahaan
            <br>
            <input disabled value="{{ $edit->nik_pp }} - {{ $edit->pembimbingperusahaan->nama_pp }}"
                class="disabled:bg-white disabled:border-none text-center w-full input bg-white" />
        </label>
        <br><br>
        {{-- nip dan nama ps --}}
        <label class="text-black">
            NIP & Nama Pembimbing Sekolah
            <br>
            @if($edit->pembimbingsekolah == null)
            <input disabled value="-"
                class="disabled:bg-white disabled:border-none text-center w-full input bg-white" />
            @else
            <input disabled
                value="{{ $edit->pembimbingsekolah->guru->nip_guru }} - {{ $edit->pembimbingsekolah->guru->nama_guru }}"
                class="disabled:bg-white disabled:border-none text-center w-full input bg-white" />
            @endif
        </label>
        <br><br>
        {{-- nip dan nama kaprog --}}
        <label class="text-black">
            NIP & Nama Kepala Program
            <br>
            <input disabled value="{{$edit->kepalaprogram->guru->nip_guru}} - {{$edit->kepalaprogram->guru->nama_guru}}"
                class="disabled:bg-white disabled:border-none text-center w-full input bg-white" />
        </label>
        <br><br>
        {{-- perusahaan --}}
        <label class="text-black">
            Nama Perusahaan
            <br>
            <input disabled value="{{$edit->perusahaan->nama_perusahaan}}"
                class="disabled:bg-white disabled:border-none text-center w-full input bg-white" />
        </label>
        <br><br>
        {{-- tanggal masuk & keluar --}}
        <label class="text-black">
            Tanggal Masuk & Tanggal Keluar
            <br>
            @if ($edit->tanggal_masuk == null)
            <input disabled value="-"
                class="disabled:bg-white disabled:border-none text-center w-full input bg-white" />
            @else
            <input disabled value="{{$edit->tanggal_masuk}} s/d {{$edit->tanggal_keluar}}"
                class="disabled:bg-white disabled:border-none text-center w-full input bg-white" />
            @endif
        </label>
        <br><br>
    </div>
</div>
</div>

@endsection