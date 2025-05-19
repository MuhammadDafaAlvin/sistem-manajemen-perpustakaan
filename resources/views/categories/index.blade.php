@extends('layouts.app')

@section('content')
  <div class="bg-white shadow overflow-hidden sm:rounded-lg max-w-7xl mx-auto">
    <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
      <h3 class="text-lg leading-6 font-medium text-gray-900">Kategori</h3>
      <a href="{{ route('categories.create') }}"
        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 transition duration-200">Tambah
        Kategori</a>
    </div>

    <div class="border-t border-gray-200">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($categories as $category)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $category->id }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->name }}</td>
              <td class="px-6 py-4 text-sm text-gray-500">{{ $category->description ?? '-' }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="{{ route('categories.edit', $category) }}"
                  class="text-indigo-600 hover:text-indigo-900 transition duration-200">Edit</a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-600 hover:text-red-900 ml-4 transition duration-200"
                    onclick="return confirm('Are you sure?')">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="px-4 py-3 mt-4">
    {{ $categories->links() }}
  </div>
@endsection
