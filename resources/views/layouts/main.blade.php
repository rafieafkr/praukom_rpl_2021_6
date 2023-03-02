<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')
  {{-- Font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <title>@yield('title')</title>
</head>

<body class="bg-[#CCE0DD]">
  @include('partials.navbar')

  <div class="min-h-screen bg-[#CCE0DD] px-6 pt-4">
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
    @yield('container')
  </div>

  @include('partials.footer')
</body>
@vite('resources/js/app.js')

</html>
