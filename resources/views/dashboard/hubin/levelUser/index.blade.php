@extends('layouts.main')

@section('title', 'Daftar Akun | SIMAK')

@section('container')
  <!-- button buka modal -->
  <label for="modal-tambah-user"
    class="mr-3 cursor-pointer rounded-lg border-none bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_10px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300">
    Tambah
  </label>

  <a href="/hubin"
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

  {{-- Search --}}
  <div class="@if (request('cari')) flex flex-row items-center justify-end gap-2 @endif form-control w-full">
    @if (request('cari'))
      <a href="{{ route('leveluser.index') }}" class="inline-block">
        <x-heroicon-o-x-mark class="inline-block w-8" />
      </a>
    @endif
    <form action="{{ route('leveluser.index') }}" class="flex justify-end gap-1" method="GET">
      <input type="text" name="cari" placeholder="Cari akun" value="{{ request('cari') }}"
        class="input-bordered input inline-block max-w-xs" />
      <button type="submit" class="btn-square btn">
        <x-heroicon-m-magnifying-glass class="w-8" />
      </button>
    </form>
  </div>

  {{-- tabel daftar akun --}}
  <div class="mt-5 flex h-12 w-full justify-center rounded-t-lg bg-[#0A3A58] text-center align-middle text-white">
    <span class="leading-[3rem]">Daftar Akun</span>
  </div>
  <div class="mb-5 min-w-full overflow-x-auto">
    <table class="table w-full border-collapse rounded-b-lg bg-white p-5 text-center">
      <tr>
        <th class="p-4">No</th>
        <th class="p-4">Nama</th>
        <th class="p-4">Email</th>
        <th class="p-4">Level User</th>
        <th class="p-4">Aksi</th>
      </tr>

      @forelse ($users as $user)
        <tr>
          <td class="sticky left-0 z-10 p-4">{{ $loop->iteration + $users->count() * ($users->currentPage() - 1) }}</td>
          <td class="p-4">
            @if ($user->level_user < 5)
              {{ $user->nama_guru }}
            @elseif ($user->level_user == 5)
              {{ $user->nama_pp }}
            @elseif ($user->level_user == 6)
              {{ $user->nama_siswa }}
            @endif
          </td>
          <td class="p-4">{{ $user->email }}</td>
          <td class="p-4">{{ $user->nama_level }}</td>
          <td class="p-2">
            <a href="{{ route('leveluser.edit', ['akun' => $user->id]) }}"
              class="mr-2 rounded-lg bg-slate-300 px-5 py-2 shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-slate-400 active:bg-slate-500">
              <button>Edit</button>
            </a>
            <form method="post" action="{{ route('leveluser.destroy', ['akun' => $user->id]) }}" class="inline-block">
              @csrf
              @method('delete')
              <button
                class="rounded-lg bg-red-500 px-5 py-2 text-white shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-red-600 active:bg-red-700"
                onclick="return confirm('Apakah yakin ingin menghapus \n{{ $user->email }}?')">Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="text-center text-lg">
            <label for="modal-tambah-user">
              <span class="cursor-pointer text-blue-500 underline">
                Data tidak ditemukan
              </span>
            </label>
          </td>
        </tr>
      @endforelse
    </table>
  </div>
  {{ $users->links() }}

  <!-- Modal tambah akun -->
  <input id="modal-tambah-user" type="checkbox" class="modal-toggle" />
  <label for="modal-tambah-user" class="modal cursor-pointer">
    <label class="modal-box relative" for="">
      <div class="mb-3 flex h-12 w-full justify-center text-center align-middle text-lg">
        <span class="leading-[3rem]">Tambah Akun</span>
      </div>
      <form action="{{ route('leveluser.store') }}" method="post" class="flex gap-2">
        {{-- input umum --}}
        <div class="w-[512px]">
          @csrf
          <label for="username">
            Username
            <br>
            <input type="text" name="username" placeholder="Isi username" class="input-bordered input w-full"
              value="{{ old('username') }}" />
          </label>
          <br><br>
          <label>
            Email
            <br>
            <input type="email" name="email" placeholder="Isi email" class="input-bordered input w-full"
              value="{{ old('email') }}" />
          </label>
          <br><br>
          <label>
            Password
            <br>
            <input type="text" name="password" placeholder="Isi password" class="input-bordered input w-full" />
          </label>
          <br><br>
          <label>
            Level User
            <br>
            <select id="level_user" name="level_user" class="select-bordered select w-full">
              <option value="" disabled selected>Pilih hak akses</option>
              @foreach ($level_users as $level_user)
                <option value="{{ $level_user->id_level }}">{{ $level_user->nama_level }}</option>
              @endforeach
            </select>
          </label>
          <button
            class="mt-3 rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_5px_rgba(0,0,1,0.2)] hover:bg-slate-200 active:bg-slate-300"
            type="submit">Tambah</button>
        </div>

        {{-- input khusus --}}
        <div id="inputKhusus"></div>

      </form>
    </label>
  </label>

  <script>
    const inputkhusus = document.getElementById("inputKhusus");
    const levelUser = document.getElementById("level_user");

    let nama;
    let identitas;

    levelUser.addEventListener("change", () => {
        if (levelUser.value < 5) {
            nama = "nama";
            identitas = ["NIP", "identitas"];
        } else if (levelUser.value == 5) {
            nama = "nama";
            identitas = ["NIK", "identitas"];
        } else if (levelUser.value == 6) {
            nama = "nama";
            identitas = ["NIS", "identitas"];
        }
        inputkhusus.innerHTML = `
          <div id="inputKhusus" class="w-[512px]">
          <label>
            Nama Lengkap
            <br>
            <input type="text" name="${nama}" placeholder="Isi nama" class="input-bordered input w-full" />
          </label>
          <br><br>
          <label>
            ${identitas[0]}
            <br>
            <input type="text" name="${identitas[1]}" placeholder="Isi ${identitas[0]}" class="input-bordered input w-full" />
          </label>
        </div>
        `;
    });
  </script>
@endsection
