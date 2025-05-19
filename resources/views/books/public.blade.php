@extends('layouts.app')

@section('content')
  <div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Bagian Header -->
      <div class="text-center mb-8">
        <h2 class="text-3xl font-semibold text-gray-900">Koleksi Buku Kami</h2>
        <p class="mt-2 text-lg text-gray-600">Temukan berbagai buku menarik untuk menambah wawasan Anda.</p>
      </div>

      <!-- Grid Buku -->
      <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($books as $book)
          <div
            class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-lg transition duration-200 ease-in-out">
            <div class="p-6">
              <!-- Judul Buku -->
              <h4 class="text-xl font-semibold text-gray-900">{{ $book->title }}</h4>

              <!-- Detail Buku -->
              <div class="mt-3 text-sm text-gray-500">
                <p>ISBN: <span class="font-medium text-gray-700">{{ $book->isbn }}</span></p>
                <p>Kategori: <span class="font-medium text-gray-700">{{ $book->category->name }}</span></p>
                <p>Penerbit: <span class="font-medium text-gray-700">{{ $book->publisher->name }}</span></p>
                <p>Penulis: <span
                    class="font-medium text-gray-700">{{ $book->authors->pluck('name')->implode(', ') }}</span></p>
                <p>Stok: <span class="font-medium text-gray-700">{{ $book->stock }}</span></p>
              </div>

              <!-- Deskripsi Buku (Singkat) -->
              <p class="mt-4 text-gray-600">{{ Str::limit($book->description, 120) }}</p>

              <!-- Tombol Lihat Selengkapnya -->
              <a href="{{ route('books.show', $book->id) }}"
                class="mt-4 inline-block text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                Lihat Selengkapnya
              </a>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Pagination -->
      <div class="mt-8 text-center">
        {{ $books->links() }}
      </div>
    </div>
  </div>
@endsection
