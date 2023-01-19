@extends('layouts.main')

@section('title', 'Dashboard Hubin | SIMAK')

@section('container')
  <div class="mb-3 w-full text-center text-[20px] font-normal uppercase tracking-widest text-[#173a6e] md:text-[28px]">
    selamat datang
    {{ auth()->user()->username }}
  </div>
  <div class="flex flex-wrap gap-4 lg:grid lg:grid-cols-4 lg:grid-rows-3">
    {{-- Profile --}}
    <div
      class="col-span-2 row-span-2 h-[327px] w-full rounded-xl bg-[#0A3A58] px-5 py-3 text-white shadow-md shadow-slate-500 md:px-10">
      {{-- div 1 --}}
      <div>
        <p class="text-[32px] font-semibold uppercase tracking-widest">Profil</p>
      </div>
      {{-- div 2 --}}
      <div class="flex-rows flex">
        <div>
          <x-heroicon-o-user-circle class="w-[110px] text-[#7893a3] md:w-[150px]" />
        </div>
        <div class="mt-[20px] md:ml-5">
          <p class="text-lg font-light md:text-2xl">{{ Auth::user()->username }}</p>
          @switch(Auth::user()->level_user)
            @case(1)
              <p class="text-lg font-light md:text-2xl">Staff Hubin</p>
            @break

            @case(2)
              <p class="text-lg font-light md:text-2xl">Kepala Program</p>
            @break

            @case(3)
              <p class="text-lg font-light md:text-2xl">Wali Kelas</p>
            @break

            @case(4)
              <p class="text-lg font-light md:text-2xl">Pembimbing Sekolah</p>
            @break

            @case(5)
              <p class="text-lg font-light md:text-2xl">Pembimbing Perusahaan</p>
            @break

            @case(6)
              <p class="text-lg font-light md:text-2xl">Siswa</p>
            @break

            @default
          @endswitch
          <a href="#" class="hidden h-20 md:inline">
            <button class="mt-5 cursor-pointer rounded-md bg-[#ffffff] px-3 py-1 align-bottom text-[#4C77A9]">
              <label for="my-modal-3" class="cursor-pointer">
                Lihat Profil
              </label>
            </button>
          </a>
        </div>
      </div>
      {{-- div 3 --}}
      <div class="relative mt-8 md:mt-10 md:block">
        <a href="#" class="absolute right-0 left-0 -bottom-16 md:hidden">
          <button class="mt-3 w-full rounded-md bg-[#ffffff] px-3 py-1 align-bottom text-[#4C77A9]">Edit
            Profil</button>
        </a>
      </div>
    </div>

    {{-- Surat pengajuan --}}
    <div
      class="jusify-between flex h-[155px] w-full rounded-xl bg-[#256D85] px-5 py-3 text-white shadow-md shadow-slate-500 md:px-5">
      {{-- div 1 --}}
      <div class="flex w-1/2 flex-col justify-between">
        <div>
          <p class="text-lg font-semibold uppercase tracking-widest">Surat Pengajuan</p>
        </div>
        <div>
          <a href="{{ route('pengajuan.index') }}">
            <button class="mt-5 rounded-md bg-[#ffffff] px-5 py-1 align-bottom text-[#4C77A9]">Lihat</button>
          </a>
        </div>
      </div>
      {{-- div 2 --}}
      <div>
        <x-heroicon-o-document-text class="w-[130px] text-[#7893a3] md:w-[140px]" />
      </div>
    </div>

    {{-- Nilai sertifikat --}}
    <div
      class="jusify-between flex h-[155px] w-full rounded-xl bg-[#47b5ff] px-5 py-3 text-white shadow-md shadow-slate-500 md:px-5">
      {{-- div 1 --}}
      <div class="flex w-1/2 flex-col justify-between">
        <div>
          <p class="text-lg font-semibold uppercase tracking-widest">Nilai Sertifikat</p>
        </div>
        <div>
          <a href="#">
            <button
              class="mt-5 rounded-md bg-[#ffffff] px-5 py-1 align-bottom text-[#4C77A9] shadow-md shadow-slate-500">Lihat</button>
          </a>
        </div>
      </div>
      {{-- div 2 --}}
      <div>
        <x-heroicon-o-clipboard-document-list class="w-[130px] text-[#8bd0ff] md:w-[140px]" />
      </div>
    </div>

    {{-- level user --}}
    <div
      class="jusify-between flex h-[155px] w-full rounded-xl bg-[#dff6ff] px-5 py-3 text-white shadow-md shadow-slate-500 md:px-5">
      {{-- div 1 --}}
      <div class="flex w-1/2 flex-col justify-between">
        <div>
          <p class="text-lg font-semibold uppercase tracking-widest text-[#1e586c]">Level User</p>
        </div>
        <div>
          <a href="{{ route('leveluser.index') }}">
            <button
              class="mt-5 rounded-md bg-[#ffffff] px-5 py-1 align-bottom text-[#4C77A9] shadow-md shadow-slate-400">Lihat</button>
          </a>
        </div>
      </div>
      {{-- div 2 --}}
      <div>
        <x-heroicon-o-user-group class="w-[130px] text-[#a5ccd9] md:w-[140px]" />
      </div>
    </div>

    {{-- Pembimbing Sekolah --}}
    <div
      class="jusify-between flex h-[155px] w-full rounded-xl bg-[#dff6ff] px-5 py-3 text-white shadow-md shadow-slate-500 md:px-5">
      {{-- div 1 --}}
      <div class="flex w-1/2 flex-col justify-between">
        <div>
          <p class="text-lg font-semibold uppercase tracking-widest text-[#1e586c]">Pembimbing Sekolah</p>
        </div>
        <div>
          <a href="/pilihpembimbingsekolah">
            <button
              class="mt-5 rounded-md bg-[#ffffff] px-5 py-1 align-bottom text-[#4C77A9] shadow-md shadow-slate-400">Lihat</button>
          </a>
        </div>
      </div>
      {{-- div 2 --}}
      <div>
        <x-heroicon-s-user-minus class="w-[130px] text-[#a5ccd9] md:w-[140px]" />
      </div>
    </div>

    {{-- sertifikat --}}
    <div
      class="jusify-between flex h-[155px] w-full rounded-xl bg-[#67699d] px-5 py-3 text-white shadow-md shadow-slate-500 md:px-5">
      {{-- div 1 --}}
      <div class="flex w-1/2 flex-col justify-between">
        <div>
          <p class="text-lg font-semibold uppercase tracking-widest text-[#ffffff]">Sertifikat</p>
        </div>
        <div>
          <a href="#">
            <button
              class="mt-5 rounded-md bg-[#ffffff] px-5 py-1 align-bottom text-[#4C77A9] shadow-md shadow-slate-500">Lihat</button>
          </a>
        </div>
      </div>
      {{-- div 2 --}}
      <div>
        <x-heroicon-o-document-check class="w-[130px] text-[#abacc9] md:w-[140px]" />
      </div>
    </div>

    {{-- Wali Kelas --}}
    <div
      class="jusify-between flex h-[155px] w-full rounded-xl bg-[#0A3A58] px-5 py-3 text-white shadow-md shadow-slate-500 md:px-5">
      {{-- div 1 --}}
      <div class="flex w-1/2 flex-col justify-between">
        <div>
          <p class="text-lg font-semibold uppercase tracking-widest text-[#ffffff]">Wali Kelas</p>
        </div>
        <div>
          <a href="#">
            <button class="mt-5 rounded-md bg-[#ffffff] px-5 py-1 align-bottom text-[#4C77A9]">Lihat</button>
          </a>
        </div>
      </div>
      {{-- div 2 --}}
      <div>
        <x-heroicon-o-user-plus class="w-[130px] text-[#7893a3] md:w-[140px]" />
      </div>
    </div>

    {{-- Kepala Program --}}
    <div
      class="jusify-between flex h-[155px] w-full rounded-xl bg-[#256D85] px-5 py-3 text-white shadow-md shadow-slate-500 md:px-5">
      {{-- div 1 --}}
      <div class="flex w-1/2 flex-col justify-between lg:w-[45%]">
        <div>
          <p class="text-lg font-semibold uppercase tracking-widest text-[#ffffff]">Kepala Program</p>
        </div>
        <div>
          <a href="#">
            <button class="mt-5 rounded-md bg-[#ffffff] px-5 py-1 align-bottom text-[#4C77A9]">Lihat</button>
          </a>
        </div>
      </div>
      {{-- div 2 --}}
      <div>
        <x-heroicon-m-user-plus class="w-[130px] text-[#7893a3] md:w-[140px]" />
      </div>
    </div>

    {{-- Presensi Siswa --}}
    <div
      class="jusify-between flex h-[155px] w-full rounded-xl bg-[#00b191] px-5 py-3 text-white shadow-md shadow-slate-500 md:px-5">
      {{-- div 1 --}}
      <div class="flex w-1/2 flex-col justify-between lg:w-[45%]">
        <div>
          <p class="text-lg font-semibold uppercase tracking-widest text-[#ffffff]">Presensi Siswa</p>
        </div>
        <div>
          <a href="#">
            <button class="mt-5 rounded-md bg-[#ffffff] px-5 py-1 align-bottom text-[#4C77A9]">Lihat</button>
          </a>
        </div>
      </div>
      {{-- div 2 --}}
      <div>
        <x-heroicon-o-clock class="w-[130px] text-[#73d4c2] md:w-[140px]" />
      </div>
    </div>

    {{-- Penilaian --}}
    <div
      class="jusify-between flex h-[155px] w-full rounded-xl bg-[#47b5ff] px-5 py-3 text-white shadow-md shadow-slate-500 md:px-5">
      {{-- div 1 --}}
      <div class="flex w-1/2 flex-col justify-between">
        <div>
          <p class="text-lg font-semibold uppercase tracking-widest">Penilaian</p>
        </div>
        <div>
          <a href="#">
            <button
              class="mt-5 rounded-md bg-[#ffffff] px-5 py-1 align-bottom text-[#4C77A9] shadow-md shadow-slate-500">Lihat</button>
          </a>
        </div>
      </div>
      {{-- div 2 --}}
      <div>
        <x-heroicon-o-clipboard-document-check class="w-[130px] text-[#8bd0ff] md:w-[140px]" />
      </div>
    </div>

    {{-- Monitoring --}}
    <div
      class="jusify-between flex h-[155px] w-full rounded-xl bg-[#ad68a6] px-5 py-3 text-white shadow-md shadow-slate-500 md:px-5">
      {{-- div 1 --}}
      <div class="flex w-1/2 flex-col justify-between">
        <div>
          <p class="text-lg font-semibold uppercase tracking-widest">Monitoring</p>
        </div>
        <div>
          <a href="/monitoring">
            <button
              class="mt-5 rounded-md bg-[#ffffff] px-5 py-1 align-bottom text-[#4C77A9] shadow-md shadow-slate-500">Lihat</button>
          </a>
        </div>
      </div>
      {{-- div 2 --}}
      <div>
        <x-heroicon-o-computer-desktop class="w-[130px] text-[#d2acce] md:w-[140px]" />
      </div>
    </div>

    {{-- Data Prakerin --}}
    <div
      class="jusify-between flex h-[155px] w-full rounded-xl bg-[#67699d] px-5 py-3 text-white shadow-md shadow-slate-500 md:px-5">
      {{-- div 1 --}}
      <div class="flex w-1/2 flex-col justify-between">
        <div>
          <p class="text-lg font-semibold uppercase tracking-widest text-[#ffffff]">Data Prakerin</p>
        </div>
        <div>
          <a href="#">
            <button
              class="mt-5 rounded-md bg-[#ffffff] px-5 py-1 align-bottom text-[#4C77A9] shadow-md shadow-slate-500">Lihat</button>
          </a>
        </div>
      </div>
      {{-- div 2 --}}
      <div>
        <x-heroicon-s-document-text class="w-[130px] text-[#abacc9] md:w-[140px]" />
      </div>
    </div>
  </div>

  {{-- pop up profile --}}
  <input id="my-modal-3" type="checkbox" class="modal-toggle" />
  <div class="modal">
    <div class="w-[60em] rounded-2xl bg-transparent">

      <form action="" enctype="multipart/form-data">
        <div class="card card-side m-auto w-[24em] bg-base-100 shadow-xl md:w-[40em]">
          <label for="my-modal-3"
            class="btn-sm btn-circle btn absolute right-2 top-2 border border-[#000000] bg-[#eb2424] hover:bg-red-500">✕</label>
          <div class="w-[15em] rounded-l-2xl bg-[#d9d9d9] pb-3">
            <div class="ml-3 mb-3 w-full text-xl font-normal uppercase text-[#173A6F]">
              <p>Profile</p>
            </div>
            <div class="flex space-x-2">
              <label tabindex="0" class="avatar m-auto mt-[0.3em]">
                <div class="w-[10em] rounded-full">
                  <img src="https://placeimg.com/80/80/people" />
                </div>
              </label>
            </div>
            <div class="m-auto mt-3 w-fit text-center">
              <label class="m-auto text-center font-normal" for="image-profile">
                <p class="m-auto text-center font-normal text-[#173A6F]">GANTI FOTO</p>
              </label>
              <input id="image-profile" type="file" name="image-profile"
                class="file-input-bordered file-input file-input-xs m-auto w-3/4 max-w-xs text-center" />
            </div>
          </div>
          <div class="card-body w-[20em] pb-3">
            <div class="m-auto mb-4 h-min w-full">
              <label class="text-md font-normal" for="">NAMA</label>
              <br>
              <span class="text-center text-lg">{{ Auth::user()->username }}</span>
            </div>
            <div class="mb-4 h-min w-full">
              <label class="text-md font-normal" for="">NIK</label>
              <br>
              <span class="text-center text-lg">dsccsa</span>
            </div>
            <div class="mb-4 h-min w-full">
              <label class="text-md font-normal" for="">LEVEL</label>
              <br>
              @switch(Auth::user()->level_user)
                @case(1)
                  <p class="text-lg font-light md:text-2xl">Staff Hubin</p>
                @break

                @case(2)
                  <p class="text-lg font-light md:text-2xl">Kepala Program</p>
                @break

                @case(3)
                  <p class="text-lg font-light md:text-2xl">Wali Kelas</p>
                @break

                @case(4)
                  <p class="text-lg font-light md:text-2xl">Pembimbing Sekolah</p>
                @break

                @case(5)
                  <p class="text-lg font-light md:text-2xl">Pembimbing Perusahaan</p>
                @break

                @case(6)
                  <p class="text-lg font-light md:text-2xl">Siswa</p>
                @break

                @default
              @endswitch
            </div>
            <div class="mb-4 h-min w-full">
              <label class="text-md font-normal" for="">E-MAIL</label>
              <br>
              <span class="text-center text-lg">{{ Auth::user()->email }}</span>
            </div>
            <div class="mb-4 h-min w-full">
              <label class="text-md font-normal" for="">KONTAK</label>
              <br>
              <span class="text-center text-lg">dsdsds</span>
            </div>
            <div class="modal-action">
              <button type="submit"
                class="btn rounded-lg bg-[#256D85] px-5 py-3 text-center font-light text-white shadow-md hover:bg-emerald-700">Simpan</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
