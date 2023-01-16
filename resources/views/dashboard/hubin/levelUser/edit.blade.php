@extends('layouts.main')

@section('title', 'Edit Akun | SIMAK')

@section('container')
  <?php
  // cek leveluser untuk menampilkan form yang sesuai
  if ($user[0]->level_user < 5) {
      $nama = $user[0]->nama_guru;
      $identitas = $user[0]->nip_guru;
      $label = 'NIP';
  } elseif ($user[0]->level_user == 5) {
      $nama = $user[0]->nama_pp;
      $identitas = $user[0]->nik_pp;
      $label = 'NIK';
  } elseif ($user[0]->level_user == 6) {
      $nama = $user[0]->nama_siswa;
      $identitas = $user[0]->nis;
      $label = 'NIS';
  }
  ?>

  <a href="/hubin/leveluser"
    class="cursor-pointer rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300">
    Kembali
  </a>

  {{-- session flash message --}}
  <div class="mt-5 w-fit">
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
    <p class="font-light uppercase" style="font-size: 32px">Edit Akun</p>
  </div>
  <form action="{{ route('leveluser.update', ['akun' => $user[0]->id_akun]) }}" method="post" class="flex w-full gap-5">
    @csrf
    @method('PUT')
    {{-- input umum --}}
    <div class='w-full'>
      <label for="username">
        Username
        <br>
        <input type="text" name="username" placeholder="Edit username akun" class="input-bordered input w-full"
          value="{{ $user[0]->username }}" />
      </label>
      <br><br>
      <label>
        Email
        <br>
        <input type="email" name="email" placeholder="Edit email akun" class="input-bordered input w-full"
          value="{{ $user[0]->email }}" />
      </label>
      <br><br>
      <label>
        Password
        <br>
        <input type="text" name="password" placeholder="Edit password akun" class="input-bordered input w-full"
          value="{{ $user[0]->password }}" />
      </label>
      <br><br>
      <label>
        Level User
        <br>
        <select id="level_user" name="level_user" class="select-bordered select w-full">
          <option value="" disabled selected>Pilih hak akses</option>
          @foreach ($level_users as $level_user)
            @if ($user[0]->level_user == $level_user->id_level)
              <option selected value="{{ $level_user->id_level }}">{{ $level_user->nama_level }}</option>
            @else
              <option value="{{ $level_user->id_level }}">{{ $level_user->nama_level }}</option>
            @endif
          @endforeach
        </select>
      </label>
      <button
        class="mt-3 rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_5px_rgba(0,0,1,0.2)] hover:bg-slate-200 active:bg-slate-300"
        type="submit">Simpan</button>
    </div>

    {{-- input khusus --}}
    <div class='w-full'>
      <label>
        Nama Lengkap
        <br>
        <input type="text" name="nama" placeholder="Edit nama akun" class="input-bordered input w-full"
          value="{{ $nama }}" />
      </label>
      <br><br>
      <label>
        {{ $label }}
        <br>
        <input type="text" name="identitas" placeholder="Edit identitas akun" class="input-bordered input w-full"
          value="{{ $identitas }}" />
      </label>
    </div>
  </form>
@endsection
