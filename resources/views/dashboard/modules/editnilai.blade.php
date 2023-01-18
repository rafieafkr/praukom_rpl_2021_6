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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">

            </div>
            <a class="btn btn-ghost normal-case text-xl">SIMAK</a>
        </div>
        <div class="navbar-center hidden lg:flex">

        </div>
        <div class="navbar-end ">
            <a class="btn">LogOut</a>
        </div>
    </div>
    <!-- Form Surat Pengajuan  -->
    <div class="ml-5">
        <a href="/penilaian"><button class="btn">Kembali</button></a>
    </div>

    <div class="container px-5 mt-10 bg-white pb-5 overflow-auto w-full mx-auto">
        <div class="bg-white pb-10 w-full">
            <!-- Judul Form -->
            <div class="w-full text-center mb-10 pt-5">
                <p class="font-extrabold">Form Nilai Kompetensi Siswa</p>
            </div>

            @foreach($datanilai as $d)
            <form action="update" method="POST">
                {{csrf_field()}}

                <div class=" w-full px-2  font-bold">

                    <div class="w-full">

                        <input type="hidden" id="id_penilaian" name="id_penilaian" value="{{$d->id_penilaian}}" />
                        <label for="">{{$d->nama_kompetensi}}</label>
                        <input type="hidden" name='kompetensi' value="{{$d->kompetensi}}"
                            class="rounded-md shadow-inner w-full border border-gray-400">

                        <br>

                        <label for="">Nilai</label>
                        <input type="number" max="100" name="nilai" value="{{$d->nilai}}"
                            class="rounded-md shadow-inner w-full border border-gray-400">



                        <button type="submit" value="simpan"
                            class="btn bg-[#256D85] rounded-lg px-5 mb-5 py-3 text-center shadow-md hover:bg-emerald-700 font-bold text-white">Simpan</button>
                    </div>
                </div>

            </form>
            @endforeach

        </div>
    </div>
</body>
<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>

</html>