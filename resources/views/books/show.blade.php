@extends('layouts.app')

@section('content')
  <div class="max-w-7xl mx-auto bg-[#1a1a1a] shadow-lg rounded-2xl overflow-hidden mt-10">
    <div class="px-6 py-6 sm:px-8 sm:py-8 bg-navy-50 border-b border-gray-100">
      <h3 class="text-2xl font-semibold text-navy-900 tracking-tight">Detail Buku: {{ $book->title }}</h3>
      <p class="mt-1 text-sm text-gray-400">Informasi lengkap</p>
    </div>
    <div class="px-6 py-10 sm:px-8 sm:py-10">
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

        <div class="sm:col-span-2">
          <h4 class="text-sm font-medium text-gray-300">Judul</h4>
          <p class="mt-1 text-gray-400 sm:text-sm">{{ $book->title }}</p>
        </div>

        <div>
          <h4 class="text-sm font-medium text-gray-300">ISBN</h4>
          <p class="mt-1 text-gray-400 sm:text-sm">{{ $book->isbn }}</p>
        </div>

        <div>
          <h4 class="text-sm font-medium text-gray-300">Tahun Terbit</h4>
          <p class="mt-1 text-gray-400 sm:text-sm">{{ $book->publication_year }}</p>
        </div>

        <div>
          <h4 class="text-sm font-medium text-gray-300">Kategori</h4>
          <p class="mt-1 text-gray-400 sm:text-sm">{{ $book->category->name }}</p>
        </div>

        <div>
          <h4 class="text-sm font-medium text-gray-300">Penerbit</h4>
          <p class="mt-1 text-gray-400 sm:text-sm">{{ $book->publisher->name }}</p>
        </div>

        <div class="sm:col-span-2">
          <h4 class="text-sm font-medium text-gray-300">Penulis</h4>
          <p class="mt-1 text-gray-400 sm:text-sm">
            {{ $book->authors->pluck('name')->join(', ') }}
          </p>
        </div>

        <div>
          <h4 class="text-sm font-medium text-gray-300">Stok</h4>
          <p class="mt-1 text-gray-400 sm:text-sm">{{ $book->stock }}</p>
        </div>

        <div class="sm:col-span-2">
          <h4 class="text-sm font-medium text-gray-300">Deskripsi</h4>
          <p class="mt-1 text-gray-400 sm:text-sm">
            {{ $book->description ?? 'Tidak ada deskripsi tersedia.' }}
          </p>
        </div>
      </div>

      <div class="mt-8 flex justify-end">
        <a href="{{ route('books.public') }}"
          class="inline-flex items-center px-5 py-2.5 border border-gray-200 text-sm font-semibold rounded-lg text-gray-600 bg-white hover:bg-gray-50 transition duration-150 ease-in-out">
          Kembali
        </a>
      </div>
    </div>
  </div>
@endsection
