@extends('layouts.main')

@section('title', 'Level User | SIMAK')

@section('container')
  <!-- button buka modal -->
  <label for="modal-tambah-user"
    class="cursor-pointer rounded-lg border-none bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[0px_5px_10px_rgba(0,0,1,0.2)] hover:bg-slate-200 active:bg-slate-300">
    Tambah
  </label>

  <div class="mt-5 flex h-12 w-full justify-center rounded-t-lg bg-[#0A3A58] text-center align-middle text-white">
    <table>
      <tr>
        <td>List User</td>
      </tr>
    </table>
  </div>
  <div class="overflow-x-auto">
    <table border="1" cellpadding="0" class="w-full border-collapse rounded-none bg-white p-5 text-center">
      <tr>
        <th class="p-4">No</th>
        <th class="p-4">Nama</th>
        <th class="p-4">Email</th>
        <th class="p-4">Level User</th>
        <th class="p-4">Aksi</th>
      </tr>

      <tr>
        <td class="p-4">1</td>
        <td class="p-4">Joe Epic Abadi </td>
        <td class="p-4">joetaslimkw@gmail.com</td>
        <td class="p-4">1</td>
        <td class="p-4">
          <a href="#"
            class="mr-2 rounded-lg bg-slate-300 px-5 py-2 shadow-[0px_5px_5px_rgba(0,0,1,0.2)] hover:bg-slate-400 active:bg-slate-500">
            <button>Edit</button>
          </a>
          <a href="#"
            class="rounded-lg bg-red-500 px-5 py-2 text-white shadow-[0px_5px_5px_rgba(0,0,1,0.2)] hover:bg-red-600 active:bg-red-700">
            <button>Hapus</button>
          </a>
        </td>
      </tr>
    </table>
  </div>

  <!-- Modal body -->
  <input id="modal-tambah-user" type="checkbox" class="modal-toggle" />
  <label for="modal-tambah-user" class="modal cursor-pointer">
    <label class="modal-box relative" for="">
      <form action="#">
        <label for="nama">
          Nama
          <br>
          <input type="text" placeholder="Isi nama" class="input-bordered input w-full" />
        </label>
        <br><br>
        <label for="nama">
          Email
          <br>
          <input type="email" placeholder="Isi email" class="input-bordered input w-full" />
        </label>
        <br><br>
        <label for="nama">
          Password
          <br>
          <input type="text" placeholder="Isi password" class="input-bordered input w-full" />
        </label>
        <br><br>
        <label for="nama">
          Level User
          <br>
          <select id="level_user" name="level_user" class="select-bordered select w-full">
            <option value="#" disabled selected>Pilih hak akses</option>
            <option value="#">hubin</option>
            <option value="#">hubin</option>
            <option value="#">hubin</option>
            <option value="#">hubin</option>
            <option value="#">hubin</option>
            <option value="#">hubin</option>
          </select>
        </label>
        <button
          class="mt-3 rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[0px_5px_5px_rgba(0,0,1,0.2)] hover:bg-slate-200 active:bg-slate-300"
          type="submit">Simpan</button>
      </form>
    </label>
  </label>
@endsection
