@extends('layouts.main')

@section('title', 'Data Prakerin')

@section('container')
  <div class="mt-5 flex h-12 w-full justify-center rounded-t-lg bg-[#0A3A58] text-center align-middle text-white">
    <span class="leading-[3rem]">Daftar Siswa</span>
  </div>
  <div class="overflow-x-auto">
    <table class="table w-full border-collapse rounded-none text-center">
      <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Perusahaan</th>
        <th>Surat Pengajuan</th>
        <th>Tanggal Masuk</th>
        <th>Tanggal Keluar</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>

      <tr>
        <td class="sticky left-0 z-10">1</td>
        <td>202110223</td>
        <td>Joe Biji</td>
        <td>
          <p>PT pt-an fnhfnhf The Sliding Mr. Bones (Next Stop, Pottersville) The Sliding Mr. Bones (Next Stop,
            Pottersville)</p>
        </td>
        <td>terverifikasi</td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <div class="hidden w-44 flex-wrap">
            <button class="btn mx-1 mb-2 border-0 bg-red-600 shadow-md"> hapus</button>
            <button class="btn mx-1 mb-2 border-0 bg-cyan-900 shadow-md">edit</button>
          </div>
        </td>
      </tr>
    </table>
  </div>
@endsection
