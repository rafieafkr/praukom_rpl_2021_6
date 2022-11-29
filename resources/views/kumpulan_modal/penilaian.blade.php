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
<center>
    <h1 class=" font-extrabold text-[30px] tracking-[.20em] text-[#173A6F] mt-10"> DAFTAR NILAI SISWA PRAKERIN</h1>
</center>
<div class="overflow-x-auto mx-20 mt-20">
    <div class="float-left">
      <label for="my-modal-4" class="btn bg-blue-500 mb-2">Isi Nilai</label>
    </div>
</div>

<!-- The button to open modal -->
<div class="overflow-x-scroll mx-20"> 
<table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
  <tr>
   
    <td class="font-bold">No</td>
    <th>NAMA SISWA</th>
    <th>PEMBIMBING</th>
    <th>KOMPETENSI</th>
    <th>NILAI</th>
    <th>AKSI</th>
  </tr>

  <tr>
    <td>1</td>
    <td>Joe </td>
    <td>Mr. BIjix Suparman </td>
    <td>
        <p class="whitespace-normal text-left">Pemrograman Android dan Robotik</p>
    <td>
      99.98
    </td>
    <td>
    <div class="flex w-44 justify-center">
            <a href="" 
            onclick="return confirm('Anda yakin ingin hapus data ini ?')"><label for="" class="bg-red-600 mr-1  hover:bg-yellow-400 text-white rounded-lg font-bold text-sm p-2 btn
            ">HAPUS</label></a>
        <label for="my-modal-3" class="btn shadow-md">Edit</label> 
      </div>
  </td>
  </tr>
</table>
</div>

<!--EDIT NILAI SISWA-->
<input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
  <div class="modal-box font-bold">
    <h1 class="text-center font-extrabold mb-4">EDIT NILAI SISWA</h1>
    <label for="my-modal-3" class="btn btn-sm btn-circle absolute hover:bg-red-500 border border-white right-2 top-2">✕</label>
    <form action="">
        <div class="w-full mb-2">
            <label for="nama"> Nama </label>
            <br>
            <input type="text" name="" id="nama" class="w-full rounded-md shadow-inner border border-gray-400" required>
        </div>
        <div class="w-full flex flex-wrap text-[#06283D]">
            <div class="flex flex-wrap w-full mt-2">
                <label for="pp">Pembimbing</label>
                <br>
                <input type="text" name="pp" id="pp" class="w-full shadow-inner rounded-md border border-gray-400">
            </div>

            <!-- perulangan kompetensi -->
            <div class="flex flex-wrap w-full mt-2">
                <label for="kompetensi">Kompetensi</label>
                <br>
                <input type="text" name="kompetensi" id="kompetensi" class="w-full shadow-inner rounded-md border border-gray-400">
            </div>
            <!-- selesai perulangan kompetensi -->
            <!-- --------------------------------------------------------------------- -->
            <div class="flex flex-wrap w-full mt-2">
                <label for="Nilai">Nilai</label>
                <br>
                <input type="number" name="Nilai" id="Nilai" class="w-full shadow-inner rounded-md border border-gray-400">
            </div>
        </div>

        
        <div class="modal-action">
        <button type="submit" class="btn bg-[#256D85] rounded-lg px-5 py-3 text-center shadow-md hover:bg-emerald-700 font-bold text-white">Simpan</button>
        </div>

    </form>
  </div>
</div>

<!--INSERT NILAI SISWA-->
<input type="checkbox" id="my-modal-4" class="modal-toggle" />
<div class="modal">
  <div class="modal-box font-bold">
    <h1 class="text-center font-extrabold mb-4">INPUT NILAI SISWA</h1>
    <label for="my-modal-4" class="btn btn-sm btn-circle absolute hover:bg-red-500 border border-white right-2 top-2">✕</label>
    <form action="">
        <div class="w-full mb-2">
            <label for="nama"> Nama </label>
            <br>
            <input type="text" name="" id="nama" class="w-full rounded-md shadow-inner border border-gray-400" required>
        </div>
        <div class="w-full flex flex-wrap text-[#06283D]">
            <div class="flex flex-wrap w-full mt-2">
                <label for="pp">Pembimbing</label>
                <br>
                <input type="text" name="pp" id="pp" class="w-full shadow-inner rounded-md border border-gray-400">
            </div>

            <!-- perulangan kompetensi -->
            <div class="flex flex-wrap w-full mt-2">
                <label for="kompetensi">Kompetensi</label>
                <br>
                <input type="text" name="kompetensi" id="kompetensi" value="KJD" class="w-full shadow-inner rounded-md border border-gray-400" disabled>
                </input>
            </div>
            <!-- selesai perulangan kompetensi -->
            <!-- --------------------------------------------------------------------- -->
            <div class="flex flex-wrap w-full mt-2">
                <label for="Nilai">Nilai</label>
                <br>
                <input type="number" name="Nilai" id="Nilai" class="w-full shadow-inner rounded-md border border-gray-400">
            </div>
        </div>

        
        <div class="modal-action">
        <button type="submit" class="btn bg-[#256D85] rounded-lg px-5 py-3 text-center shadow-md hover:bg-emerald-700 font-bold text-white">Simpan</button>
        </div>

    </form>
  </div>
</div>
</body>
</html>