@extends('layouts.app')

@section('content')
  <div class="bg-[#1a1a1a] min-h-screen">
    <!-- Header -->
    <header class="bg-[#1a1a1a] py-6 px-4 sm:px-6 lg:px-8 sticky top-0 z-10">
      <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div>
          <h1 class="text-2xl font-bold text-white">Perpustakaan Digital</h1>
        </div>
        <!-- Formulir Pencarian -->
        <form action="{{ route('books.public') }}" method="GET" class="w-full max-w-sm">
          <div class="flex items-center bg-[#2a2a2a] border border-gray-700 rounded-xl overflow-hidden">
            <input type="text" name="search" value="{{ request('search') }}"
              class="w-full px-4 py-2 bg-transparent text-white placeholder-gray-400 focus:outline-none sm:text-sm"
              placeholder="Cari buku...">
            <button type="submit" class="px-4 py-2 text-gray-400 hover:text-white transition duration-150 ease-in-out">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </button>
          </div>
        </form>
      </div>
    </header>

    <!-- Hero Section -->
    <section class="py-12 px-4 sm:px-6 lg:px-8">
      <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-4xl font-bold text-white tracking-tight sm:text-5xl">
          Selamat Datang di Perpustakaan Digital
        </h2>
        <p class="mt-4 text-lg text-gray-400 max-w-2xl mx-auto">
          Temukan berbagai buku menarik untuk memperluas wawasan Anda. Jelajahi koleksi kami dan mulailah petualangan
          membaca Anda hari ini.
        </p>
      </div>
    </section>

    <!-- Book Grid -->
    <section class="py-12 px-4 sm:px-6 lg:px-8">
      <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
          @forelse ($books as $book)
            <a href="{{ route('books.show', $book->id) }}"
              class="group bg-[#2a2a2a] border border-gray-700 rounded-2xl shadow-md hover:shadow-xl transform hover:-translate-y-1 transition duration-300 ease-in-out overflow-hidden">
              <!-- Cover Image -->
              <div class="h-48 w-full overflow-hidden">
                <img src="{{ $book->cover_image_url }}" alt="{{ $book->title }}"
                  class="h-full w-full object-cover object-center group-hover:scale-105 transition duration-300 ease-in-out">
              </div>
              <!-- Book Details -->
              <div class="p-4">
                <h4 class="text-lg font-semibold text-white truncate group-hover:text-indigo-400 transition">
                  {{ $book->title }}
                </h4>
                <p class="mt-1 text-sm text-gray-400 truncate">
                  oleh {{ $book->authors->pluck('name')->implode(', ') }}
                </p>
                <div class="mt-2 text-sm text-gray-400 space-y-1">
                  <p>Kategori: <span class="font-medium text-white">{{ $book->category->name }}</span></p>
                  <p>Penerbit: <span class="font-medium text-white">{{ $book->publisher->name }}</span></p>
                  <p>Stok: <span class="font-medium text-white">{{ $book->stock }}</span></p>
                </div>
              </div>
            </a>
          @empty
            <div class="col-span-full text-center text-gray-400">
              <p>Tidak ada buku ditemukan untuk pencarian ini.</p>
            </div>
          @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-10 text-center text-gray-400">
          {{ $books->appends(['search' => request('search')])->links() }}
        </div>
      </div>
    </section>
  </div>
@endsection
