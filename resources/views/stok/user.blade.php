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
    <h1 class="mt-10 font-extrabold text-[30px] tracking-[.20em] text-[#173A6F]"> DAFTAR PENGGUNA </h1>
</center></div>
<div class="overflow-x-scroll mx-20 my-auto"> 
<table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
  <tr class="text-white border-collapse">

    <td colspan="6"  class="bg-[#0A3A58] h-14 sticky w-max-auto">LIST USER</td>

  </tr>
  <tr>
    <td class="font-bold">NO</td>
    <th>USERNAME</th>
    <th class="w-[30em]">PASSWORD</th>
    <th>EMAIL</th>
    <th>LEVEL USER</th>
    <th>AKSI</th>
  </tr>

  <tr>
    <td>1</td>
    <td>Joe Epic Abadi </td>
    <td>
      <div class="w-[30em]"><p class="whitespace-normal text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti, hic.</p></div>
    </td>
    <td>joetaslimkw@gmail.com</td>
    <td>1</td>
    <td>
    <div class="flex w-44 flex-wrap ">
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
    <label for="my-modal-3" class="btn btn-sm btn-circle absolute hover:bg-red-500 border border-white right-2 top-2">✕</label>
    <form >
        @csrf
        <div class="w-full mb-2">
            <label for="username"> Username </label>
            <br>
            <input type="text" name="username" id="username" class="w-full rounded-md shadow-inner border border-gray-400" disabled>
        </div>
        <div class="w-full mb-2">
            <label for="pw"> Password </label>
            <br>
            <input type="password" name="pw" id="pw" class="w-full rounded-md shadow-inner border border-gray-400" disabled>
        </div>
        <div class="w-full mb-2">
            <label for="Email"> Email </label>
            <br>
            <input type="text" name="Email" id="Email" class="w-full rounded-md shadow-inner border border-gray-400" disabled>
        </div>
        <div class="w-full flex flex-wrap text-[#06283D]">
            <div class="flex flex-wrap w-full mt-2">
                <label for="lvl">Level User</label>
                <br>
                <select name="ket" id="ket" class="w-full shadow-inner rounded-md border border-gray-400" required>
                    <option value=""></option>
                    <option value="1">Staff Hubin</option>
                    <option value="2">Kaprog</option>
                    <option value="3">Walas</option>
                    <option value="4">Pembimbing Sekolah</option>
                    <option value="5">Pembimbing Perusahaan</option>
                    <option value="6">Murid</option>
               </select>
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