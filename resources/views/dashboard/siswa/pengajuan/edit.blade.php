@extends('layouts.main')

@section('title', 'Edit Surat Pengajuan | SIMAK')

@section('container')
  <a href="{{ route('pengajuan.index') }}"
    class="hidden cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300 lg:inline-block">
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
    <p class="font-light uppercase" style="font-size: 32px">Edit Surat Pengajuan</p>
  </div>
  <form action="{{ route('pengajuan.update', ['pengajuan' => $pengajuan[0]->id_pengajuan]) }}" method="post"
    class="w-full flex-col gap-5 lg:grid lg:grid-cols-2" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    {{-- div 1 --}}
    <div class='w-full'>
      {{-- nis --}}
      <label>
        NIS
        <br>
        <input type="text" name="nis" placeholder="Isi NIS anda" class="input-bordered input w-full"
          value="{{ $pengajuan[0]->nis }}" />
      </label>
      <br><br>
      {{-- perusahaan --}}
      <label>
        Perusahaan
        <br>
        <input type="text" name="perusahaan" placeholder="Isi nama perusahaan" class="input-bordered input w-full"
          value="{{ $pengajuan[0]->nama_perusahaan }}" />
      </label>
      <br><br>
      {{-- alamat perusahaan --}}
      <label>
        Alamat Perusahaan
        <br>
        <input type="text" name="alamat_perusahaan" placeholder="Isi alamat perusahaan"
          class="input-bordered input w-full" value="{{ $pengajuan[0]->alamat_perusahaan }}" />
      </label>
      <br><br>
      {{-- telp perusahaan --}}
      <label>
        Telepon Perusahaan
        <br>
        <input type="tel" name="telepon_perusahaan" placeholder="Isi telepon perusahaan"
          class="input-bordered input w-full" value="{{ $pengajuan[0]->kontak_perusahaan }}" />
      </label>
      <br><br>
      <button
        class="hidden rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300 lg:inline-block"
        type="submit">Simpan</button>
    </div>

    {{-- div 2 --}}
    <div class='w-full'>
      {{-- kaprog --}}
      <label>
        Kepala Program
        <br>
        <select name="kaprog" class="select-bordered select w-full">
          <option value="" disabled>Pilih Kepala Program</option>
          @foreach ($kaprogs as $kaprog)
            @if ($kaprog->id_kaprog === $pengajuan[0]->id_kaprog)
              <option selected value="{{ $kaprog->id_kaprog }}">{{ $kaprog->nama_guru }}</option>
            @else
              <option value="{{ $kaprog->id_kaprog }}">{{ $kaprog->nama_guru }}</option>
            @endif
          @endforeach
        </select>
      </label>
      <br><br>
      {{-- walas --}}
      <label>
        Wali Kelas
        <br>
        <select name="walas" class="select-bordered select w-full">
          <option value="" disabled>Pilih Wali Kelas</option>
          @foreach ($walass as $walas)
            @if ($walas->id_walas === $pengajuan[0]->id_walas)
              <option selected value="{{ $walas->id_walas }}">{{ $walas->nama_guru }}</option>
            @else
              <option value="{{ $walas->id_walas }}">{{ $walas->nama_guru }}</option>
            @endif
          @endforeach
        </select>
      </label>
      <br><br>
      {{-- staff hubin --}}
      <label>
        Staff Hubin
        <br>
        <select name="staff_hubin" class="select-bordered select w-full">
          <option value="" disabled>Pilih Staff Hubin</option>
          @foreach ($staff_hubins as $staff_hubins)
            @if ($staff_hubins->id_staff === $pengajuan[0]->id_staff)
              <option selected value="{{ $staff_hubins->id_staff }}">{{ $staff_hubins->nama_guru }}</option>
            @else
              <option value="{{ $staff_hubins->id_staff }}">{{ $staff_hubins->nama_guru }}</option>
            @endif
          @endforeach
        </select>
      </label>
      <br><br>
      {{-- bukti terima --}}
      <label>
        <span class="mb-1 block">Bukti Terima</span>
        @if ($pengajuan[0]->bukti_terima)
          <span class="rounded-full bg-green-500 px-3 py-1 text-white">Bukti penerimaan sudah ada</span>
        @else
          <span class="rounded-full bg-red-500 px-3 py-1 text-white">Bukti penerimaan belum ada</span>
        @endif
        <br>
        <input type="file" name="bukti_terima" class="file-input-bordered file-input mt-2 w-full" />
      </label>
      <br><br>
      <a href="{{ route('pengajuan.index') }}"
        class="mr-2 cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300 lg:hidden">
        Kembali
      </a>
      <button
        class="rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300 lg:hidden"
        type="submit">Simpan</button>
    </div>
  </form>
@endsection
