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
    <h1 class=" font-extrabold text-[30px] tracking-[.20em] text-[#173A6F]"> DAFTAR PRESENSI</h1>
</center>

<!-- The button to open modal -->
<div class="overflow-x-scroll mx-20 my-10"> 
<table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
  <tr>
   
    <td class="font-bold">No</td>
    <th>NAMA</th>
    <th>TANGGAL</th>
    <th>KETERANGAN</th>
    <th>JAM MASUK</th>
    <th>JAM SELESAI</th>
    <th>KEGIATAN</th>
    <th>AKSI</th>
  </tr>

  <tr>
    <td>1</td>
    <td>JOE </td>
    <td>2-10-2022</td>
    <td>
        <p class="whitespace-normal text-left"> Telat 3 jam </p>
    <td>09.00</td>
    <td>00.00</td>
    <td>
      <p class="whitespace-normal text-left">Hack Satelit NASA Menggunakan HTML dan CSS</p>
    </td>
    <td>
    <div class="flex w-44">
            <a href="" 
            onclick="return confirm('Anda yakin ingin hapus data ini ?')"><label for="" class="bg-red-600 mr-1  hover:bg-yellow-400 text-white rounded-lg font-bold text-sm p-2 btn
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
    <h1 class="text-center font-extrabold mb-4">PRESENSI</h1>
    <label for="my-modal-3" class="btn btn-sm btn-circle absolute hover:bg-red-500 border border-white right-2 top-2">✕</label>
    <form action="">
        <div class="w-full mb-2">
            <label for="nama"> Nama </label>
            <br>
            <input type="text" name="" id="nama" class="w-full rounded-md shadow-inner border border-gray-400" required>
        </div>
        <div class="w-full flex flex-wrap text-[#06283D]">
            <div class="flex flex-wrap w-1/2 pr-1 mt-2">
                <label for="tgl">Tanggal Masuk</label>
                <br>
                <input type="date" name="" id="tgl" class="w-full shadow-inner rounded-md border border-gray-400">
            </div>
            <div class="flex flex-wrap w-1/2 pl-1 mt-2">
                <label for="ket">Keterangan</label>
                <br>
               <select name="ket" id="ket" class="w-full shadow-inner rounded-md border border-gray-400" required>
                    <option value=""></option>
                    <option value="Hadir">Hadir</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Izin">Izin</option>
                    <option value="Alfa">Alfa</option>
               </select>
            </div>
            <!-- --------------------------------------------------------------------- -->
            <div class="flex flex-wrap w-1/2 pr-1 mt-2">
                <label for="j_msk">Jam Masuk</label>
                <br>
                <input type="time" name="" id="j_msk" class="w-full shadow-inner rounded-md border border-gray-400">
            </div>
            <div class="flex flex-wrap w-1/2 pl-1 mt-2">
                <label for="j_keluar">Jam Keluar</label>
                <br>
                <input type="time" name="" id="j_keluar" class="w-full shadow-inner rounded-md border border-gray-400">
            </div>
<!-- ----------------------------------------------------------------------------------------------- -->
            <div class="flex flex-wrap w-1/2 mt-2">
                <label for="foto">Foto Kegiatan</label>
                <br>
                <input type="file" name="" id="foto" class="w-full shadow-inner rounded-md border border-gray-400" required>
            </div>
<!-- ------------------------------------------------------------------------------------------------ -->
            <div class="flex flex-wrap w-full mt-2">
                <label for="Kegiatan">Kegiatan</label>
                <br>
                <textarea name="kegiatan" id="kegiatan" class="w-full h-[10em] shadow-inner rounded-md border border-gray-400" required ></textarea>
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