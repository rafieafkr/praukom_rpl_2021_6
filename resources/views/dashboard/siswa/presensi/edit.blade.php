@extends('layouts.main')

@section('title', 'Presensi Siswa | SIMAK')

@section('container')
  <a href="{{ route('presensi-siswa.index') }}"
    class="hidden cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300 lg:float-none lg:inline-block">
    Kembali
  </a>

  <div class="mt-5 w-fit">
    {{-- session flash message --}}
    @if (Session::has('error'))
      <div class="mb-5 w-[400px] rounded-lg bg-red-500 p-3 py-3 text-white shadow-[1px_2px_10px_rgba(0,0,1,0.3)]">
        <span class="leading-3">
          <x-heroicon-m-x-circle class="inline-block w-7" />
          {{ Session::get('error') }}
        </span>
      </div>
    @endif

    @if (Session::has('success'))
      <div class="mb-5 w-[400px] rounded-lg bg-green-500 p-3 py-3 text-white shadow-[1px_2px_10px_rgba(0,0,1,0.3)]">
        <span class="leading-3">
          <x-heroicon-m-check-circle class="inline-block w-7" />
          {{ Session::get('success') }}
        </span>
      </div>
    @endif

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
  </div>

  <div class="mb-3 flex w-full justify-center align-middle">
    <p class="font-light uppercase" style="font-size: 32px">Edit Presensi</p>
  </div>

  @foreach ($dataupdt as $d)
    {{-- status presensi --}}
    <div class="inline-block lg:hidden">
      <span class="mb-3 font-semibold lg:mb-0">Status Hadir</span>
      <br>
      @if ($d->status_hadir == 0)
        <span class="rounded-full bg-yellow-500 px-3 py-1 text-white">
          <x-heroicon-o-clock class="inline-block w-5 text-white" />
          Menunggu Konfirmasi
        </span>
      @elseif ($d->status_hadir == 1)
        <span class="rounded-full bg-red-500 px-3 py-1 text-white">
          <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
          Ditolak
        </span>
      @elseif ($d->status_hadir == 2)
        <span class="rounded-full bg-green-500 px-3 py-1 text-white">
          <x-heroicon-m-check-badge class="inline-block w-5 text-white" />
          Diterima
        </span>
      @endif
      <br><br>
    </div>

    <!-- Form Surat Pengajuan  -->
    <form action="{{ route('presensi-siswa.update', ['presensi' => $d->id_presensi]) }}" method="POST"
      class="w-full flex-col gap-5 lg:grid lg:grid-cols-2" enctype="multipart/form-data">
      @method('put')
      {{ csrf_field() }}
      {{-- div kiri --}}
      <div class="w-full">
        {{-- tanggal kehadiran --}}
        <label class="mt-3 font-semibold">
          Tanggal Kehadiran
          <input type="date" name="tgl_kehadiran" value="{{ $d->tgl_kehadiran }}" class="input-bordered input w-full">
        </label>
        <br>
        <br>

        {{-- jam masuk --}}
        {{-- <input id="id_presensi" type="text" class="hidden" name="id_presensi" value="{{ $d->id_presensi }}" /> --}}
        <label class="mt-3 font-semibold">
          Jam Masuk
          <input type="time" name="jam_masuk" value="{{ $d->jam_masuk }}" class="input-bordered input w-full">
        </label>
        <br>
        <br>

        {{-- jam keluar --}}
        <label class="mt-3 font-semibold">
          Jam Keluar
          <input type="time" name="jam_keluar" value="{{ $d->jam_keluar }}" class="input-bordered input w-full">
        </label>
        <br><br>

        {{-- status presensi (viewport large) --}}
        <div class="hidden lg:inline-block">
          <span class="mb-3 font-semibold lg:mb-0">Status Hadir</span>
          <br>
          @if ($d->status_hadir == 0)
            <span class="rounded-full bg-yellow-500 px-3 py-1 text-white">
              <x-heroicon-o-clock class="inline-block w-5 text-white" />
              Menunggu Konfirmasi
            </span>
          @elseif ($d->status_hadir == 1)
            <span class="rounded-full bg-red-500 px-3 py-1 text-white">
              <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
              Ditolak
            </span>
          @elseif ($d->status_hadir == 2)
            <span class="rounded-full bg-green-500 px-3 py-1 text-white">
              <x-heroicon-m-check-badge class="inline-block w-5 text-white" />
              Diterima
            </span>
          @endif
        </div>

        {{-- submit --}}
        @if ($d->status_hadir == 0)
          <button type="submit"
            class="mr-2 mt-5 hidden rounded-lg bg-[#06283D] px-5 py-2 text-white shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-slate-800 active:bg-slate-900 lg:block">Simpan</button>
        @elseif ($d->status_hadir == 1 || $d->status_hadir == 2)
          <button disabled
            class="mr-2 mt-5 hidden cursor-not-allowed rounded-lg bg-[#b6bfc5] px-5 py-2 text-white shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition lg:block">Simpan</button>
        @endif
      </div>

      {{-- div kanan --}}
      <div class="w-full">
        {{-- keterangan --}}
        <label class="mt-3 font-semibold">Keterangan
          <select id="keterangan" name="keterangan" class="select w-full">
            <option disabled class="text-center">--Pilih Keterangan Presensi--</option>
            <option {{ $d->keterangan == 'hadir' ? 'selected' : '' }} value="hadir">Hadir</option>
            <option {{ $d->keterangan == 'sakir' ? 'selected' : '' }} value="sakit">Sakit</option>
            <option {{ $d->keterangan == 'izin' ? 'selected' : '' }} value="izin">Izin</option>
            <option {{ $d->keterangan == 'alfa' ? 'selected' : '' }} value="alfa">Alfa</option>
          </select>
        </label>
        <br>
        <br>

        {{-- kegiatan --}}
        <label class="mt-3 font-semibold" for="kegiatan"> Kegiatan
          <input type="text" name="kegiatan" class="input-bordered input w-full" value="{{ $d->kegiatan }}">
        </label>
        <br>
        <br>

        {{-- foto selfie --}}
        <label class="mt-3 font-semibold">
          Foto Selfie
          <br>
          @if ($d->foto_selfie)
            <span class="rounded-full bg-green-500 px-3 py-1 text-white">Foto selfie sudah ada</span>
          @else
            <span class="rounded-full bg-red-500 px-3 py-1 text-white">Foto selfie belum ada</span>
            <br>
            <br>
          @endif
          <br>
          <input id="input-img" type="file" name="foto_selfie" class="file-input-bordered file-input mt-2 w-full"
            value="{{ old('foto_selfie') }}" onchange="showImg()" />
        </label>
        <br>
        <div id="div-foto-selfie"
          style="
          @if ($d->foto_selfie) display: block; @else display: none; @endif
        ">
          <img id="foto-selfie" class="mt-2 max-w-[300px]" src="{{ asset('storage/' . $d->foto_selfie) }}"
            alt="foto selfie">
        </div>
        <br>

        {{-- submit & kembali --}}
        <a href="{{ route('presensi-siswa.index', ['presensi' => $d->id_presensi]) }}"
          class="inline-block cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300 lg:float-none lg:hidden">
          Kembali
        </a>
        @if ($d->status_hadir == 0)
          <button type="submit"
            class="mr-2 mt-5 inline-block rounded-lg bg-[#0a3a58] px-4 py-1 text-white shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-slate-800 active:bg-slate-900 lg:hidden lg:px-5 lg:py-2">Simpan</button>
        @elseif ($d->status_hadir == 1 || $d->status_hadir == 2)
          <button disabled
            class="mr-2 mt-5 inline-block cursor-not-allowed rounded-lg bg-[#b6bfc5] px-4 py-1 text-white shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition lg:hidden lg:px-5 lg:py-2">Simpan</button>
        @endif
      </div>
    </form>
  @endforeach
  </div>
  <br>
  <br>

  {{-- js --}}
  <script type="text/javascript">
    function showImg() {
      const inputImg = document.getElementById('input-img')
      const img = document.getElementById('foto-selfie')
      const divImg = document.getElementById('div-foto-selfie')
      console.log(divImg);

      const file = inputImg.files[0]
      const ext = file.name.split('.').pop()

      if (ext == 'jpg' || ext == 'jpeg' || ext == 'png') {
        divImg.style.display = 'block'
        const fReader = new FileReader()

        fReader.readAsDataURL(file)
        fReader.onload = (fReaderEvent) => {
          divImg.style.display = 'inline-block'
          img.src = fReaderEvent.target.result
        }
      } else {
        divImg.style.display = 'none'
      }
    }
  </script>
@endsection
