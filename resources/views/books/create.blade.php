@extends('layouts.app')

@section('content')
  <div class="max-w-7xl mx-auto bg-white rounded-2xl overflow-hidden mt-4">
    <div class="px-8 py-10 bg-gradient-to-r from-gray-50 to-gray-400 rounded-t-2xl">
      <h3 class="text-3xl font-bold text-gray-900 tracking-tight">Tambah Buku</h3>
      <p class="mt-2 text-base text-gray-600">Isi formulir berikut untuk menambahkan buku baru ke sistem.</p>
    </div>
    <form action="{{ route('books.store') }}" method="POST" class="px-4 py-5 sm:p-6 mt-4">
      @csrf
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <!-- Title -->
        <div>
          <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
          <input type="text" name="title" id="title" value="{{ old('title') }}"
            class="mt-1 block w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}"
            required>
          @error('title')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>

        <!-- ISBN -->
        <div>
          <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
          <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}"
            class="mt-1 block w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('isbn') ? 'border-red-500' : 'border-gray-300' }}"
            required>
          @error('isbn')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>

        <!-- Publication Year -->
        <div>
          <label for="publication_year" class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
          <input type="number" name="publication_year" id="publication_year" value="{{ old('publication_year') }}"
            class="mt-1 block w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('publication_year') ? 'border-red-500' : 'border-gray-300' }}"
            required>
          @error('publication_year')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>

        <!-- Category (Dropdown) -->
        <div>
          <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
          <select name="category_id" id="category_id"
            class="mt-1 block w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('category_id') ? 'border-red-500' : 'border-gray-300' }}"
            required>
            <option value="">Pilih Kategori</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
          @error('category_id')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>

        <!-- Publisher (Dropdown) -->
        <div>
          <label for="publisher_id" class="block text-sm font-medium text-gray-700">Penerbit</label>
          <select name="publisher_id" id="publisher_id"
            class="mt-1 block w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('publisher_id') ? 'border-red-500' : 'border-gray-300' }}"
            required>
            <option value="">Pilih Penerbit</option>
            @foreach ($publishers as $publisher)
              <option value="{{ $publisher->id }}" {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>
                {{ $publisher->name }}
              </option>
            @endforeach
          </select>
          @error('publisher_id')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>

        <!-- Stock -->
        <div>
          <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
          <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
            class="mt-1 block w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('stock') ? 'border-red-500' : 'border-gray-300' }}"
            required>
          @error('stock')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>

        <!-- Authors -->
        <div class="sm:col-span-2">
          <label for="authors" class="block text-sm font-medium text-gray-700 mb-1">Penulis</label>
          <select name="authors[]" id="authors" multiple
            class="select2-authors w-full rounded-md shadow-sm sm:text-sm {{ $errors->has('authors') ? 'border-red-500' : 'border-gray-300' }}"
            required>
            @foreach ($authors as $author)
              <option value="{{ $author->id }}" {{ in_array($author->id, old('authors', [])) ? 'selected' : '' }}>
                {{ $author->name }}
              </option>
            @endforeach
          </select>
          <p class="mt-1 text-xs text-gray-500">*Kamu dapat memilih lebih dari satu penulis.</p>
          @error('authors')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>

        <!-- Description -->
        <div class="sm:col-span-2">
          <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
          <textarea name="description" id="description" rows="4"
            class="mt-1 block w-full border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}">{{ old('description') }}</textarea>
          @error('description')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="mt-6 flex justify-end space-x-4">
        <a href="{{ route('books.index') }}"
          class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Batal</a>
        <button type="submit"
          class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Simpan</button>
      </div>
    </form>
  </div>

  <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Select2 JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#authors').select2({
        placeholder: "Pilih penulis",
        allowClear: true,
        width: '100%'
      });
    });
  </script>
@endsection
