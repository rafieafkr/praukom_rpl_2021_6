@extends('layouts.main')

@section('title', 'Data Prakerin')

@section('container')
  <!-- profile card -->
  <div class="flex h-12 w-full justify-center rounded-t-lg bg-[#0A3A58] text-center align-middle text-white">
    <table>
      <tr>
        <td>Data Prakerin</td>
      </tr>
    </table>
  </div>
  <div class="overflow-x-auto">
    <table border="1" cellpadding="0" class="table w-full border-collapse rounded-none text-center">
      <tr>
        <th>NO</th>
        <th>NIS</th>
        <th>NAMA</th>
        <th>PERUSAHAAN</th>
        <th>SURAT PENGAJUAN</th>
        <th>TANGGAL MASUK</th>
        <th>TANGGAL KELUAR</th>
        <th>KETERANGAN</th>
        <th>AKSI</th>
      </tr>

      <tr>
        <td>1</td>
        <td>202110223</td>
        <td>Joe Biji</td>
        <td>
          <p class="whitespace-normal text-left">PT pt-an fnhfnhf nhfnhf nhfnhfn hnfnhfnh nh
            fhnfnhfkvhxjhcjHCVLIAXCBKQucliqyvkach ahvcjhc hc hc wch jhc khjw cjh wckhjc lWH</p>
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
