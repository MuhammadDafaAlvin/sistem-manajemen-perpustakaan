@extends('layouts.app')

@section('content')
  <div class="bg-[#1a1a1a] shadow overflow-hidden sm:rounded-3xl mt-4">
    <div class="px-8 py-10 flex justify-between items-center">
      <div class="ml-[-0.5rem]">
        <h3 class="text-3xl font-bold text-white tracking-tight">Daftar Penulis</h3>
        <p class="mt-2 text-base text-gray-400">Semua penulis buku di perpustakaan</p>
      </div>
      <a href="{{ route('authors.create') }}"
        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-xl shadow-sm text-white bg-green-600 hover:bg-green-700">Tambah
        Penulis</a>
    </div>

    <div class="px-8 pb-6">
      <form action="{{ route('authors.index') }}" method="GET" class="max-w-md">
        <div class="flex items-center bg-[#2a2a2a] border border-gray-700 rounded-xl overflow-hidden">
          <input type="text" name="search" value="{{ request('search') }}"
            class="w-full px-4 py-2 bg-transparent text-white placeholder-gray-400 focus:outline-none sm:text-sm"
            placeholder="Cari berdasarkan nama penulis">
          <button type="submit" class="px-4 py-2 text-gray-400 hover:text-white transition duration-150 ease-in-out">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </button>
        </div>
      </form>
    </div>

    <div class="border-t border-gray-700">
      <table class="min-w-full divide-y divide-gray-700">
        <thead class="bg-[#2a2a2a] tracking-tight">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">ID</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Nama</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Biografi</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-[#1a1a1a] divide-y divide-gray-700">
          @foreach ($authors as $author)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $author->id }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{ $author->name }}</td>
              <td class="px-6 py-4 text-sm text-gray-400">{{ Str::limit($author->biography ?? '-', 50) }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="{{ route('authors.edit', $author) }}" class="text-yellow-500 hover:text-yellow-400">Edit</a>
                <form action="{{ route('authors.destroy', $author) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-500 hover:text-red-400 ml-4"
                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="px-4 py-3 mt-4 text-gray-400">
    {{ $authors->links() }}
  </div>
@endsection
