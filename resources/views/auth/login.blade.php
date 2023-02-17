@extends('layouts.mainlogin')

@section('title', 'Login - SIMAK')

@section('container')

  <div class="md:flex-warp relative m-auto h-screen w-full items-center bg-transparent">
    <div class="pt-12 pb-24 tracking-widest">
      <p class="m-auto text-center text-6xl font-medium text-[#ffffff]">S I M A K</p>
      <p class="m-auto text-center text-2xl font-light text-[#ffffff]">SISTEM INFORMASI PRAKERIN</p>
    </div>
    <div class="m-auto h-[20em] w-[23em] items-center">
      <div class="m-auto h-[20em] w-[20em] items-center rounded-xl bg-white">
        <div class="m-auto mr-3 h-[20em] w-[20em] items-center bg-[url('../img/simak.png')] bg-cover"></div>
      </div>
    </div>
    <div class="absolute bottom-0 right-0 left-0 mb-auto -ml-3 w-full items-end text-right text-xs opacity-20">
      <p>Image by rawpixel.com on Freepik</p>
    </div>
  </div>
  <div class="md:flex-warp h-screen w-full bg-[#404040]">
    <div class="pt-12 pb-16 tracking-widest">
      <p class="m-auto text-center text-6xl font-medium text-[#ffffff]">L O G I N</p>
    </div>
    <div class="m-auto h-[30em] w-full items-center text-[#ffffff] md:w-[35em]">
      <form action="/login" method="POST">
        @csrf
        @if (session('loginError'))
          <div class="m-auto -mt-5 mb-5 w-3/4 bg-red-600 p-4 text-center text-xl font-thin">
            {{ session('loginError') }}
          </div>
        @endif
        <div class="m-auto mb-9 w-full text-center text-3xl">
          <p class="mb-2 font-light"><label for="email">E-Mail</label></p>
          <input id="email" autofocus type="text" name="email"
            class="h-[2.5em] w-3/4 border-b-4 border-[#000000] bg-[#1F1F1F] text-center text-xl md:w-[20em]"
            placeholder="Masukan E-Mail........" value="{{ old('email') }}" required>
          @error('email')
            <div class="text-sm text-red-600">
              {{ $message }} !
            </div>
          @enderror
        </div>
        <div class="m-auto mb-32 w-full text-center text-3xl">
          <p class="mb-2 font-light"><label for="password">Password</label></p>
          <input id="password" type="password" name="password"
            class="h-[2.5em] w-3/4 border-b-4 border-[#000000] bg-[#1F1F1F] text-center text-xl md:w-[20em]"
            placeholder="Masukan Password........" required>
        </div>
        <div class="m-auto w-full text-center text-3xl">
          <button class="btn h-[3em] w-[7em] border-none bg-[#ffffff] text-xl font-light text-[#000000]">Masuk</button>
        </div>
      </form>
    </div>
  </div>
@endsection
