@extends('layouts.app')

@section('content')
  <div class="bg-[#1a1a1a] shadow overflow-hidden sm:rounded-3xl mt-4">
    <div class="px-8 py-10 flex justify-between items-center">
      <div class="ml-[-0.5rem]">
        <h3 class="text-3xl font-bold text-white tracking-tight">Daftar Buku</h3>
        <p class="mt-2 text-base text-gray-400">Semua buku di perpustakaan</p>
      </div>
      <a href="{{ route('books.create') }}"
        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-xl shadow-sm text-white bg-green-600 hover:bg-green-700">
        Tambah Buku
      </a>
    </div>

    <div class="border-t border-gray-700">
      <table class="min-w-full divide-y divide-gray-700">
        <thead class="bg-[#2a2a2a] tracking-tight">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Judul</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">ISBN</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Kategori</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Penerbit</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Stok</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-[#1a1a1a] divide-y divide-gray-700">
          @foreach ($books as $book)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{ $book->title }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $book->isbn }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $book->category->name }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $book->publisher->name }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $book->stock }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex">
                <a href="{{ route('books.edit', $book) }}" class="text-yellow-500 hover:text-yellow-400">Edit</a>
                <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-500 hover:text-red-700 ml-4"
                    onclick="return confirm('Are you sure?')">Button</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="px-4 py-3 mt-4 text-gray-400">
    {{ $books->links() }}
  </div>
@endsection
