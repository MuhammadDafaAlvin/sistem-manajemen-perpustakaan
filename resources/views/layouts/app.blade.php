<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Manajemen Perpustakaan') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-gray-200">
  <div class="min-h-screen">
    @php
      $currentRoute = Route::currentRouteName();
    @endphp

    <nav class="bg-[#111112] shadow">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex">
            <div class="flex-shrink-0 flex items-center">
              <a href="{{ route('dashboard') }}" class="text-lg font-semibold text-white">Dashboard</a>
            </div>
            @auth
              <div class="hidden sm:ml-12 sm:flex sm:space-x-8">
                <a href="{{ route('books.index') }}"
                  class="border-b-2 {{ $currentRoute === 'books.index' ? 'border-green-500 text-green-500' : 'border-transparent text-gray-400 hover:border-green-500 hover:text-green-500' }} inline-flex items-center px-1 pt-1 text-base font-medium">
                  Buku
                </a>
                <a href="{{ route('categories.index') }}"
                  class="border-b-2 {{ $currentRoute === 'categories.index' ? 'border-green-500 text-green-500' : 'border-transparent text-gray-400 hover:border-green-500 hover:text-green-500' }} inline-flex items-center px-1 pt-1 text-base font-medium">
                  Kategori
                </a>
                <a href="{{ route('publishers.index') }}"
                  class="border-b-2 {{ $currentRoute === 'publishers.index' ? 'border-green-500 text-green-500' : 'border-transparent text-gray-400 hover:border-green-500 hover:text-green-500' }} inline-flex items-center px-1 pt-1 text-base font-medium">
                  Penerbit
                </a>
                <a href="{{ route('authors.index') }}"
                  class="border-b-2 {{ $currentRoute === 'authors.index' ? 'border-green-500 text-green-500' : 'border-transparent text-gray-400 hover:border-green-500 hover:text-green-500' }} inline-flex items-center px-1 pt-1 text-base font-medium">
                  Penulis
                </a>
                <a href="{{ route('loans.index') }}"
                  class="border-b-2 {{ $currentRoute === 'loans.index' ? 'border-green-500 text-green-500' : 'border-transparent text-gray-400 hover:border-green-500 hover:text-green-500' }} inline-flex items-center px-1 pt-1 text-base font-medium">
                  Peminjaman
                </a>
              </div>
            @endauth
          </div>
          <div class="hidden sm:ml-6 sm:flex sm:items-center">
            <a href="{{ url('/') }}"
              class="text-gray-400 hover:text-green-400 text-base font-medium mr-4 flex items-center gap-1">
              Beranda
            </a>
            <p class="text-gray-400 mr-4">|</p>
            @auth
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-400 hover:text-red-400 text-base font-medium">
                  <div class="flex items-center gap-1">
                    <p>Keluar</p>
                  </div>
                </button>
              </form>
            @else
              <a href="{{ route('login') }}" class="text-gray-400 hover:text-white text-base font-medium">Login</a>
              <a href="{{ route('register') }}"
                class="ml-4 text-gray-400 hover:text-white text-base font-medium">Register</a>
            @endauth
          </div>

        </div>
      </div>
    </nav>


    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
      @yield('content')
    </main>
  </div>
</body>

</html>
