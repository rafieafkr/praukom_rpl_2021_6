<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Presensi</title>
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
        <h1 class=" font-extrabold text-[30px] tracking-[.20em] text-[#173A6F] mt-10"> DAFTAR PRESENSI SISWA PRAKERIN
        </h1>
    </center>
    <div class="overflow-x-auto mx-20 flex flex-wrap flex-row justify-between">
            <div class="w-full block mt-5 ">
                <label for="my-modal-3" class="btn bg-blue-500 mb-2">Isi Presensi</label>
            </div>
            <br>
            <form action="/search" method="GET">
                
            <div class="flex flex-row gap-2">
                <input type="text" name="cari" placeholder="Cari Siswa .." value="" class="input input-bordered inline-block max-w-xs">
                <button type="submit" class="btn inline-block"><x-heroicon-m-magnifying-glass class="w-8" /></button>
                @if(request('cari'))
                    <a href="/presensi">
                        <x-heroicon-o-x-mark class="inline-block w-8" />
                    </a>
                @endif
            </div>


               
            </form>
           
            <div class="flex">

                <form action="filter_presensi" method="GET">
                    <select name="filter" id="" class="select select-info max-w-xs">
                        <option value="" selected disabled class="text-center"><p class="font-bold"> Filter </p></option>
                        <option value="1">Belum Terkonfirmasi</option>
                        <option value="2">Presensi Ditolak</option>
                        <option value="3">Terkonfirmasi</option>
                    </select>
                    <button type="submit" class="btn inline-block">Terapkan</button>
                </form>
                @if(request('filter'))
                    <a href="/presensi"><button class="btn btn-inline-block">Hapus Filter</button> </a>
                @endif

            </div>
           
          
        </div>
    <!-- form search -->
   
    <!-- The button to open modal -->
    <div class="overflow-x-scroll mx-20">
        <table border="1" cellpadding="0" class="table w-full text-center border-collapse ">
            <tr>

                <td class="font-bold">NO</td>
                <th>NAMA SISWA</th>
                <th>TANGGAL KEHADIRAN</th>
                <th>KETERANGAN</th>
                <th>STATUS</th>
                <th>AKSI</th>
                <th>VERIFIKASI</th>
            </tr>

            <?php 
                 $no = 1;
            ?>
            @foreach($dataview as $d)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$d->nama_siswa}}</td>
                <td>{{$d->tgl_kehadiran}}</td>
                <td>{{$d->keterangan}}</td>
                <td class="p-4 bg-white text-black">
                
                @switch($d->status_hadir)
            
                @case('2')
                <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                    <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                    Presensi ditolak
                </span>
                @break

                @case('3')
                <span class="rounded-full bg-green-600 px-3 py-1 text-white ">
                    <x-heroicon-o-clock class="inline-block w-5 text-white" />
                    Terkonfirmasi
                </span>
                @break
                @default('1')
                <span class="rounded-full bg-yellow-500 px-3 py-1 text-black">
                    <x-heroicon-s-exclamation-circle class="inline-block w-5 text-black" />
                    Belum Terkonfirmasi
                </span>
                @endswitch
            </td>
            
                <td>
                    <div class="flex w-44 justify-center ">
                        <a href="" onclick="return confirm('Anda yakin ingin hapus data ini ?') "><label for="" class="bg-red-600 mr-1 hidden hover:bg-yellow-400 text-white rounded-lg font-bold text-sm p-2 btn">HAPUS</label>
                        </a>

                        <a href="/edit/{{$d->id_presensi}}"><button type="submit"
                        class="btn btn-success mr-6">EDIT</button></a>

                        <a href="/cetak_presensi/{{$d->nis}}"><button type="submit"
                        class="btn btn-success mr-6">CETAK</button></a>

                    </div>
                </td>
                <td>
                    <div class="flex flex-wrap">
                    <form action="tolakpresensi/{{$d->id_presensi}}" method="post">
                        @csrf
                        @method('post')
                        <input type="number" hidden value="2" name="status_hadir">
                            <button class="btn  bg-transparent hover:bg-transparent border-none rounded-lg" type="submit"><x-heroicon-o-x-circle class="w-[3em]  bg-red-500 rounded-full" /></button>
                    </form>
                    <form action="/terimapresensi/{{$d->id_presensi}}" method="post">
                        @csrf
                        @method('post')
                       <input type="number" hidden value="3" name="status_hadir">
                            <button class="btn bg-transparent hover:bg-transparent border-none rounded-lg" type="submit"><x-heroicon-o-check-circle class="w-[3em] bg-green-500 rounded-full " /></button>
                    </form>
                    </div>
                </td>
                
            </tr>
            @endforeach
        </table>


    </div>
    <div class="mx-20 overflow-auto bg-slate-300">{{ $dataview->links() }}</div>
    
    <input type="checkbox" id="my-modal-3" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box font-bold">
            <label for="my-modal-3"
                class="btn btn-sm btn-circle absolute hover:bg-red-500 border border-white right-2 top-2">✕</label>
            <form action="simpan" method="POST">
                @csrf
                <div class="w-full mb-2">
                    <label for="prakerin"> Siswa </label>
                    <br>
                    <select name="nis" id="prakerin" class="select select-bordered w-full p-1 text-center">
                        <option disabled selected>--Pilih NIS Anda--</option>
                        @foreach($prakerin as $p)
                        <option value="{{$p->nis}}"> NIS( {{$p->nis}} )</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full mb-2">
                    <label for="nik_pp">Pembimbing</label>
                    <select name="nik_pp" id="nik_pp" class="select select-bordered w-full p-1 text-center"></select>
                </div>
                <div class="w-full mb-2">
                    <label for="keterangan"> keterangan </label>
                    <br>
                    <select name="keterangan" id="keterangan" class="select select-bordered w-full p-1 text-center">
                        <option value="" disabled selected> --Pilih Keterangan Presensi--</option>
                        <option value="hadir">Hadir</option>
                        <option value="sakit">Sakit</option>
                        <option value="izin">Izin</option>
                        <option value="alfa">Alfa</option>
                    </select>

                </div>
                <input type="number" name="status_hadir" id="status_hadir" value="" hidden>

                <div class="w-full mb-2">
                    <label for="tgl_kehadiran"> Tanggal Kehadiran </label>
                    <br>
                    <input type="date" name="tgl_kehadiran" id="tgl_kehadiran"
                        class="w-full rounded-md shadow-inner border border-gray-400">
                </div>

                <div class="w-full mb-2">
                    <label for="jam_masuk"> Jam Masuk </label>
                    <br>
                    <input type="time" name="jam_masuk" id="jam_masuk"
                        class="w-full rounded-md shadow-inner border border-gray-400">
                </div>

                <div class="w-full mb-2">
                    <label for="jam_keluar"> Jam Keluar </label>
                    <br>
                    <input type="time" name="jam_keluar" id="jam_keluar"
                        class="w-full rounded-md shadow-inner border border-gray-400">
                </div>

                <div class="w-full mb-2">
                    <label for="kegiatan"> Kegiatan </label>
                    <br>
                    <textarea name="kegiatan" rows="7"
                        class="w-full rounded-md shadow-inner border border-gray-400"></textarea>
                </div>

                <div class="modal-action">
                    <button type="submit" value="simpan"
                        class="btn bg-[#256D85] rounded-lg px-5 py-3 text-center shadow-md hover:bg-emerald-700 font-bold text-white">Simpan</button>
                </div>

            </form>
        </div>
    </div>
    <!-- js -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#prakerin').on('change', function() {
            var nis = this.value;
            $('#nik_pp').html('');
            $.ajax({
                url: "{{ route('getPp') }}?nis=" + nis,
                type: 'get',
                success: function(res) {
                    $('#nik_pp').html('<option value="">--Pilih Pembimbing--</option>');
                    $.each(res, function(key, value) {
                        $('#nik_pp').append('<option value="' + value
                            .nik_pp + '">' + value.nik_pp +
                            '</option>');
                    });
                    $('#city').html('<option value=""></option>');
                }
            });
        });
    });
    </script>
</body>

</html>
