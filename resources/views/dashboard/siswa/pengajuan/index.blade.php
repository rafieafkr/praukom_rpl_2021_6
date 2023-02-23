@extends('layouts.main')

@section('title', 'Surat Pengajuan | SIMAK')

@section('container')

  <!-- button buka modal tambah pengajuan -->
  <div class="flex flex-row-reverse gap-3 lg:flex-none lg:flex-row lg:gap-0">
    <label for="modal-tambah-pengajuan"
      class="cursor-pointer rounded-lg border-none bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300 lg:mr-3">
      Tambah
    </label>

    <a href="{{ route('dashboard.index') }}"
      class="cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300">
      Kembali
    </a>
  </div>

  {{-- session flash message --}}
  <div class="mt-5 w-fit">
    @if (Session::has('error'))
      <div class="mb-5 w-fit rounded-lg bg-red-500 p-3 py-3 text-white shadow-[1px_2px_10px_rgba(0,0,1,0.3)]">
        <span class="leading-3">
          <x-heroicon-m-x-circle class="inline-block w-7" />
          {{ Session::get('error') }}
        </span>
      </div>
    @endif

    @if (Session::has('success'))
      <div class="mb-5 w-fit rounded-lg bg-green-500 p-3 py-3 text-white shadow-[1px_2px_10px_rgba(0,0,1,0.3)]">
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
          class="mb-5 flex w-fit flex-row rounded-lg bg-red-500 p-3 py-3 text-white shadow-[1px_2px_10px_rgba(0,0,1,0.3)]">
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

  {{-- Search --}}
  <div class="@if (request('cari')) flex flex-row items-center justify-end gap-2 @endif form-control w-full">
    @if (request('cari'))
      <a href="{{ route('pengajuan.index') }}" class="inline-block">
        <x-heroicon-o-x-mark class="inline-block w-8" />
      </a>
    @endif
    <form action="{{ route('pengajuan.index') }}" class="flex justify-end gap-1" method="GET">
      <input type="text" name="cari" placeholder="Cari nama perusahaan" value="{{ request('cari') }}"
        class="input-bordered input inline-block max-w-xs" />
      <button type="submit" class="btn-square btn">
        <x-heroicon-m-magnifying-glass class="w-8" />
      </button>
    </form>
  </div>

  {{-- tabel daftar pengajuan --}}
  <div class="mt-5 flex h-12 w-full justify-center rounded-lg bg-[#0A3A58] text-center align-middle text-white">
    <span class="leading-[3rem]">Surat Pengajuan</span>
  </div>
  <br>
  @forelse ($pengajuans as $pengajuan)
    <div class="mb-5 min-w-full overflow-x-auto">
      {{-- nomor --}}
      <div class="w-full rounded-t-lg bg-white p-5">
        <span class="font-semibold">Surat Pengajuan {{ $loop->iteration }}</span>
      </div>
      <div class="flex w-full flex-row gap-5 bg-white px-5">
        {{-- div 1 --}}
        <div class="flex w-full flex-col gap-5 bg-white lg:w-1/2">
          <div>
            <p class="text-[14px] font-semibold lg:text-[16px]">Nama</p>
            <span class="text-[12px] text-gray-500 lg:text-[15px]">{{ $pengajuan->nama_siswa }}</span>
          </div>
          <div>
            <p class="text-[14px] font-semibold lg:text-[16px]">Perusahaan</p>
            <span class="text-[12px] text-gray-500 lg:text-sm">{{ $pengajuan->nama_perusahaan }}</span>
          </div>
          <div>
            <p class="text-[14px] font-semibold lg:text-[16px]">Alamat Perusahaan</p>
            <span class="text-[12px] text-gray-500 lg:text-sm">{{ $pengajuan->alamat_perusahaan }}</span>
          </div>
          <div>
            <p class="text-[14px] font-semibold lg:text-[16px]">Kontak Perusahaan</p>
            <span class="text-[12px] text-gray-500 lg:text-sm">{{ $pengajuan->kontak_perusahaan }}</span>
          </div>
        </div>

        {{-- div 2 --}}
        <div class="flex flex-col gap-5 bg-white lg:w-1/2">
          <div>
            <p class="mb-2 text-[14px] font-semibold lg:text-[16px]">Pembimbing Sekolah</p>
            @if ($pengajuan->pembmbing_sekolah)
              <span class="text-[12px] text-gray-500 lg:text-sm">{{ $pengajuan->pembimbing_sekolah }}</span>
            @else
              <div class="w-fit rounded-md bg-yellow-300 px-3 py-1 text-black lg:rounded-full">
                <x-heroicon-o-x-circle class="inline-block w-5 text-black" />
                <span class="text-[12px] lg:text-sm">Pembimbing Sekolah belum ditentukan Kepala Program</span>
              </div>
            @endif
          </div>
          <div>
            <p class="mb-2 text-[14px] font-semibold lg:text-[16px]">Status Pengajuan</p>
            @switch($pengajuan->status_pengajuan)
              @case('1')
                <div class="w-fit rounded-md bg-yellow-300 px-3 py-1 lg:rounded-full">
                  <x-heroicon-o-clock class="inline-block w-5 text-black" />
                  <span class="text-[12px] lg:text-sm">Menunggu konfirmasi Wali Kelas</span>
                </div>
              @break

              @case('2')
                <div class="w-fit rounded-md bg-red-500 px-3 py-1 text-white lg:rounded-full">
                  <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                  <span class="text-[12px] lg:text-sm">Ditolak Wali Kelas</span>
                </div>
              @break

              @case('3')
                <div class="w-fit rounded-md bg-yellow-300 px-3 py-1 lg:rounded-full">
                  <x-heroicon-o-clock class="inline-block w-5 text-black" />
                  <span class="text-[12px] lg:text-sm">Menunggu konfirmasi Kepala Program</span>
                </div>
              @break

              @case('4')
                <div class="w-fit rounded-md bg-red-500 px-3 py-1 text-white lg:rounded-full">
                  <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                  <span class="text-[12px] lg:text-sm">Ditolak Kepala Program</span>
                </div>
              @break

              @case('5')
                <div class="w-fit rounded-md bg-yellow-300 px-3 py-1 lg:rounded-full">
                  <x-heroicon-o-clock class="inline-block w-5 text-black" />
                  <span class="text-[12px] lg:text-sm">Menunggu konfirmasi Hubin</span>
                </div>
              @break

              @case('6')
                <div class="w-fit rounded-md bg-red-500 px-3 py-1 text-white lg:rounded-full">
                  <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                  class="text-[12px] lg:text-sm" <span>Ditolak Hubin</span>
                </div>
              @break

              @default
                <div class="rounded-md bg-green-500 px-3 py-1 text-white lg:rounded-full">
                  <x-heroicon-m-check-badge class="inline-block w-5 text-white" />
                  <span class="text-[12px] lg:text-sm">Surat Pengajuan sudah sah</span>
                </div>
            @endswitch
          </div>
        </div>

      </div>
      {{-- div tombol edit dan hapus --}}
      <div class="flex w-full flex-row justify-end rounded-b-lg bg-white p-5 lg:justify-start">
        <a href="{{ route('pengajuan.edit', ['pengajuan' => $pengajuan->id_pengajuan]) }}"
          class="mr-2 rounded-lg bg-slate-300 px-5 py-2 shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-slate-400 active:bg-slate-500">
          <button>Edit</button>
        </a>
        <form method="post" action="{{ route('pengajuan.destroy', ['pengajuan' => $pengajuan->id_pengajuan]) }}"
          class="inline-block">
          @csrf
          @method('delete')
          <button
            class="rounded-lg bg-red-500 px-5 py-2 text-white shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-red-600 active:bg-red-700"
            onclick="return confirm('Apakah yakin ingin menghapus pengajuan \n{{ $pengajuan->nama_perusahaan }}?')">Hapus</button>
        </form>
      </div>
    </div>
    <br>
    @empty
      <div class="relative -m-10 mx-auto w-fit text-center text-lg">
        <svg class="w-[500px]" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
          <path fill="#F2F4F8"
            d="M43.8,-51.8C52.9,-44.6,53.7,-27.1,57.6,-9.5C61.5,8.1,68.5,25.8,61.8,34.1C55.1,42.3,34.8,41.1,18.2,45C1.6,48.8,-11.4,57.8,-24.3,57.3C-37.3,56.7,-50.3,46.6,-60.7,33C-71.1,19.3,-78.9,2,-76.2,-13.5C-73.6,-29,-60.4,-42.6,-45.9,-48.9C-31.5,-55.2,-15.7,-54.1,0.8,-55C17.3,-56,34.7,-59,43.8,-51.8Z"
            transform="translate(100 100)" />
        </svg>
        <div class="absolute left-0 right-0 bottom-44">
          <x-heroicon-o-document-magnifying-glass class="bg- m-auto w-[250px] text-slate-300" />
          <label for="modal-tambah-pengajuan">
            <span class="cursor-pointer text-[30px] font-bold text-slate-300 underline">
              Data tidak ditemukan
            </span>
          </label>
        </div>
      </div>
    @endforelse

    <!-- Modal tambah pengajuan -->
    <input id="modal-tambah-pengajuan" type="checkbox" class="modal-toggle" />
    <label for="modal-tambah-pengajuan" class="modal cursor-pointer">
      <label class="modal-box relative" for="">
        <div class="mb-3 flex h-12 w-full justify-center text-center align-middle text-lg">
          <span class="leading-[3rem]">Isi Surat Pengajuan</span>
        </div>
        <form action="{{ route('pengajuan.store') }}" method="post" class="flex-col lg:grid lg:grid-cols-2 lg:gap-5"
          enctype="multipart/form-data">
          @csrf
          {{-- div 1 --}}
          <div class="w-full lg:w-[512px]">
            {{-- nis --}}
            <label>
              NIS
              <br>
              <input disabled type="text" name="nis" placeholder="Isi NIS anda"
                class="input-bordered input w-full" value="{{ Auth::user()->siswa->nis }}" />
            </label>
            <br><br>
            {{-- perusahaan --}}
            <label>
              Perusahaan
              <br>
              <input type="text" name="perusahaan" placeholder="Isi nama perusahaan"
                class="input-bordered input w-full" value="{{ old('email') }}" />
            </label>
            <br><br>
            {{-- alamat perusahaan --}}
            <label>
              Alamat Perusahaan
              <br>
              <input type="text" name="alamat_perusahaan" placeholder="Isi alamat perusahaan"
                class="input-bordered input w-full" value="{{ old('alamat_perusahaan') }}" />
            </label>
            <br><br>
            {{-- telp perusahaan --}}
            <label>
              Telepon Perusahaan
              <br>
              <input type="tel" name="telepon_perusahaan" placeholder="Isi telepon perusahaan"
                class="input-bordered input w-full" value="{{ old('telepon_perusahaan') }}" />
            </label>
            <br><br>
            <button
              class="hidden rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300 lg:inline-block"
              type="submit">Tambah</button>
          </div>
          {{-- div 2 --}}
          <div class="w-full lg:w-[512px]">
            {{-- kaprog --}}
            <label>
              Kepala Program
              <br>
              <select name="kaprog" class="select-bordered select w-full">
                <option value="" disabled selected>Pilih Kepala Program</option>
                @foreach ($kaprogs as $kaprog)
                  <option value="{{ $kaprog->id_kaprog }}">{{ $kaprog->nama_guru }}</option>
                @endforeach
              </select>
            </label>
            <br><br>
            {{-- walas --}}
            <label>
              Wali Kelas
              <br>
              <select name="walas" class="select-bordered select w-full">
                <option value="" disabled selected>Pilih Kepala Program</option>
                @foreach ($walass as $walas)
                  <option value="{{ $walas->id_walas }}">{{ $walas->nama_guru }}</option>
                @endforeach
              </select>
            </label>
            <br><br>
            {{-- staff hubin --}}
            <label>
              Staff Hubin
              <br>
              <select name="staff_hubin" class="select-bordered select w-full">
                <option value="" disabled selected>Pilih Kepala Program</option>
                @foreach ($staff_hubins as $staff_hubin)
                  <option value="{{ $staff_hubin->id_staff }}">{{ $staff_hubin->nama_guru }}</option>
                @endforeach
              </select>
            </label>
            <br><br>
            {{-- bukti terima --}}
            <label>
              Bukti Terima
              <br>
              <input id="bukti_terima" type="file" name="bukti_terima" class="file-input-bordered file-input w-full"
                value="{{ old('bukti_terima') }}" onchange="showImg()" />
            </label>
            <br><br>
            <img id="img-show" alt="bukti terima" style="display: none;">
            <br><br>
            <button
              class="rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300 lg:hidden"
              type="submit">Tambah</button>
          </div>

        </form>
      </label>
    </label>

    <script>
      function showImg() {
        const img = document.getElementById('bukti_terima')
        const imgShow = document.getElementById('img-show')

        // ambil ekstensi file
        const fileName = img.files[0]
        const ext = fileName.name.split('.').pop()

        // kalau ekstensi berformat gambar maka munculkan
        if (ext === 'jpg' || ext === 'jpeg' || ext === 'png') {
          const fReader = new FileReader()
          fReader.readAsDataURL(fileName)
          fReader.onload = (fReaderEvent) => {
            imgShow.src = fReaderEvent.target.result
            imgShow.style.display = 'inline-block'
          }
        } else {
          // selain itu jangan tampilkan
          imgShow.style.display = 'none'
        }
      }
    </script>
  @endsection
