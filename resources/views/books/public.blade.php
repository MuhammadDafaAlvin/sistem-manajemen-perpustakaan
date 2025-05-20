@extends('layouts.app')

@section('content')
  <div class="py-12 bg-[#1a1a1a] min-h-screen rounded-3xl mt-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-white">Koleksi Buku Kami</h2>
        <p class="mt-2 text-lg text-gray-400">Temukan berbagai buku menarik untuk menambah wawasan Anda.</p>
      </div>

      <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($books as $book)
          <div
            class="bg-[#2a2a2a] border border-gray-700 rounded-2xl shadow-md hover:shadow-xl transition duration-200 ease-in-out">
            <div class="p-6">
              <!-- Judul Buku -->
              <h4 class="text-xl font-semibold text-white">{{ $book->title }}</h4>

              <!-- Detail Buku -->
              <div class="mt-3 text-sm text-gray-400 space-y-1">
                <p>ISBN: <span class="font-medium text-white">{{ $book->isbn }}</span></p>
                <p>Kategori: <span class="font-medium text-white">{{ $book->category->name }}</span></p>
                <p>Penerbit: <span class="font-medium text-white">{{ $book->publisher->name }}</span></p>
                <p>Penulis: <span class="font-medium text-white">{{ $book->authors->pluck('name')->implode(', ') }}</span>
                </p>
                <p>Stok: <span class="font-medium text-white">{{ $book->stock }}</span></p>
              </div>

              <!-- Deskripsi Buku (Singkat) -->
              <p class="mt-4 text-gray-300">{{ Str::limit($book->description, 120) }}</p>

              <!-- Tombol Lihat Selengkapnya -->
              <a href="{{ route('books.show', $book->id) }}"
                class="mt-4 inline-block text-indigo-400 hover:text-indigo-300 text-sm font-medium">
                Lihat Selengkapnya
              </a>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Pagination -->
      <div class="mt-10 text-center text-gray-400">
        {{ $books->links() }}
      </div>
    </div>
  </div>
@endsection
