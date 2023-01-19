<nav class="flex w-full justify-between bg-white pl-6">
  <div class="py-4">
    <a href="/dashboard" class="font-semibold tracking-widest">SIMAK</a>
  </div>
  <div class="dropdown-end dropdown flex items-center gap-2">
    @switch(Auth::user()->level_user)
      @case(1)
        <span class="rounded-full bg-[#06283D] px-3 py-1 text-sm font-light text-white">Staff Hubin</span>
      @break

      @case(2)
        <span class="rounded-full bg-[#06283D] px-3 py-1 text-sm font-light text-white">Kepala Program</span>
      @break

      @case(3)
        <span class="rounded-full bg-[#06283D] px-3 py-1 text-sm font-light text-white">Wali Kelas</span>
      @break

      @case(4)
        <span class="rounded-full bg-[#06283D] px-3 py-1 text-sm font-light text-white">Pembimbing Sekolah</span>
      @break

      @case(5)
        <span class="rounded-full bg-[#06283D] px-3 py-1 text-sm font-light text-white">Pembimbing Perusahaan</span>
      @break

      @case(6)
        <span class="rounded-full bg-[#06283D] px-3 py-1 text-sm font-light text-white">Siswa</span>
      @break

      @default
    @endswitch
    <label tabindex="0" class="btn-ghost btn-circle avatar btn mt-[0.3em] mr-[1em]">
      <div class="w-10 rounded-full">
        <img src="https://placeimg.com/80/80/people" />
      </div>
    </label>
    <ul tabindex="0"
      class="dropdown-content menu-compact top-12 mt-3 w-40 cursor-pointer rounded-2xl bg-base-100 p-1 text-center shadow">
      <li class="rounded-xl p-1 transition hover:bg-red-500 hover:text-white active:bg-slate-300 active:text-black">
        <a href="/logout" class="justify-center py-4 px-4">Logout</a>
      </li>
    </ul>
  </div>
</nav>
