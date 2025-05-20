@extends('layouts.app')

@section('content')
  <div class="py-12 bg-[#111112] rounded-3xl">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-white leading-tight mb-6">
        Selamat Datang, {{ auth()->user()->name }}
      </h2>

      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-8">

        <!-- Total Buku -->
        <div class="bg-[#1a1a1a] shadow rounded-lg p-6 border-l-4 border-indigo-500">
          <h3 class="text-lg font-semibold text-white">Total Buku</h3>
          <p class="mt-2 text-3xl font-bold text-indigo-400">{{ $total_books }}</p>
          <p class="mt-1 text-sm text-gray-400">Buku di perpustakaan</p>
        </div>

        <!-- Buku Tersedia -->
        <div class="bg-[#1a1a1a] shadow rounded-lg p-6 border-l-4 border-emerald-500">
          <h3 class="text-lg font-semibold text-white">Buku Tersedia</h3>
          <p class="mt-2 text-3xl font-bold text-emerald-400">{{ $available_books }}</p>
          <p class="mt-1 text-sm text-gray-400">Buku dengan stok</p>
        </div>

        <!-- Total Kategori -->
        <div class="bg-[#1a1a1a] shadow rounded-lg p-6 border-l-4 border-sky-500">
          <h3 class="text-lg font-semibold text-white">Total Kategori</h3>
          <p class="mt-2 text-3xl font-bold text-sky-400">{{ $total_categories }}</p>
          <p class="mt-1 text-sm text-gray-400">Kategori buku</p>
        </div>

        <!-- Total Penerbit -->
        <div class="bg-[#1a1a1a] shadow rounded-lg p-6 border-l-4 border-cyan-500">
          <h3 class="text-lg font-semibold text-white">Total Penerbit</h3>
          <p class="mt-2 text-3xl font-bold text-cyan-400">{{ $total_publishers }}</p>
          <p class="mt-1 text-sm text-gray-400">Penerbit buku</p>
        </div>

        <!-- Total Penulis -->
        <div class="bg-[#1a1a1a] shadow rounded-lg p-6 border-l-4 border-purple-500">
          <h3 class="text-lg font-semibold text-white">Total Penulis</h3>
          <p class="mt-2 text-3xl font-bold text-purple-400">{{ $total_authors }}</p>
          <p class="mt-1 text-sm text-gray-400">Penulis buku</p>
        </div>

        <!-- Peminjaman Aktif -->
        <div class="bg-[#1a1a1a] shadow rounded-lg p-6 border-l-4 border-rose-500">
          <h3 class="text-lg font-semibold text-white">Peminjaman Aktif</h3>
          <p class="mt-2 text-3xl font-bold text-rose-400">{{ $active_loans }}</p>
          <p class="mt-1 text-sm text-gray-400">Buku yang sedang dipinjam</p>
        </div>

      </div>
    </div>
  </div>
@endsection
