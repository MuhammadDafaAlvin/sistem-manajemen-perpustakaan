@extends('layouts.app')

@section('content')
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <!-- Title -->
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">
        {{ __('Dashboard') }}
      </h2>

      <!-- Statistik Grid -->
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-8">

        <!-- Total Buku -->
        <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-indigo-500">
          <h3 class="text-lg font-medium text-gray-900">Total Buku</h3>
          <p class="mt-2 text-3xl font-bold text-indigo-600">{{ $total_books }}</p>
          <p class="mt-1 text-sm text-gray-500">Buku di perpustakaan</p>
        </div>

        <!-- Buku Tersedia -->
        <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-green-500">
          <h3 class="text-lg font-medium text-gray-900">Buku Tersedia</h3>
          <p class="mt-2 text-3xl font-bold text-green-600">{{ $available_books }}</p>
          <p class="mt-1 text-sm text-gray-500">Buku dengan stok</p>
        </div>

        <!-- Total Kategori -->
        <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-blue-500">
          <h3 class="text-lg font-medium text-gray-900">Total Kategori</h3>
          <p class="mt-2 text-3xl font-bold text-blue-600">{{ $total_categories }}</p>
          <p class="mt-1 text-sm text-gray-500">Kategori buku</p>
        </div>

        <!-- Total Penerbit -->
        <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-teal-500">
          <h3 class="text-lg font-medium text-gray-900">Total Penerbit</h3>
          <p class="mt-2 text-3xl font-bold text-teal-600">{{ $total_publishers }}</p>
          <p class="mt-1 text-sm text-gray-500">Penerbit buku</p>
        </div>

        <!-- Total Penulis -->
        <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-purple-500">
          <h3 class="text-lg font-medium text-gray-900">Total Penulis</h3>
          <p class="mt-2 text-3xl font-bold text-purple-600">{{ $total_authors }}</p>
          <p class="mt-1 text-sm text-gray-500">Penulis buku</p>
        </div>

        <!-- Peminjaman Aktif -->
        <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-red-500">
          <h3 class="text-lg font-medium text-gray-900">Peminjaman Aktif</h3>
          <p class="mt-2 text-3xl font-bold text-red-600">{{ $active_loans }}</p>
          <p class="mt-1 text-sm text-gray-500">Buku yang sedang dipinjam</p>
        </div>
      </div>
    </div>
  </div>
@endsection
