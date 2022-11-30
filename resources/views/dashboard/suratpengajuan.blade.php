<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengajuan</title>
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
<center>
    <h1 class="mt-10 font-extrabold text-[30px] tracking-[.20em] text-[#173A6F]"> SELAMAT DATANG USER    </h1>
</center>
<label for="my-modal-3" class="btn bg-blue-400 shadow-md rounded-md overflow-x-auto mx-20 my-10" >Tambah</label>
<div class="overflow-x-auto mx-20 my-10">
<table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
  <tr class="text-white border-collapse">

    <td colspan="6"  class="bg-[#0A3A58] h-14 sticky w-max-auto">Surat Pengajuan</td>
    
</tr>
  <tr>
   
    <td class="font-bold">No</td>
    <th>NIS</th>
    <th>NAMA</th>
    <th>WALI KELAS</th>
    <th>KAPROG</th>
    <th>PEMBIMBING SEKOLAH</th>
    <th>PERUSAHAAN</th>
    <th>STATUS</th>
    <th>AKSI</th>
  </tr>
  <?php 
        $no = 1;
    ?>
    @foreach($data as $p)
  <tr>
    <td>{{$no++}}</td>
    <td>{{$p->nis}}</td>
    <td>{{$p->nama_siswa}}</td>
   
    <td>{{$p->nama_walas}}</td>
    <td>{{$p->nama_kaprog}}</td>
    <td></td>
    <td>
        <p class="whitespace-normal text-left">{{$p->nama_perusahaan}}</p>
    </td>
    <td>
      <form action="update_status_pengajuan" method="">

        <input type="hidden" name="status_pengajuan" class="hidden" value="">
        <button type="submit" class="btn">Terima</button>

      </form>
    </td>
    <td>
      <div class="flex flex-wrap w-44">
            <a href="hapus/{{$p->id_pengajuan}}" 
            onclick="return confirm('Anda yakin ingin hapus data ini ?')"><button class="bg-red-600 m-1 hover:bg-yellow-400 text-white rounded-lg font-bold text-sm p-2
            ">HAPUS</button></a>
        <button class="btn bg-cyan-900 border-0 shadow-md mb-2 mx-1">edit</button>
      </div>
  </td>
  </tr>
  @endforeach
</table>
</div>
<!-- POP UP FORM --------------------------------------------------------------------------------->
<input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
  <div class="modal-box font-bold">
    <h1 class="text-center font-extrabold mb-4">Tambah Lokasi</h1>
    <label for="my-modal-3" class="btn btn-sm btn-circle absolute hover:bg-red-500 border border-white right-2 top-2">✕</label>
    <form action="simpan" method="POST">
        @csrf
        <div class="w-full mb-2">
            <label for="nis"> Siswa </label>
            <br>
            <select name="nis" id="nis">
            @foreach($murid as $d)
              <option value="{{$d->nis}}">{{$d->nama_siswa}} {{$d->nis}}</option>
            @endforeach
            </select>
        </div>
        <div class="w-full mb-2">
            <label for="id_perusahaan"> Perusahaan </label>
            <br>
            <input type="text" name="id_perusahaan" id="id_perusahaan" class="w-full rounded-md shadow-inner border border-gray-400" required>
        </div>
        <div class="w-full mb-2">
            <label for="id_kaprog"> Penanggung Jawab </label>
            <br>
            <input type="text" name="id_kaprog" id="id_kaprog" class="w-full rounded-md shadow-inner border border-gray-400" required>
        </div>
        <div class="w-full mb-2">
            <label for="id_walas"> Penanggung Jawab </label>
            <br>
            <input type="text" name="id_walas" id="id_walas" class="w-full rounded-md shadow-inner border border-gray-400" required>
        </div>
        <div class="w-full mb-2">
            <label for="id_ps"> Penanggung Jawab </label>
            <br>
            <input type="text" name="id_ps" id="id_ps" class="w-full rounded-md shadow-inner border border-gray-400" required>
        </div>
        <div class="w-full mb-2">
            <label for="id_staff"> Penanggung Jawab </label>
            <br>
            <input type="text" name="id_staff" id="id_staff" class="w-full rounded-md shadow-inner border border-gray-400" required>
        </div>
        <div class="w-full flex flex-wrap text-[#06283D]">
            <div class="flex flex-wrap w-full mt-2">
                <label for="keterangan">Keterangan</label>
                <br>
                <textarea name="keterangan" id="keterangan" class="w-full h-[10em] shadow-inner rounded-md border border-gray-400" required ></textarea>
            </div>
        </div>

        
        <div class="modal-action">
        <button type="submit" value="simpan" class="btn bg-[#256D85] rounded-lg px-5 py-3 text-center shadow-md hover:bg-emerald-700 font-bold text-white">Simpan</button>
        </div>

    </form>
  </div>
</div>
</body>
<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
</html>