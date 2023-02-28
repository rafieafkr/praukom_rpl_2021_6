@extends('layouts.main')

@section('title', 'Detail Monitoring - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp">
        <a href="/monitoring"
            class="cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300">Kembali</a>
    </div>
</div>
<div class="mb-3 flex w-full justify-center align-middle">
    <p class="font-light text-black uppercase" style="font-size: 32px">Detail Monitoring</p>
</div>
<div class="w-2/4 m-auto min-h-screen text-center">
    {{-- div 1 --}}
    <div class='w-full'>
        {{-- ps --}}
        <label class="text-black">
            Pembimbing Sekolah
            <br>
            <input hidden name="id_ps" value="{{ $detail->id_ps }}" class="text-center w-full input bg-white" />
            <input disabled value="{{ $detail->pembimbingsekolah->guru->nama_guru }}"
                class="disabled:bg-white disabled:border-none text-center w-full input bg-white" />
        </label>
        <br><br>
        {{-- kepala sekolah --}}
        <label class="text-black">
            Kepala Sekolah
            <br>
            <input disabled name="id_kepsek"
                class="disabled:bg-white disabled:border-none text-center w-full input bg-white"
                value="{{ $detail->kepalasekolah->guru->nip_guru }} - {{ $detail->kepalasekolah->guru->nama_guru }}">
        </label>
        <br><br>
        {{-- perusahaan --}}
        <label class="text-black">
            Nama Perusahaan
            <br>
            <input disabled name="id_perusahaan"
                class="disabled:bg-white disabled:border-none text-center w-full input bg-white"
                value="{{ $detail->perusahaan->nama_perusahaan }}">
        </label>
        <br><br>
        {{-- tanggal monitoring --}}
        <label class="text-black">
            Tanggal Monitoring
            <br>
            <input disabled value="{{ $detail->tanggal }}" name="tanggal" type="text"
                class="disabled:bg-white disabled:border-none text-center w-full input bg-white" />
        </label>
        <br><br>
        {{-- resume --}}
        <label class="text-black">
            Resume
            <br>
            <input disabled value="{{ $detail->resume }}" name="resume" type="textarea"
                class="disabled:bg-white disabled:border-none text-center w-full input bg-white" />
        </label>
        <br><br>
        <input hidden type="text" value="1" name="verifikasi" class="text-center w-full input bg-white" />
    </div>
</div>

@endsection