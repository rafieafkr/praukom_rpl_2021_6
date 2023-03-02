<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Nilai</title>
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
        <a href="/kelas"><button class="btn">Kembali</button></a>
    </div>

    <div class="container px-5 mt-10 bg-white pb-5 overflow-auto w-full mx-auto">
        <div class="bg-white pb-10 w-full">
            <!-- Judul Form -->
            <div class="w-full text-center mb-10 pt-5">
                <p class="font-extrabold">Form Edit Kelas</p>
            </div>

            @foreach($dataview as $d)
            <form action="/kelas/update" method="POST">
                {{csrf_field()}}

                <div class=" w-full px-2  font-bold">
                    <input type="number" name="id_kelas" id="id_kelas" value="{{$d->id_kelas}}" hidden>
                    <div class="w-full">
                    <label for="wali_kelas"> Wali Kelas </label>
                        <br>
                    <select name="id_walas" id="id_walas" class="select select-bordered w-full p-1 text-center">
                        @foreach($datawalas as $walas)
                        @if($walas->id_walas == $d->id_walas)
                            <option selected value="{{$walas->id_walas}}">{{$walas->nama_guru}}</option>
                        @else
                            <option value="{{$walas->id_walas}}">{{$walas->nama_guru}}</option>
                        @endif
                       @endforeach
                        <br>
                    </select>

                    <label for="id_jurusan"> Jurusan </label>
                    <br>
                    <select name="id_jurusan" id="id_jurusan" class="select select-bordered w-full p-1 text-center">
                       @foreach($datajurusan as $jurusan)
                        @if($jurusan->id_jurusan == $d->id_jurusan)
                            <option selected value="{{$jurusan->id_jurusan}}">{{$jurusan->nama_jurusan}}</option>
                        @else
                            <option  value="{{$jurusan->id_jurusan}}">{{$jurusan->nama_jurusan}}</option>
                        @endif
                       @endforeach
                    </select>

                        <br>

                    <label for="tingkat_kelas"> Tingkat Kelas </label>
                        <br>
                    <select name="tingkat_kelas" id="tingkat_kelas" class="select select-bordered w-full p-1 text-center">
                       <!-- @foreach($dataview as $tingkatan) -->
                        @if($d->tingkat_kelas == 10)
                            <option selected value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        @elseif ($d->tingkat_kelas == 11)
                            <option selected value="11">11</option>
                            <option value="10">10</option>
                            <option value="12">12</option>
                        @elseif ($d->tingkat_kelas == 12)
                            <option selected value="12">12</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                        @else
                        @endif
                       <!-- @endforeach -->
                    </select>

                        <br>

                        <label for="nama_kelas"> Bagian Kelas </label>
                        <br>
                    <select name="nama_kelas" id="nama_kelas" class="select select-bordered w-full p-1 text-center">
                       <!-- @foreach($dataview as $tingkatan) -->
                        @if($d->nama_kelas == "A")
                            <option selected value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="">kosong</option>
                        @elseif ($d->nama_kelas == "B")
                            <option selected value="B">B</option>
                            <option value="A">A</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="">kosong</option>
                        @elseif ($d->nama_kelas == "C")
                            <option selected value="C">C</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="D">D</option>
                            <option value="">kosong</option>
                        @elseif ($d->nama_kelas == "")
                            <option selected value="">kosong</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        @elseif ($d->nama_kelas == "D")
                            <option selected value="D">D</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="">kosong</option>
                        @else
                        @endif
                       <!-- @endforeach -->
                    </select>

                        <br>

                    <label for="id_angkatan"> Angkatan </label>
                        <br>
                    <select name="id_angkatan" id="id_angkatan" class="select select-bordered w-full p-1 text-center">
                       @foreach($dataangkatan as $angkatan)
                        @if($angkatan->id_angkatan == $d->id_angkatan)
                            <option selected value="{{$angkatan->id_angkatan}}">{{$angkatan->tahun}}</option>
                        @else
                            <option  value="{{$angkatan->id_angkatan}}">{{$angkatan->tahun}}</option>
                        @endif
                       @endforeach
                    </select>
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