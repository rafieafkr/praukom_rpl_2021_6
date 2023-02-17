@extends('layouts.main')

@section('title', 'Pilih Pembimbing Sekolah - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp mr-auto">
        <a href="/pilihpembimbingsekolah"
            class="hidden cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300 lg:inline-block">Kembali</a>
    </div>
</div>
<div class="mb-3 flex w-full justify-center align-middle">
    <p class="font-light text-black uppercase" style="font-size: 32px">Pilih Pembimbing Sekolah</p>
</div>
<div class="overflow-x-auto mx-5 md:mx-20 my-5 md:my-10 min-h-screen">
    <div class="w-full md:w-2/4 m-auto">
        <div class="text-center bg-white p-4 w-3/4 h-1/3 m-auto rounded-lg">
            @foreach ($edit as $e)
            <form method="POST" action="/pilihpembimbingsekolah/edit/update">
                @csrf
                <div>
                    <label for="" class="text-black">
                        NIS Siswa
                        <input disabled value="{{$e->nis}}" class="disabled:bg-white w-full input bg-white" />
                    </label>
                    <input type="text" class="hidden" name="id_prakerin" value="{{$e->id_prakerin}}" />
                    <br>
                    <select name="id_ps"
                        class="text-black my-2 w-full h-8 border border-md border-black rounded-md text-center bg-white">
                        <option value="">Pilih Pembimbing</option>

                        @foreach ($ps as $ps)

                        <option value="{{ $ps -> id_ps }}">{{ $ps -> nama_ps }} - {{ $ps -> nip_guru }}</option>

                        @endforeach

                    </select>
                </div>
                <button
                    class="hidden cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300 lg:inline-block"
                    type="submit" value="Simpan">Pilih Pembimbing</button>
            </form>
            @endforeach
        </div>
    </div>
</div>

@endsection