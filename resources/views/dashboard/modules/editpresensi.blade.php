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

    <div class="container px-5 mt-10 bg-white pb-5 overflow-auto w-full mx-auto">
        <div class="bg-white pb-10 w-full">
            <!-- Judul Form -->
            <div class="w-full text-center mb-10 pt-5">
                <p class="font-extrabold">Form Presensi</p>
            </div>
            @foreach($dataupdt as $d)
            <form action="/update_presensi" method="POST">
                @method('put')
                {{csrf_field()}}
                <div class=" w-full px-2  font-bold">
                    <div class="w-full">
                        <label for="">Tanggal Kehadiran</label>
                        <input type="date" name="tgl_kehadiran" value="{{$d->tgl_kehadiran}}"
                            class="rounded-md shadow-inner w-full border border-gray-400">
                    </div>
                    <div class="w-full">
                        <input type="text" id="id_presensi" class="hidden" name="id_presensi"
                            value="{{$d->id_presensi}}" />
                        <label for="">Jam Masuk</label>
                        <input type="time" name="jam_masuk" value="{{$d->jam_masuk}}"
                            class="rounded-md shadow-inner w-full border border-gray-400">
                    </div>
                    <div class="w-full">
                        <label for="">Jam Keluar</label>
                        <input type="time" name="jam_keluar" value="{{$d->jam_keluar}}"
                            class="rounded-md shadow-inner w-full border border-gray-400">
                    </div>
                    <div class="w-full">
                        <label for="">Keterangan</label>
                        <select name="keterangan" id="keterangan" class="select select-bordered w-full p-1 text-center">
                            <option value="" disabled selected> --Pilih Keterangan Presensi--</option>
                            <option value="hadir">Hadir</option>
                            <option value="sakit">Sakit</option>
                            <option value="izin">Izin</option>
                            <option value="alfa">Alfa</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="kegiatan"> Kegiatan </label>
                        <br>
                        <input type="text" name="kegiatan"
                            class="w-full rounded-md shadow-inner border whitespace-normal h-[10em] border-gray-400"
                            value="{{$d->kegiatan}}">
                    </div>
                    <button type="submit" value="simpan"
                        class="btn bg-[#256D85] rounded -lg px-5 mb-5 py-3 text-center shadow-md hover:bg-emerald-700 font-bold text-white">Simpan</button>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</body>
<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>

</html>