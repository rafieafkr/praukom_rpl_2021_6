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

<body class="h-screen bg-[#CCE0DD]">
  <div class="navbar bg-base-100 shadow-lg">
    <div class="navbar-start">
      <div class="dropdown">
        <label tabindex="0" class="btn-ghost btn lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </label>
        <ul tabindex="0" class="dropdown-content menu rounded-box menu-compact mt-3 w-52 bg-base-100 p-2 shadow">

      </div>
      <a class="btn-ghost btn text-xl normal-case">SIMAK</a>
    </div>
    <div class="navbar-center hidden lg:flex">

    </div>
    <div class="navbar-end">
      <a class="btn">LogOut</a>
    </div>
  </div>
  <!-- profile card -->
  <center>
    <h1 class="mt-10 text-[30px] font-extrabold tracking-[.20em] text-[#173A6F]"> SELAMAT DATANG USER </h1>
  </center>
  <div class="mx-20 my-10 overflow-x-auto">
    <table border="1" cellpadding="0" class="table w-full border-collapse text-center">
      <tr class="border-collapse text-white">

        <td colspan="6" class="w-max-auto sticky h-14 bg-[#0A3A58]">Surat Pengajuan</td>

      </tr>
      <tr>

        <td class="font-bold">No</td>
        <th>NIS</th>
        <th>NAMA</th>
        <th>PERUSAHAAN</th>
        <th>STATUS</th>
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
        <td>dikeluarkan</td>
        <td>
          <div class="hidden w-44 flex-wrap">
            <button class="btn mx-1 mb-2 border-0 bg-red-600 shadow-md"> hapus</button>
            <button class="btn mx-1 mb-2 border-0 bg-cyan-900 shadow-md">edit</button>
          </div>
        </td>
      </tr>
    </table>
  </div>
</body>
<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>

</html>
