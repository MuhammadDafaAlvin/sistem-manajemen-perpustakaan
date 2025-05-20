@extends('layouts.app')

@section('content')
  <div class="bg-white shadow overflow-hidden sm:rounded-3xl max-w-7xl mx-auto mt-4">
    <div class="px-8 py-10 flex justify-between items-center">
      <div class=" ml-[-0.5rem]">
        <h3 class="text-3xl font-bold text-black tracking-tight">Daftar Penerbit</h3>
        <p class="mt-2 text-base text-gray-600">Semua penerbit buku di perpustakaan</p>
      </div>
      <a href="{{ route('publishers.create') }}"
        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 transition duration-200">Tambah
        Penerbit</a>
    </div>
    <div class="border-t border-gray-200">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor Telepon</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($publishers as $publisher)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $publisher->id }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $publisher->name }}</td>
              <td class="px-6 py-4 text-sm text-gray-500">{{ $publisher->address ?? '-' }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $publisher->phone ?? '-' }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="{{ route('publishers.edit', $publisher) }}"
                  class="text-indigo-600 hover:text-indigo-900 transition duration-200">Edit</a>
                <form action="{{ route('publishers.destroy', $publisher) }}" method="POST" class="inline">
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
      <div class="px-4 py-3">
        {{ $publishers->links() }}
      </div>
    </div>
  </div>
@endsection
