@extends('layouts.main')

@section('title', 'Presensi Murid - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp mr-auto">
        <a href="/dashboard"><button class="btn">Kembali</button></a>
    </div>
</div>

<div class="overflow-x-auto mx-20 my-10">
    <table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
        <tr class="text-white border-collapse">
            <td colspan="8" class="bg-[#0A3A58] h-14 sticky w-max-auto">Presensi Siswa</td>
        </tr>
        <tr>
            <td>NO</td>
            <td>NIS</td>
            <td>PEMBIMBING PERUSAHAAN</td>
            <td>TANGGAL KEHADIRAN</td>
            <td>AKSI</td>
        </tr>

        @foreach ($presensi as $key => $pres)
        <tr class="text-center">
            <td class="table-auto">1</td>
            <td class="table-auto">{{$pres->nis}}</td>
            <td class="table-auto">{{$pres->nik_pp}}</td>
            <td class="table-auto">{{$pres->tgl_kehadiran}}</td>
            <td class="table-auto text-center">
                <label class="btn bg-green-500 text-white" for="my-modal-3">
                    Lihat Detail
                </label>
            </td>
        </tr>
        @endforeach
    </table>
</div>

{{-- pop up profile --}}
<input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
    <div class="w-[60em] bg-transparent rounded-2xl">
        <div class="card card-side bg-base-100 shadow-xl w-[24em] md:w-[40em] m-auto">
            <label for="my-modal-3"
                class="btn btn-sm btn-circle absolute bg-[#eb2424] hover:bg-red-500 border border-[#000000] right-2 top-2">✕</label>
            <div class="card-body w-[20em] pb-3 flex">
                @foreach ($presensi as $key => $pres)
                <div class="w-1/2 bg-red-400 flex-wrap">
                    <div class="w-full h-min m-auto mb-4">
                        <label class="font-normal text-md" for="">NIS</label>
                        <br>
                        <span class="text-lg text-center">{{$pres->nis}}</span>
                    </div>
                    <div class="w-full h-min mb-4">
                        <label class="font-normal text-md" for="">PEMBIMBING PERUSAHAAN</label>
                        <br>
                        <span class="text-lg text-center">{{$pres->nik_pp}}</span>
                    </div>
                    <div class="w-full h-min mb-4">
                        <label class="font-normal text-md" for="">TANGGAL KEHADIRAN</label>
                        <br>
                        <span class="text-lg text-center">{{$pres->tgl_kehadiran}}</span>
                    </div>
                    <div class="w-full h-min mb-4">
                        <label class="font-normal text-md" for="">KETERANGAN</label>
                        <br>
                        <span class="text-lg text-center">{{$pres->keterangan}}</span>
                    </div>
                    <div class="w-full h-min mb-4 flex">
                        <div class="flex-warp mr-2">
                            <label class="font-normal text-md" for="">JAM MASUK</label>
                            <br>
                            <span class="text-lg text-center">{{$pres->jam_masuk}}</span>
                        </div>
                        <div class="flex-warp">
                            <label class="font-normal text-md" for="">JAM KELUAR</label>
                            <br>
                            <span class="text-lg text-center">{{$pres->jam_keluar}}</span>
                        </div>
                    </div>
                </div>
                <div class="w-1/2 flex-warp bg-slate-700">
                    hsahswbwa
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection