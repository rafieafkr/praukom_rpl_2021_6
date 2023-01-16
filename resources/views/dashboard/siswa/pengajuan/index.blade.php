@extends('layouts.main')

@section('title', 'Surat Pengajuan | SIMAK')

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

  {{-- tabel daftar akun --}}
  <div class="mt-5 flex h-12 w-full justify-center rounded-t-lg bg-[#0A3A58] text-center align-middle text-white">
    <span class="leading-[3rem]">Surat Pengajuan</span>
  </div>
  <div class="mb-5 min-w-full overflow-x-auto">
    <table class="table w-full border-collapse rounded-b-lg bg-white p-5 text-center">
      <tr>
        <th class="p-4">No</th>
        <th class="p-4">NIS</th>
        <th class="p-4">Perusahaan</th>
        <th class="p-4">Bukti Penerimaan</th>
        <th class="p-4">Status Pengajuan</th>
        <th class="p-4">Aksi</th>
      </tr>

      @forelse ($pengajuans as $pengajuan)
        <tr>
          <td class="sticky left-0 z-10 p-4">{{ $loop->iteration }}</td>
          <td class="p-4">{{ $pengajuan->nis }}</td>
          <td class="p-4">{{ $pengajuan->nama_perusahaan }}</td>
          <td class="p-4">
            @if ($pengajuan->bukti_terima !== null)
              <span class="rounded-full bg-green-500 px-3 py-1 text-white">
                <x-heroicon-m-check-badge class="inline-block w-5 text-white" />
                Terlampir
              </span>
            @else
              <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                Tidak ada
              </span>
            @endif
          </td>
          <td class="p-4">
            @switch($pengajuan->status_pengajuan)
              @case('1')
                <span class="rounded-full bg-yellow-300 px-3 py-1">
                  <x-heroicon-o-clock class="inline-block w-5 text-black" />
                  Menunggu konfirmasi Wali Kelas
                </span>
              @break

              @case('2')
                <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                  <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                  Ditolak Wali Kelas
                </span>
              @break

              @case('3')
                <span class="rounded-full bg-yellow-300 px-3 py-1">
                  <x-heroicon-o-clock class="inline-block w-5 text-black" />
                  Menunggu konfirmasi Kepala Program
                </span>
              @break

              @case('4')
                <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                  <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                  Ditolak Kepala Program
                </span>
              @break

              @case('5')
                <span class="rounded-full bg-yellow-300 px-3 py-1">
                  <x-heroicon-o-clock class="inline-block w-5 text-black" />
                  Menunggu konfirmasi Hubin
                </span>
              @break

              @case('6')
                <span class="rounded-full bg-red-500 px-3 py-1 text-white">
                  <x-heroicon-m-x-circle class="inline-block w-5 text-white" />
                  Ditolak Hubin
                </span>
              @break

              @default
                <span class="rounded-full bg-green-500 px-3 py-1 text-white">
                  <x-heroicon-m-check-badge class="inline-block w-5 text-white" />
                  Surat Pengajuan sudah sah
                </span>
            @endswitch
          </td>
          <td class="p-2">
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
          </td>
        </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center text-lg">
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

    <!-- Modal tambah akun -->
    <input id="modal-tambah-user" type="checkbox" class="modal-toggle" />
    <label for="modal-tambah-user" class="modal cursor-pointer">
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
              <input type="text" name="nis" placeholder="Isi NIS anda" class="input-bordered input w-full"
                value="{{ old('nis') }}" />
            </label>
            <br><br>
            {{-- perusahaan --}}
            <label>
              Perusahaan
              <br>
              <input type="text" name="perusahaan" placeholder="Isi nama perusahaan" class="input-bordered input w-full"
                value="{{ old('email') }}" />
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
              <input type="file" name="bukti_terima" class="file-input-bordered file-input w-full"
                value="{{ old('bukti_terima') }}" />
            </label>
            <br><br>
            <button
              class="rounded-lg bg-slate-100 px-4 py-1 text-[#4c77a9] shadow-[1px_2px_5px_rgba(0,0,1,0.2)] transition hover:bg-slate-200 active:bg-slate-300 lg:hidden"
              type="submit">Tambah</button>
          </div>

        </form>
      </label>
    </label>
  @endsection
