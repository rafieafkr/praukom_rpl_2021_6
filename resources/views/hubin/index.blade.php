@extends('layouts.main')

@section('title', 'Dashboard - HUBIN')
    
@section('container')
    <div class="grid md:grid-cols-4 md:grid-rows-2 gap-4">
      <div class="col-span-2 row-span-2">
        {{-- Profile --}}
        <div class="bg-[#0A3A58] w-full h-[327px] rounded-xl text-white px-10 py-3">
          {{-- div 1 --}}
          <div>
            <p class="text-[32px] font-bold uppercase tracking-widest">Profil</p>
          </div>
          {{-- div 2 --}}
          <div class="flex flex-rows">
            <div>
              <x-icons.user @class(['w-[170pt]', 'inline', 'text-[#7893a3]'])/>
            </div>
            <div class="mt-[20px]">
              <p class="text-3xl uppercase font-light">Supriman</p>
              <p class="text-3xl uppercase font-light">Staff Hubin</p>
              <a href="#" class="h-20 bg-red-500">
                <button class="align-bottom bg-[#ffffff] text-[#4C77A9] px-3 py-1 rounded-md mt-10">Edit Profil</button>
              </a>
            </div>
          </div>
          {{-- div 3 --}}
          <div>
            <p class="font-light">NIP : 1234567890</p>
          </div>
        </div>
      </div>

      {{-- Surat pengajuan --}}
      <div class="w-full h-[155px] bg-[#256D85] rounded-xl"></div>

      {{-- Nilai sertifikat --}}
      <div class="w-full h-[155px] bg-[#256D85] rounded-xl"></div>

      {{-- level user --}}
      <div class="w-full h-[155px] bg-[#256D85] rounded-xl"></div>

      {{-- sertifikat --}}
      <div class="w-full h-[155px] bg-[#256D85] rounded-xl"></div>
    </div>
@endsection