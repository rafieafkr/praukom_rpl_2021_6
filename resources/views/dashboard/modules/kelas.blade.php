<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Kelas</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">   -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body class="bg-[#CCE0DD] h-full">
<center>
        <h1 class=" font-extrabold text-[30px] tracking-[.20em] text-[#173A6F] mt-10"> DAFTAR KELAS</h1>
</center>
 
<div class="overflow-x-auto mx-20 mt-20">
{{-- validation error message --}}
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <div
          class="mb-5 flex w-[400px] flex-row rounded-lg bg-red-500 p-3 py-3 text-white shadow-[1px_2px_10px_rgba(0,0,1,0.3)]">
          <div class="mr-1 flex items-center">
            <x-heroicon-m-x-circle class="inline-block w-7" />
          </div>
          <div>
            <span class="capitalize leading-3">
              {{ $error }}
            </span>
          </div>
        </div>
      @endforeach
    @endif

    @if (Session::has('success'))
      <div class="mb-5 w-[400px] rounded-lg bg-green-500 p-3 py-3 text-white shadow-[1px_2px_10px_rgba(0,0,1,0.3)]">
        <span class="leading-3">
          <x-heroicon-m-check-circle class="inline-block w-7" />
          {{ Session::get('success') }}
        </span>
      </div>
    @endif
        <div class="float-left">
            <label for="my-modal-3" class="btn bg-blue-500 mb-2">Tambah Kelas</label>
        </div>
    </div>

    <!-- The button to open modal -->
    <div class="overflow-x-scroll mx-20">
            <form action="/search_kelas" method="GET">
                <div class="flex flex-row gap-2">
                    <input type="text" name="cari" placeholder="Masukkan kata kunci..." value="" class="input input-bordered inline-block max-w-xs">
                    <button type="submit" class="btn inline-block"><x-heroicon-m-magnifying-glass class="w-8" /></button>
                    @if(request('cari'))
                        <a href="/kelas">
                            <x-heroicon-o-x-mark class="inline-block w-8" />
                        </a>
                    @endif
                </div>
            </form>
        <table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
            <tr>

                <td class="font-bold">NO</td>
                <th>WALI KELAS</th>
                <th>TINGKATAN</th>
                <th>BAGIAN</th>
                <th>ANGKATAN</th>
                <th>JURUSAN</th>
                <th>AKSI</th>
            </tr>

            <?php 
        $no = 1;
    ?>
            @foreach($dataview as $d)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$d->nama_walas}}</td>
                <td>{{$d->tingkat_kelas}}</td>
                <td>{{$d->nama_kelas}}</td>
                <td>{{$d->tahun}}</td>
                <td>{{$d->nama_jurusan}}</td>
                <td>
                    <div class="flex justify-center">


                        <a href="/kelas/edit/{{$d->id_kelas}}"><button type="submit"
                        class="btn btn-info mr-6">EDIT</button></a>

                        <form action="/kelas/hapus/{{$d->id_kelas}}" method="post">
                            @method("delete")
                            @csrf
                            <a>
                            <button type="submit"
                            class="btn btn-error mr-6">HAPUS</button></a>
                        </form>

                    </div>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
   <!-- table kelas -->
    <div class="overflow-x-auto mx-20 mt-20">
        <div class="float-left">
            <label for="my-modal-4" class="btn bg-blue-500 mb-2">Tambah Angkatan</label>
        </div>
    </div>
   
    <!-- The button to open modal -->
    <div class="overflow-x-scroll mx-20">
    <form action="/search_angkatan" method="GET">
                
                <div class="flex flex-row gap-2">
                    <input type="text" name="cari2" placeholder="Masukkan tahun..." value="" class="input input-bordered inline-block max-w-xs">
                    <button type="submit" class="btn inline-block"><x-heroicon-m-magnifying-glass class="w-8" /></button>
                    @if(request('cari2'))
                        <a href="/kelas">
                            <x-heroicon-o-x-mark class="inline-block w-8" />
                        </a>
                    @endif
                </div>
    </form>
        <table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
            <tr>

                <td class="font-bold">NO</td>
                <th>TAHUN ANGKATAN</th>
                <th>AKSI</th>
            </tr>

            <?php 
        $no = 1;
    ?>
            @foreach($dataangkatan as $d)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$d->tahun}}</td>
                <td>
                    <div class="flex justify-center">


                        <a href="/edit/angkatan/{{$d->id_angkatan}}"><button type="submit"
                        class="btn btn-info mr-6">EDIT</button></a>

                        <form action="/angkatan/hapus/{{$d->id_angkatan}}" method="post">
                            @method("delete")
                            @csrf
                            <a>
                            <button type="submit"
                            class="btn btn-error mr-6">HAPUS</button></a>
                        </form>

                    </div>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
  
    <input type="checkbox" id="my-modal-4" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box font-bold">
            <label for="my-modal-4"
                class="btn btn-sm btn-circle absolute hover:bg-red-500 border border-white right-2 top-2">✕</label>
            <form action="tambah_angkatan" method="POST">
                @csrf
                <div class="w-full mb-2">
                    <label for="tahun"> Tahun Angkatan </label>
                    <br>
                    <input name="tahun" id="tahun" type="text" max="4" class="w-full rounded-md shadow-inner border border-gray-400">
                </div>
                <div class="modal-action">
                    <button type="submit" value="simpan"
                        class="btn bg-[#256D85] rounded-lg px-5 py-3 text-center shadow-md hover:bg-emerald-700 font-bold text-white">Simpan</button>
                </div>

            </form>
        </div>
    </div>

    <input type="checkbox" id="my-modal-3" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box font-bold">
            <label for="my-modal-3"
                class="btn btn-sm btn-circle absolute hover:bg-red-500 border border-white right-2 top-2">✕</label>
            <form action="tambah_kelas" method="POST">
                @csrf
                <div class="w-full mb-2">
                    <label for="wali_kelas"> Wali Kelas </label>
                    <br>
                    <select name="wali_kelas" id="wali_kelas" required  class="select select-bordered w-full p-1 text-center">
                        <option disabled selected>--Pilih Wali Kelas--</option>
                       @foreach($datawalas as $walas)
                       <option value="{{$walas->id_walas}}">{{$walas->nama_guru}}</option>
                       @endforeach
                    </select>
                </div>
                <div class="w-full mb-2">
                    <label for="jurusan"> Jurusan </label>
                    <br>
                    <select name="jurusan" id="jurusan" class="select select-bordered w-full p-1 text-center">
                        <option disabled selected>--Pilih Jurusan--</option>
                       
                       @foreach($datajurusan as $jurusan)
                       <option value="{{$jurusan->id_jurusan}}">{{$jurusan->nama_jurusan}}</option>
                       @endforeach

                    </select>
                </div>

                <div class="w-full mb-2">
                    <label for="tingkat_kelas"> Tingkat Kelas </label>
                    <br>
                    <select name="tingkat_kelas" id="tingkat_kelas" class="select select-bordered w-full p-1 text-center">
                        <option disabled selected>--Pilih Tingkatan Kelas--</option>
                       
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>

                <div class="w-full mb-2">
                    <label for="bagian_kelas"> Bagian Kelas </label>
                    <br>
                    <select name="bagian_kelas" id="bagian kelas" class="select select-bordered w-full p-1 text-center">
                        <option disabled selected>--Pilih Bagian Kelas--</option>
                       
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="">Kosong</option>

                    </select>
                    <sub class="text-red-500">Jika hanya terdapat 1 bagian kelas, anda bisa pilih pilih "kosong"</sub>
                </div>
                <div class="w-full mb-2">
                    <label for="angkatan"> Angkatan </label>
                    <br>
                    <select name="angkatan" id="angkatan" class="select select-bordered w-full p-1 text-center">
                        <option disabled selected>--Pilih Tahun Angkatan--</option>
                       
                       @foreach($dataangkatan as $angkatan)
                       <option value="{{$angkatan->id_angkatan}}">{{$angkatan->tahun}}</option>
                       @endforeach

                    </select>
                </div>

                <div class="modal-action">
                    <button type="submit" value="simpan"
                        class="btn bg-[#256D85] rounded-lg px-5 py-3 text-center shadow-md hover:bg-emerald-700 font-bold text-white">Simpan</button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>
