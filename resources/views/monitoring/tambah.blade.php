@extends('layouts.main')

@section('title', 'Form Monitoring - SIMAK')

@section('container')

<div class="overflow-x-auto mx-20 my-10">
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
            <div class="text-center bg-gray-400 p-4 w-3/4 h-1/3 m-auto rounded-lg">
                <form method="POST" action="update">
                    @csrf
                    <div>
                        <input type="text" name="id_prakerin" value="{{$edit->id_prakerin}}" />
                        <label class="text-black my-2 text-sm font-medium">NIS</label>
                        <br>
                        <input
                            class="my-2 w-full h-8 border border-md border-black rounded-md text-white text-center disabled"
                            type="text" name="nis" value="{{$edit->nis}}" />
                    </div>
                    <div>
                        <label class="text-black my-2 text-sm font-medium">PEMBIMBING PERUSAHAAN</label>
                        <br>
                        <input class="my-2 w-full h-8 border border-md border-black rounded-md text-white text-center"
                            type="text" name="nik_pp" value="{{$edit->nik_pp}}" />
                    </div>
                    <div>
                        <label class="text-black my-2 text-sm font-medium">PEMBIMBING SEKOLAH</label>
                        <br>
                        <select name="id_ps"
                            class="my-2 w-full h-8 border border-md border-black rounded-md text-white text-center">
                            <option value="">Pilih Pembimbing</option>

                            @foreach ($pembimbing_sekolah as $ps)

                            <option value="{{ $ps -> id_ps }}">{{ $ps -> nama_ps }} - {{ $ps -> nip_guru }}</option>

                            @endforeach

                        </select>
                    </div>
                    <div>
                        <label class="text-black my-2 text-sm font-medium">KEPALA PROGRAM</label>
                        <br>
                        <input class="my-2 w-full h-8 border border-md border-black rounded-md text-white text-center"
                            type="text" name="id_kaprog" value="{{$edit->id_kaprog}}" />
                    </div>
                    <div>
                        <label class="text-black my-2 text-sm font-medium">PERUSAHAAN</label>
                        <br>
                        <input class="my-2 w-full h-8 border border-md border-black rounded-md text-white text-center"
                            type="text" name="id_perusahaan" value="{{$edit->id_perusahaan}}" />
                    </div>
                    <br>
                    <button class="btn" type="submit" value="Simpan">Pilih Pembimbing</button>
                </form>
            </div>
        </div>
    </div>

    @endsection
</div>

@endsection