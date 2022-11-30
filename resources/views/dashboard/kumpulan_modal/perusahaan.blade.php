<!DOCTYPE html>
<html lang="en">
  <head>
  <title>View Presensi</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">   -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

       @vite('resources/css/app.css')
</head>

<body class="bg-[#CCE0DD] h-screen">
<!-- The button to open modal -->
<div class="h-[10em]"><center>
    <h1 class="mt-10 font-extrabold text-[30px] tracking-[.20em] text-[#173A6F]"> DAFTAR PERUSAHAAN </h1>
</center></div>
<div class="overflow-x-scroll mx-20 my-auto"> 
<table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
  <tr class="text-white border-collapse">

    <td colspan="6"  class="bg-[#0A3A58] h-14 sticky w-max-auto">LIST PERUSAHAAN</td>

  </tr>
  <tr>
    <td class="font-bold">NO</td>
    <th>NAMA PERUSAHAAN</th>
    <th class="w-[30em]">ALAMAT</th>
    <th>KONTAK</th>
    <th>KETERANGAN</th>
    <th>AKSI</th>
  </tr>

  <tr>
    <td>1</td>
    <td>PT. Mabok Sejahtera </td>
    <td>
      <div class="w-[30em]"><p class="whitespace-normal text-justify">Jl. Dr. Sumarno No.1, Penggilingan, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13940</p></div>
    </td>
    <td>(021) 48703788</td>
    <td>Digusur</td>
    <td>
    <div class="flex w-44 flex-wrap ">
            <a href="" 
            onclick="return confirm('Anda yakin ingin hapus data ini ?')"><label for="" class="bg-red-600 mr-1  hover:bg-yellow-400 text-white rounded-lg font-bold text-sm p-2 btn hidden
            ">HAPUS</label></a>
        <label for="my-modal-3" class="btn shadow-md">Edit</label> 
      </div>
  </td>
  </tr>
</table>
</div>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
  <div class="modal-box font-bold">
    <label for="my-modal-3" class="btn btn-sm btn-circle absolute hover:bg-red-500 border border-white right-2 top-2">✕</label>
    <form >
        @csrf
        <div class="w-full mb-2">
            <label for="nama_lokasi"> Nama Perusahaan </label>
            <br>
            <input type="text" name="nama_lokasi" id="nama_lokasi" class="w-full rounded-md shadow-inner border border-gray-400">
        </div>
        <div class="w-full mb-2">
            <label for="alamat"> Alamat </label>
            <br>
            <input type="text" name="alamat" id="alamat" class="w-full rounded-md shadow-inner border border-gray-400" >
        </div>
        <div class="w-full mb-2">
            <label for="kontak"> Kontak </label>
            <br>
            <input type="text" name="kontak" id="kontak" class="w-full rounded-md shadow-inner border border-gray-400" >
        </div>
        <div class="w-full flex flex-wrap text-[#06283D]">
            <div class="flex flex-wrap w-full mt-2">
                <label for="keterangan">Keterangan</label>
                <br>
                <textarea name="keterangan" id="keterangan" class="w-full h-[10em] shadow-inner rounded-md border border-gray-400"  ></textarea>
            </div>
        </div>

        
        <div class="modal-action">
        <button type="submit" value="simpan" class="btn bg-[#256D85] rounded-lg px-5 py-3 text-center shadow-md hover:bg-emerald-700 font-bold text-white">Simpan</button>
        </div>

    </form>
  </div>
</div>
</body>
</html>