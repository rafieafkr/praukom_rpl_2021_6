<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Siswa</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body class="bg-[#CCE0DD] h-screen">
<div class="navbar bg-base-100 shadow-lg">
  <div class="navbar-start ">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </label>
      <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
       
    </div>
    <a class="btn btn-ghost normal-case text-xl">SIMAK</a>
  </div>
  <div class="navbar-center hidden lg:flex">
   
  </div>
  <div class="navbar-end ">
    <a class="btn">LogOut</a>
  </div>
</div>
<!-- profile card -->
<div class="overflow-x-auto mx-20 my-10">
<table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
  <tr class="text-white border-collapse">

    <td colspan="9"  class="bg-[#0A3A58] h-14 sticky w-max-auto">DATA PRAKERIN</td>
    
</tr>
  <tr>
   
    <td class="font-bold">NO</td>
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
        <p class="whitespace-normal text-left">PT pt-an fnhfnhf nhfnhf nhfnhfn hnfnhfnh nh fhnfnhfkvhxjhcjHCVLIAXCBKQucliqyvkach ahvcjhc hc hc wch jhc khjw cjh wckhjc lWH</p>
    </td>
    <td>terverifikasi</td>
    <td></td>
    <td></td>
    <td></td>
    <td>
      <div class="flex flex-wrap w-44 hidden">
        <button class="btn bg-red-600 border-0 shadow-md mb-2 mx-1"> hapus</button>
        <button class="btn bg-cyan-900 border-0 shadow-md mb-2 mx-1">edit</button>
      </div>
  </td>
  </tr>
</table>
</div>
</body>
<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
</html>