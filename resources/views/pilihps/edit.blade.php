@extends('layouts.main')

@section('title', 'Pilih Pembimbing Sekolah - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp mr-auto">
        <a href="/pilihpembimbingsekolah"><button class="btn">Kembali</button></a>
    </div>
</div>

<div class="overflow-x-auto mx-5 md:mx-20 my-5 md:my-10">
    <div class="w-full md:w-2/4 m-auto">
        <div class="text-center bg-gray-700 p-4 w-3/4 h-1/3 m-auto rounded-lg">
            @foreach ($edit as $e)
            <form method="POST" action="/pilihpembimbingsekolah/edit/update">
                @csrf
                <div>
                    <input type="text" class="hidden" name="id_prakerin" value="{{$e->id_prakerin}}" />
                    <label class="my-2 text-sm font-medium">PEMBIMBING SEKOLAH</label>
                    <br>
                    <select name="id_ps" class="my-2 w-full h-8 border border-md border-black rounded-md text-center">
                        <option value="">Pilih Pembimbing</option>

                        @foreach ($pembimbing_sekolah as $ps)

                        <option value="{{ $ps -> id_ps }}">{{ $ps -> nama_ps }} - {{ $ps -> nip_guru }}</option>

                        @endforeach

                    </select>
                </div>
                <button class="btn" type="submit" value="Simpan">Pilih Pembimbing</button>
            </form>
            @endforeach
        </div>
    </div>
</div>

@endsection