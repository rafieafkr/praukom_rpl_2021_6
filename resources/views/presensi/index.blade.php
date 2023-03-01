@extends('layouts.main')

@section('title', 'Presensi Murid - SIMAK')

@section('container')
  <div class="flex w-full">
    <div class="flex-warp mr-auto">
      <a href="/dashboard"><button class="btn">Kembali</button></a>
    </div>
  </div>

  <div class="mx-20 my-10 overflow-x-auto">
    <table border="1" cellpadding="0" class="table w-full border-collapse text-center">
      <tr class="border-collapse text-white">
        <td colspan="8" class="w-max-auto sticky h-14 bg-[#0A3A58]">Presensi Siswa</td>
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
          <td class="table-auto">{{ $pres->nis }}</td>
          <td class="table-auto">{{ $pres->nik_pp }}</td>
          <td class="table-auto">{{ $pres->tgl_kehadiran }}</td>
          <td class="table-auto text-center">
            <label class="btn bg-green-500 text-white" for="my-modal-3">
              Lihat Detail
            </label>
          </td>
        </tr>
      @endforeach
    </table>
  </div>

  {{-- Modal tambah akun --}}
  <input id="my-modal-3" type="checkbox" class="modal-toggle" />
  <div class="modal">
    <div class="w-[60em] rounded-2xl bg-transparent">
      <div class="card card-side m-auto w-[24em] bg-base-100 shadow-xl md:w-[40em]">
        <label for="my-modal-3"
          class="btn-sm btn-circle btn absolute right-2 top-2 border border-[#000000] bg-[#eb2424] hover:bg-red-500">✕</label>
        <div class="card-body flex w-[20em] pb-3">
          @foreach ($presensi as $key => $pres)
            <div class="w-1/2 flex-wrap bg-red-400">
              <div class="m-auto mb-4 h-min w-full">
                <label class="text-md font-normal" for="">NIS</label>
                <br>
                <span class="text-center text-lg">{{ $pres->nis }}</span>
              </div>
              <div class="mb-4 h-min w-full">
                <label class="text-md font-normal" for="">PEMBIMBING PERUSAHAAN</label>
                <br>
                <span class="text-center text-lg">{{ $pres->nik_pp }}</span>
              </div>
              <div class="mb-4 h-min w-full">
                <label class="text-md font-normal" for="">TANGGAL KEHADIRAN</label>
                <br>
                <span class="text-center text-lg">{{ $pres->tgl_kehadiran }}</span>
              </div>
              <div class="mb-4 h-min w-full">
                <label class="text-md font-normal" for="">KETERANGAN</label>
                <br>
                <span class="text-center text-lg">{{ $pres->keterangan }}</span>
              </div>
              <div class="mb-4 flex h-min w-full">
                <div class="flex-warp mr-2">
                  <label class="text-md font-normal" for="">JAM MASUK</label>
                  <br>
                  <span class="text-center text-lg">{{ $pres->jam_masuk }}</span>
                </div>
                <div class="flex-warp">
                  <label class="text-md font-normal" for="">JAM KELUAR</label>
                  <br>
                  <span class="text-center text-lg">{{ $pres->jam_keluar }}</span>
                </div>
              </div>
            </div>
            <div class="flex-warp w-1/2 bg-slate-700">
              hsahswbwa
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
