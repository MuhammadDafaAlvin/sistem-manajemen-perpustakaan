@extends('layouts.app')

@section('content')
  <div class="max-w-5xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
    <div class="bg-[#1a1a1a] shadow-lg rounded-2xl overflow-hidden border border-gray-800">
      <div class="px-6 py-6 sm:px-8 sm:py-8 bg-[#2a2a2a] border-b border-gray-700">
        <div class="flex justify-between items-center">
          <div>
            <h3 class="text-2xl sm:text-3xl font-bold text-white tracking-tight">Detail buku: {{ $book->title }}</h3>
          </div>
          <a href="{{ route('books.public') }}"
            class="inline-flex items-center px-4 py-2 border border-gray-700 text-sm font-medium rounded-lg text-gray-300 bg-[#2a2a2a] hover:bg-[#3a3a3a] hover:text-white transition duration-150 ease-in-out">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
          </a>
        </div>
      </div>

      <div class="p-6 sm:p-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
          <div class="lg:col-span-1">
            <div class="relative">
              <img src="{{ $book->cover_image_url }}" alt="{{ $book->title }}"
                class="w-full h-80 object-cover rounded-xl shadow-md">
              <div class="absolute top-2 right-2">
                <span
                  class="inline-flex items-center px-2 py-1 text-xs font-medium text-white bg-indigo-600 rounded-full">
                  {{ $book->category->name }}
                </span>
              </div>
            </div>
            <div class="mt-6">
              <h4 class="text-lg font-semibold text-white">{{ $book->title }}</h4>
              <p class="mt-1 text-sm text-gray-400">
                oleh {{ $book->authors->pluck('name')->join(', ') }}
              </p>
              <div class="mt-4 flex items-center">
                <span
                  class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $book->stock > 0 ? 'bg-green-600 text-white' : 'bg-red-600 text-white' }}">
                  {{ $book->stock > 0 ? "Tersedia ($book->stock)" : 'Habis' }}
                </span>
              </div>
            </div>
          </div>

          <div class="lg:col-span-2">
            <div class="bg-[#2a2a2a] rounded-xl p-6 border border-gray-700">
              <h4 class="text-lg font-semibold text-white mb-4">Informasi Buku</h4>
              <dl class="space-y-4">
                <div class="flex items-start">
                  <dt class="w-1/3 text-sm font-medium text-gray-300">
                    <svg class="w-5 h-5 mr-2 inline-block text-indigo-400" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    ISBN
                  </dt>
                  <dd class="w-2/3 text-sm text-gray-400">{{ $book->isbn }}</dd>
                </div>
                <div class="flex items-start">
                  <dt class="w-1/3 text-sm font-medium text-gray-300">
                    <svg class="w-5 h-5 mr-2 inline-block text-indigo-400" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Tahun Terbit
                  </dt>
                  <dd class="w-2/3 text-sm text-gray-400">{{ $book->publication_year }}</dd>
                </div>
                <div class="flex items-start">
                  <dt class="w-1/3 text-sm font-medium text-gray-300">
                    <svg class="w-5 h-5 mr-2 inline-block text-indigo-400" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    Penerbit
                  </dt>
                  <dd class="w-2/3 text-sm text-gray-400">{{ $book->publisher->name }}</dd>
                </div>
                <div class="flex items-start">
                  <dt class="w-1/3 text-sm font-medium text-gray-300">
                    <svg class="w-5 h-5 mr-2 inline-block text-indigo-400" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Deskripsi
                  </dt>
                  <dd class="w-2/3 text-sm text-gray-400">
                    {{ $book->description ?? 'Tidak ada deskripsi tersedia.' }}
                  </dd>
                </div>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
