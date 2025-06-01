@extends('layouts.app')

@section('content')
  <div class="py-12 bg-[#1a1a1a] min-h-screen rounded-3xl mt-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-white">Jelajahi Koleksi Buku Terbaik Kami</h2>
        <p class="mt-2 text-lg text-gray-400">Dari fiksi hingga pengetahuan, temukan bacaan yang menginspirasi dan
          memperluas cakrawala Anda.</p>
      </div>

      <div class="mb-8">
        <form action="{{ route('books.public') }}" method="GET" class="max-w-xl mx-auto">
          <div class="flex items-center bg-[#2a2a2a] border border-gray-700 rounded-xl overflow-hidden">
            <input type="text" name="search" value="{{ request('search') }}"
              class="w-full px-4 py-3 bg-transparent text-white placeholder-gray-400 focus:outline-none sm:text-sm"
              placeholder="Cari buku berdasarkan judul, ISBN, kategori, penerbit, atau penulis">
            <button type="submit" class="px-4 py-3 text-gray-400 hover:text-white transition duration-150 ease-in-out">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </button>
          </div>
        </form>
      </div>

      <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($books as $book)
          <div
            class="bg-[#2a2a2a] border border-gray-700 rounded-2xl shadow-md hover:shadow-xl transition duration-200 ease-in-out">
            <div class="p-6">
              <h4 class="text-xl font-semibold text-white">{{ $book->title }}</h4>
              <div class="mt-3 text-sm text-gray-400 space-y-1">
                <p>ISBN: <span class="font-medium text-white">{{ $book->isbn }}</span></p>
                <p>Kategori: <span class="font-medium text-white">{{ $book->category->name }}</span></p>
                <p>Penerbit: <span class="font-medium text-white">{{ $book->publisher->name }}</span></p>
                <p>Penulis: <span class="font-medium text-white">{{ $book->authors->pluck('name')->implode(', ') }}</span>
                </p>
                <p>Stok: <span class="font-medium text-white">{{ $book->stock }}</span></p>
              </div>
              <p class="mt-4 text-gray-300">{{ Str::limit($book->description, 120) }}</p>
              <a href="{{ route('books.show', $book->id) }}"
                class="mt-4 inline-block text-indigo-400 hover:text-indigo-300 text-sm font-medium">
                Lihat Selengkapnya
              </a>
            </div>
          </div>
        @empty
          <div class="col-span-full text-center text-gray-400">
            <p>Tidak ada buku ditemukan untuk pencarian ini.</p>
          </div>
        @endforelse
      </div>
      <div class="mt-10 text-center text-gray-400">
        {{ $books->appends(['search' => request('search')])->links() }}
      </div>
    </div>
  </div>
@endsection
