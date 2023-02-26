@extends('layouts.main')

@section('title', 'Data Prakerin - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp mr-1">
        <label for="my-modal-3"
            class="mr-3 cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300">
            Tambah
        </label>
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
<div class="overflow-x-auto mx-20 my-10 min-h-screen">
    <table border="1" cellpadding="0" class="table w-full text-center border-collapse bg-white">
        <tr class="text-white border-collapse">
            <td colspan="6" class="bg-[#0A3A58] h-14 sticky w-max-auto">Data Kompetensi Jurusan
                {{ Auth::user()->guru->kepalaprogram->jurusan->akronim }}</td>
        </tr>
        <tr>
            <td class="bg-white text-black">NO</td>
            <td class="bg-white text-black">Nama Kompetensi</td>
            <td class="bg-white text-black">Aksi</td>
        </tr>
        <?php 
        $no = 1;
    ?>
        @foreach ($kompetensi as $key)
        <tr>
            <td class="bg-white text-black">{{ $no++ }}</td>
            <td class="bg-white text-black w-3/4">{{ $key->nama_kompetensi }}</td>
            <td class="bg-white text-black">
                <a href="#delete-kompetensi/{{ $key->id_kompetensi }}"><button
                        class="rounded-lg px-5 py-2 shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-red-600 active:bg-slate-500 bg-red-500 text-black">
                        <x-heroicon-m-trash class="w-[1.5em]" />
                    </button></a>
            </td>
        </tr>
        <div class="modal" id="delete-kompetensi/{{ $key->id_kompetensi }}">
            <div class="modal-box bg-white text-black items-center justify-center">
                <x-heroicon-o-exclamation-triangle
                    class="w-[10em] h-[10em] items-center justify-center mx-auto text-sm text-red-600" />
                <h3 class="font-semibold text-lg text-center mt-2">
                    Apakah Anda Yakin ingin menghapus data kompetensi dengan nama {{ $key->nama_kompetensi }}?
                </h3>
                <p class="text-center">Data yang terhapus tidak dapat kembali!</p>
                </p>
                <!-- Button -->
                <div class="modal-action gird flex justify-center">
                    <a href="#"
                        class="btn btn-outline btn-[#FF8138] w-[120px]  bg-[#fff] text-[#FF8138] hover:bg-[#FFF] hover:border-[#FF8138] hover:text-[#FF8138]">Batalkan</a>
                    <a href="kompetensi/hapus/{{ $key->id_kompetensi }}"
                        class="btn bg-[#ED1C24] border-[#ED1C24] w-[120px] text-[#fff] dark:text-[#fff] hover:bg-[#ED1C24] hover:border-[#ED1C24]">Hapus</a>
                </div>
            </div>
        </div>
        @endforeach
    </table>
    <input id="my-modal-3" type="checkbox" class="modal-toggle" />
    <div class="modal">
        <div class="container w-2/3">
            <form action="{{ url('kompetensi/tambah') }}" method="POST">
                @csrf
                <table class="table table-bordered w-full mb-2 bg-white" id="dynamicAddRemove">
                    <tr>
                        <th colspan="2" class="text-white text-center bg-[#0A3A58] h-14">Tambah Kompetensi Jurusan
                            {{ Auth::user()->guru->kepalaprogram->jurusan->akronim }} <label for="my-modal-3"
                                class="btn-sm btn-circle btn absolute right-2 top-2 border border-[#000000] bg-[#eb2424] hover:bg-red-500">✕</label>
                        </th>
                    </tr>
                    <tr>
                        <td class="items-center bg-white w-3/4">
                            <input type="text" name="addmore[0][id_jurusan]"
                                value="{{ Auth::user()->guru->kepalaprogram->jurusan->id_jurusan }}"
                                class="form-control hidden" value="" />
                            <input type="text" name="addmore[0][nama_kompetensi]" placeholder="Masukan Kompetensi"
                                class="form-control w-full py-3 rounded-md text-center bg-white border border-sm text-black" />
                        </td>
                        <td class="items-center bg-white"><button type="button" name="add" id="dynamic-ar"
                                class="cursor-pointer rounded-lg px-5 py-2 text-[#ffffff] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 hover:text-green-500 active:bg-slate-300 lg:inline-block bg-green-500">Tambah
                                Input Kompetensi</button>
                        </td>
                    </tr>
                </table>
                <button type="submit"
                    class="cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300">Simpan</button>
            </form>
        </div>
        <!-- JavaScript -->
        <script src="/assets/jquery.js"></script>
        <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append(
                '<tr><td class="w-3/4 bg-white"><input type="text" name="addmore[' +
                i +
                '][id_jurusan]" class="form-control hidden text-black" value="{{ Auth::user()->guru->kepalaprogram->jurusan->id_jurusan }}" /><input type="text" name="addmore[' +
                i +
                '][nama_kompetensi]" placeholder="Masukan Kompetensi" class="text-black form-control w-full py-3 rounded-md text-center bg-white border border-sm"  /></td><td class="bg-white"><button type="button" class="cursor-pointer rounded-lg px-5 py-2 text-[#ffffff] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 hover:text-red-500 active:bg-slate-300 lg:inline-block bg-red-500">Hapus Input Kompetensi</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });
        </script>
    </div>
</div>

@endsection