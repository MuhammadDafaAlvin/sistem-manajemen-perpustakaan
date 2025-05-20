@extends('layouts.app')

@section('content')
  <div class="bg-white shadow sm:rounded-3xl mt-4">
    <div class="px-8 py-10 bg-gradient-to-r from-gray-50 to-gray-400 rounded-t-3xl">
      <h3 class="text-3xl font-bold text-gray-900 tracking-tight">Edit Penerbit</h3>
      <p class="mt-2 text-base text-gray-600">Perbarui informasi penerbit dengan data yang sesuai.</p>
    </div>
    <form action="{{ route('publishers.update', $publisher) }}" method="POST" class="px-4 py-5 sm:p-6">
      @csrf
      @method('PUT')
      <div class="grid grid-cols-1 gap-6">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
          <input type="text" name="name" id="name" value="{{ old('name', $publisher->name) }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
          @error('name')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
          <textarea name="address" id="address" rows="4"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('address', $publisher->address) }}</textarea>
          @error('address')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
          <input type="text" name="phone" id="phone" value="{{ old('phone', $publisher->phone) }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          @error('phone')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="mt-10 flex justify-end space-x-4">
        <a href="{{ route('publishers.index') }}"
          class="inline-flex items-center px-6 py-3 border border-gray-200 text-sm font-semibold rounded-lg text-gray-700 bg-white hover:bg-gray-100">
          Batal
        </a>
        <button type="submit"
          class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Perbarui</button>
      </div>
    </form>
  </div>
@endsection
