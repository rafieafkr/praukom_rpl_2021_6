@extends('layouts.mainlogin')

@section('title', 'Login - SIMAK')

@section('container')

<div class="md:flex-warp bg-transparent w-full h-screen m-auto items-center relative">
    <div class="tracking-widest pt-12 pb-24">
        <p class="text-center text-6xl m-auto font-medium text-[#ffffff]">S I M A K</p>
        <p class="text-center text-2xl m-auto font-light text-[#ffffff]">SISTEM INFORMASI PRAKERIN</p>
    </div>
    <div class="w-[23em] h-[20em] m-auto items-center">
        <div class="w-[20em] h-[20em] m-auto items-center bg-white rounded-xl">
            <div class="bg-[url('../img/simak3.png')] w-[20em] h-[20em] bg-cover m-auto mr-3 items-center"></div>
        </div>
    </div>
    <div class="text-xs mb-auto items-end absolute bottom-0 right-0 left-0 text-right w-full -ml-3 opacity-20">
        <p>Image by rawpixel.com on Freepik</p>
    </div>
</div>
<div class="md:flex-warp bg-[#404040] w-full h-screen">
    <div class="tracking-widest pt-12 pb-16">
        <p class="text-center text-6xl m-auto font-medium text-[#ffffff]">L O G I N</p>
    </div>
    <div class="w-full md:w-[35em] h-[30em] m-auto items-center text-[#ffffff]">
        <form action="/login" method="POST">
            @csrf
            @if(session('loginError'))
            <div class="m-auto w-3/4 bg-red-600 text-xl font-thin p-4 -mt-5 mb-5 text-center">
                {{ session('loginError') }}
            </div>
            @endif
            <div class="w-full text-center m-auto text-3xl mb-9">
                <p class="mb-2 font-light"><label for="email">E-Mail</label></p>
                <input autofocus type="text" id="email" name="email"
                    class="@error('email') is-invalid @enderror w-3/4 md:w-[20em] h-[2.5em] text-xl text-center bg-[#1F1F1F] border-b-4 border-[#000000]"
                    placeholder="Masukan E-Mail........" value="{{ old('email') }}" required>
                @error('email')
                <div class="invalid-feedback text-sm text-red-600">
                    {{ $message }} !
                </div>
                @enderror
            </div>
            <div class="w-full text-center m-auto text-3xl mb-32">
                <p class="mb-2 font-light"><label for="password">Password</label></p>
                <input type="password" id="password" name="password"
                    class="w-3/4 md:w-[20em] h-[2.5em] text-xl text-center bg-[#1F1F1F] border-b-4 border-[#000000]"
                    placeholder="Masukan Password........" required>
            </div>
            <div class=" w-full text-center m-auto text-3xl">
                <button
                    class="btn bg-[#ffffff] text-[#000000] font-light border-none text-xl w-[7em] h-[3em]">Masuk</button>
            </div>
        </form>
    </div>
</div>
@endsection