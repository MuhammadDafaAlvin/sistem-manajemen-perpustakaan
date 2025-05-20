@extends('layouts.app')

@section('content')
  <div class="bg-white shadow overflow-hidden sm:rounded-3xl mt-4">
    <div class="px-8 py-10 flex justify-between items-center">
      <div class=" ml-[-0.5rem]">
        <h3 class="text-3xl font-bold text-black tracking-tight">Daftar Penulis</h3>
        <p class="mt-2 text-base text-gray-600">Semua penulis buku di perpustakaan</p>
      </div>
      <a href="{{ route('authors.create') }}"
        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Tambah
        Penulis</a>
    </div>

    <div class="border-t border-gray-200">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Biografi</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($authors as $author)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $author->id }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $author->name }}</td>
              <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($author->biography ?? '-', 50) }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="{{ route('authors.edit', $author) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                <form action="{{ route('authors.destroy', $author) }}" method="POST" class="inline">
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
    {{ $authors->links() }}
  </div>
@endsection
