@extends('layouts.main')

@section('title', 'Dashboard Hubin | SIMAK')

@section('container')
  <div class="mb-3 w-full text-center text-[20px] font-normal uppercase tracking-widest text-[#173a6e] md:text-[28px]">
    selamat datang
    Muhammad Rafie Afkar Yunansyah
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
        <div class="mt-[20px]">
          <p class="text-lg font-light md:text-2xl">Muhammad Rafie Afkar Yunansyah Hebat</p>
          <p class="text-lg font-light md:text-2xl">Siswa</p>
          <a href="#" class="hidden h-20 bg-red-500 md:inline">
            <button class="mt-5 rounded-md bg-[#ffffff] px-3 py-1 align-bottom text-[#4C77A9]">Edit
              Profil</button>
          </a>
        </div>
      </div>
      {{-- div 3 --}}
      <div class="relative mt-8 md:mt-10 md:block">
        <p class="block font-light">NIP : 1234567890</p>
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
          <a href="">
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
          <a href="#">
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
@endsection
