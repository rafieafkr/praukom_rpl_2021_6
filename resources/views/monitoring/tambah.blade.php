@extends('layouts.main')

@section('title', 'Tambah Monitoring - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp">
        <a href="/monitoring"
            class="cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300">Kembali</a>
    </div>
</div>
<div class="mb-3 flex w-full justify-center align-middle">
    <p class="font-light text-black uppercase" style="font-size: 32px">Form Monitoring</p>
</div>
<div class="w-2/4 m-auto min-h-screen text-center">
    {{-- div 1 --}}
    <form action="/monitoring/store" method="POST">
        @csrf
        @method('POST')
        <div class='w-full'>
            {{-- ps --}}
            <label class="text-black">
                Pembimbing Sekolah
                <br>
                <input hidden name="id_ps" value="{{ Auth::user()->guru->pembimbingsekolah->id_ps }}"
                    class="text-center w-full input bg-white" />
                <input disabled value="{{ Auth::user()->guru->nama_guru }}"
                    class="disabled:bg-white disabled:border-none text-center w-full input bg-white" />
            </label>
            <br><br>
            {{-- kepala sekolah --}}
            <label class="text-black">
                Kepala Sekolah
                <br>
                <select name="id_kepsek" class="text-center w-full input bg-white">
                    <option class="text-center w-full input bg-white" class="text-center w-full input bg-white"
                        value="">
                        Pilih Kepala Sekolah</option>

                    @foreach ($kepsek as $key)

                    <option class="text-center w-full input bg-white" value="{{ $key->id_kepsek }}">
                        {{ $key->guru->nip_guru }} - {{ $key->guru->nama_guru }}</option>

                    @endforeach

                </select>
            </label>
            <br><br>
            {{-- perusahaan --}}
            <label class="text-black">
                Nama Perusahaan
                <br>
                <select name="id_perusahaan" class="text-center w-full input bg-white">
                    <option class="text-center w-full input bg-white" value="">Pilih Perusahaan</option>

                    @foreach ($perusahaan as $key)

                    <option class="text-center w-full input bg-white" value="{{ $key->id_perusahaan }}">
                        {{ $key->nama_perusahaan }}</option>

                    @endforeach

                </select>
            </label>
            <br><br>
            {{-- tanggal monitoring --}}
            <label class="text-black">
                Tanggal Monitoring
                <br>
                <input name="tanggal" type="date" class="text-center input text-black w-full bg-white" />
            </label>
            <br><br>
            {{-- resume --}}
            <label class="text-black">
                Resume
                <br>
                <input name="resume" type="text" class="text-center w-full input bg-white" />
            </label>
            <br><br>
            <input hidden type="text" value="1" name="verifikasi" class="text-center w-full input bg-white" />
            <div class="flex-warp">
                <button type="submit"
                    class="cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300">Simpan</button>
            </div>
        </div>
    </form>
</div>

@endsection