@extends('layouts.main')

@section('title', 'Surat Pengajuan - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp mr-auto">
        <a href="/suratpengajuan"><button class="btn">Kembali</button></a>
    </div>
</div>

<div class="modal-box m-auto">
    <h1 class="text-center mb-4">DETAIL SURAT PENGAJUAN</h1>
    <div class="w-full flex">
        <div class="w-1/2 flex-warp mb-2">
            <input type="text" class="hidden" name="id_pengajuan" value="{{ $edit->id_pengajuan }}">
            <label class="font-bold" for="nis"> NIS </label>
            <br>
            <p>{{$edit->nis}}</p>
        </div>
        <div class="w-1/2 flex-warp mb-2">
            <label class="font-bold" for="nis"> Siswa </label>
            <br>
            <p>{{$edit->siswa[0]->nama_siswa}}</p>
        </div>
    </div>
    <div class="w-full flex">
        <div class="w-1/2 flex-warp mb-2">
            <label class="font-bold" for="id_kaprog"> Wali Kelas </label>
            <br>
            <p>{{$edit->walikelas[0]->nama_walas}} - {{$edit->walikelas[0]->nip_guru}}</p>
        </div>
        <div class="w-1/2 flex-warp mb-2">
            <label class="font-bold" for="id_walas"> Kepala Program </label>
            <br>
            <p>{{$edit->kepalaprogram[0]->nama_kaprog}} - {{$edit->kepalaprogram[0]->nip_guru}}</p>
        </div>
    </div>
    <div class="flex w-full">
        <div class="w-1/2 flex-warp mb-2">
            <label class="font-bold" for="id_ps"> Pembimbing Sekolah </label>
            <br>
            <p>{{$edit->pembimbingsekolah[0]->nama_ps}} - {{$edit->pembimbingsekolah[0]->nip_guru}}</p>
        </div>
        <div class="w-1/2 flex-warp mb-2">
            <label class="font-bold" for="id_staff"> Staff Hubin </label>
            <br>
            <p>{{$edit->staffhubin[0]->nama_staff}} - {{$edit->staffhubin[0]->nip_guru}}</p>
        </div>
    </div>
    <div class="flex w-full">
        <div class="w-1/2 flex-warp mb-2">
            <label class="font-bold" for="id_perusahaan"> Perusahaan </label>
            <br>
            <p>{{$edit->perusahaan[0]->nama_perusahaan}}</p>
        </div>
        <div class="w-1/2 flex-warp mb-2">
            <label class="font-bold" for="id_perusahaan"> Status Pengajuan </label>
            <br>
            @if ($edit->status_pengajuan == null)
            <td class="table-auto text-red-500">Belum Ada</td>
            @elseif ($edit->status_pengajuan == 1)
            <td class="table-auto text-yellow-500">Terverifikasi<br>Wali Kelas</td>
            @elseif ($edit->status_pengajuan == 2)
            <td class="table-auto text-green-500">Terverifikasi<br>Kepala Program</td>
            @elseif ($edit->status_pengajuan == 5)
            <td class="table-auto text-red-500">Verifikasi Ditolak<br>Kepala Program</td>
            @endif
        </div>
    </div>
    <div class="w-full flex flex-wrap">
        <div class="flex flex-wrap w-full mt-2">
            <label class="font-bold" for="bukti_terima">Keterangan</label>
            <br>
            <textarea name="bukti_terima" id="bukti_terima"
                class="w-full h-[10em] shadow-inner rounded-md border border-gray-400 bg-transparent"
                required>{{$edit->bukti_terima}}</textarea>
        </div>
    </div>
    <div class="w-full flex mt-3">
        <form action="tolakpengajuan/{{$edit->id_pengajuan}}" method="POST">
            @csrf
            <input type="text" name="id_pengajuan" class="hidden" value="{{$edit->id_pengajuan}}">
            <input type="text" name="status_pengajuan" class="hidden" value="5">
            <input type="text" name="bukti_terima" class="hidden" value="PENGAJUAN DITOLAK OLEH KEPALA PROGRAM">
            <button type="submit" class="btn bg-red-500 mr-2">Tolak</button>
        </form>
        <form action="terimapengajuan/{{$edit->id_pengajuan}}" method="POST">
            @csrf
            <input type="text" name="id_pengajuan" class="hidden" value="{{$edit->id_pengajuan}}">
            <input type="text" name="status_pengajuan" class="hidden" value="2">
            <input type="text" name="bukti_terima" class="hidden" value="PENGAJUAN DITERIMA OLEH KEPALA PROGRAM">
            <button type="submit" class="btn bg-green-500">Terima</button>
        </form>
    </div>
</div>
@endsection