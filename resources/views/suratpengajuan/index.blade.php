@extends('layouts.main')

@section('title', 'Surat Pengajuan - SIMAK')

@section('container')
<div class="flex w-full">
    <div class="flex-warp mr-auto">
        <a href="/dashboard"><button class="btn">Kembali</button></a>
    </div>
</div>
<div class="overflow-x-auto mx-20 my-10">
    <table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
        <tr class="text-white border-collapse">
            <td colspan="6" class="bg-[#0A3A58] h-14 sticky w-max-auto">Surat Pengajuan</td>
        </tr>
        <tr>
            <td class="font-bold">NO</td>
            <th>NIS</th>
            <th>NAMA</th>
            <th>PERUSAHAAN</th>
            <th>STATUS</th>
            <th>AKSI</th>
        </tr>
        <?php 
        $no = 1;
    ?>
        @foreach($sp as $sp)
        @if ($sp->status_pengajuan !== null)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$sp->nis}}</td>
            <td>{{$sp->siswa[0]->nama_siswa}}</td>
            <td>{{$sp->perusahaan[0]->nama_perusahaan}}</td>
            @if ($sp->status_pengajuan == 1)
            <td class="table-auto text-yellow-500">Terverifikasi<br>Wali Kelas</td>
            @elseif ($sp->status_pengajuan == 2)
            <td class="table-auto text-green-500">Terverifikasi<br>Kepala Program</td>
            @elseif ($sp->status_pengajuan == 5)
            <td class="table-auto text-red-500">Verifikasi Ditolak<br>Kepala Program</td>
            @endif
            <td>
                <div class='flex m-auto w-full items-center text-center'>
                    <div class="flex-warp mr-auto items-center text-center w-1/2">
                        <a href="/suratpengajuan/detail/{{$sp->id_pengajuan}}"><button
                                class="btn shadow-md">Detail</button></a>
                    </div>
                    <div class="flex-warp ml-auto items-center text-center w-1/2">
                        <form action="/suratpengajuan/hapus/{{$sp->id_pengajuan}}" method="POST">
                            @csrf
                            <input type="text" name="id_pengajuan" class="hidden" value="{{$sp->id_pengajuan}}">
                            <button type="submit" class="btn bg-red-500">Hapus</button>
                        </form>
                    </div>
                </div>

            </td>
        </tr>
        @else ($sp->status_pengajuan === null)
        <tr class="hidden">
            <td>Tidak ada data</td>
        </tr>
        @endif
        @endforeach
    </table>
</div>
@endsection