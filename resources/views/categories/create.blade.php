@extends('layouts.app')

@section('content')
  <div class="bg-white shadow sm:rounded-3xl mt-4">
    <div class="px-8 py-10 bg-gradient-to-r from-gray-50 to-gray-400 rounded-t-3xl">
      <h3 class="text-3xl font-bold text-gray-900 tracking-tight">Tambah Kategori Baru</h3>
      <p class="mt-2 text-base text-gray-600">Isi formulir berikut untuk menambahkan kategori baru ke sistem.</p>
    </div>
    <form action="{{ route('categories.store') }}" method="POST" class="px-4 py-5 sm:p-6">
      @csrf
      <div class="grid grid-cols-1 gap-6">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
          <input type="text" name="name" id="name"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
          @error('name')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
          <textarea name="description" id="description" rows="4"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
          @error('description')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="mt-6 flex justify-end space-x-4">
        <a href="{{ route('categories.index') }}"
          class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Batal</a>
        <button type="submit"
          class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Simpan</button>
      </div>
    </form>
  </div>
@endsection
