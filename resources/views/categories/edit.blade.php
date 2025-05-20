@extends('layouts.app')

@section('content')
  <div class="bg-[#1a1a1a] shadow sm:rounded-3xl mt-4">
    <div class="px-8 py-10 rounded-t-3xl">
      <h3 class="text-3xl font-bold text-white tracking-tight">Edit Kategori</h3>
      <p class="mt-2 text-base text-gray-400">Perbarui informasi kategori dengan data yang sesuai.</p>
    </div>
    <form action="{{ route('categories.update', $category) }}" method="POST" class="px-4 py-5 sm:p-6">
      @csrf
      @method('PUT')
      <div class="grid grid-cols-1 gap-6">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-300">Nama Kategori</label>
          <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
            class="mt-1 block w-full bg-[#2a2a2a] text-white border-gray-600 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
            required>
          @error('name')
            <span class="text-red-400 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="description" class="block text-sm font-medium text-gray-300">Deskripsi</label>
          <textarea name="description" id="description" rows="4"
            class="mt-1 block w-full bg-[#2a2a2a] text-white border-gray-600 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">{{ old('description', $category->description) }}</textarea>
          @error('description')
            <span class="text-red-400 text-sm">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="mt-10 flex justify-end space-x-4">
        <a href="{{ route('categories.index') }}"
          class="inline-flex items-center px-4 py-2 border border-gray-600 text-sm font-semibold rounded-xl text-gray-300 bg-[#1a1a1a] hover:bg-gray-800">
          Batal
        </a>
        <button type="submit"
          class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-xl shadow-sm text-white bg-green-600 hover:bg-green-700">Perbarui</button>
      </div>
    </form>
  </div>
@endsection
