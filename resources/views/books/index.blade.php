@extends('layouts.app')

@section('content')
  <div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6 flex justify-between">
      <h3 class="text-lg leading-6 font-medium text-gray-900">Buku</h3>
      <a href="{{ route('books.create') }}"
        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Tambah
        Buku</a>
    </div>
    <div class="border-t border-gray-200">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ISBN</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penerbit</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($books as $book)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $book->title }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $book->isbn }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $book->category->name }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $book->publisher->name }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $book->stock }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="{{ route('books.edit', $book) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-600 hover:text-red-900 ml-4"
                    onclick="return confirm('Are you sure?')">Hapus</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="px-4 py-3 mt-4">
    {{ $books->links() }}
  </div>
@endsection
