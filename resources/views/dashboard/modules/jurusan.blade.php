<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Jurusan</title>
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

    <div class="float-right w-[20em]">
       
    </div>
    <center>
        <h1 class=" font-extrabold text-[30px] tracking-[.20em] text-[#173A6F] mt-10"> DAFTAR JURUSAN</h1>
    </center>
    <div class="overflow-x-auto mx-20 mt-20">
        <div class="float-left">
            <label for="my-modal-3" class="btn bg-blue-500 mb-2">Tambah Jurusan</label>
        </div>
    </div>

    <!-- The button to open modal -->
    <div class="overflow-x-scroll mx-20">
    <form action="/search_jurusan" method="GET">
            <input type="text" name="cari" placeholder="Cari Siswa .." value="" class="input input-bordered inline-block max-w-xs">
            <input type="submit" value="CARI" class="btn inline-block">
    </form>
        <table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
            <tr>

                <td class="font-bold">NO</td>
                <th>NAMA JURUSAN</th>
                <th>AKRONIM</th>
                <th>KAPROG</th>
                <th>AKSI</th>
            </tr>

            <?php 
        $no = 1;
    ?>
            @foreach($dataview as $d)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$d->nama_jurusan}}</td>
                <td>{{$d->akronim}}</td>
                <td>{{$d->nama_guru}}</td>
                <td>
                    <div class="flex justify-center">
                        <a href="" onclick="return confirm('Anda yakin ingin hapus data ini ?')"><label for="" class="bg-red-600 mr-1 hidden hover:bg-yellow-400 text-white rounded-lg font-bold text-sm p-2 btn">HAPUS</label></a>

                        <a href="/jurusan/edit/{{$d->id_jurusan}}"><button type="submit"
                        class="btn btn-info mr-6">EDIT</button></a>

                        <form action="/hapus_jurusan/{{$d->id_jurusan}}" method="post">
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
    <input type="checkbox" id="my-modal-3" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box font-bold">
            <label for="my-modal-3"
                class="btn btn-sm btn-circle absolute hover:bg-red-500 border border-white right-2 top-2">✕</label>
            <form action="tambah_jurusan" method="POST">
                @csrf
                <div class="w-full mb-2">
                    <label for="nama_jurusan"> Nama Jurusan </label>
                    <br>
                    <input name="nama_jurusan" id="nama_jurusan" class="w-full rounded-md shadow-inner border border-gray-400">
                </div>
                <div class="w-full mb-2">
                    <label for="kepala_jurusan"> kaprog</label>
                    <br>
                    <select id="kepala_jurusan" name="kepala_jurusan" class="select select-bordered w-full p-1 text-center">
                        <option selected disabled>--Pilih Kaprog--</option>
                        @foreach ($datakaprog as $kp)
                        <option value="{{ $kp->id_kaprog }}">{{ $kp->nama_guru }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full mb-2">
                    <label for="akronim"> Akronim </label>
                    <br>
                    <input type="text" name="akronim" id="akronim"
                    class="w-full rounded-md shadow-inner border border-gray-400">
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
