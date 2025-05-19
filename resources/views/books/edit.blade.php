@extends('layouts.app')

@section('content')
  <div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Buku</h3>
    </div>
    <div class="border-t border-gray-200">
      <form action="{{ route('books.update', $book) }}" method="POST" class="px-4 py-5 sm:p-6">
        @csrf
        @method('PUT')

        @php
          function inputClasses($field, $errors)
          {
              return 'mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm ' .
                  ($errors->has($field) ? 'border-red-300' : 'border-gray-300');
          }
        @endphp

        <!-- Title -->
        <div class="mb-4">
          <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
          <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}"
            class="{{ inputClasses('title', $errors) }}">
          @error('title')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- ISBN -->
        <div class="mb-4">
          <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
          <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book->isbn) }}"
            class="{{ inputClasses('isbn', $errors) }}">
          @error('isbn')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Publication Year -->
        <div class="mb-4">
          <label for="publication_year" class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
          <input type="number" name="publication_year" id="publication_year"
            value="{{ old('publication_year', $book->publication_year) }}"
            class="{{ inputClasses('publication_year', $errors) }}">
          @error('publication_year')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Category -->
        <div class="mb-4">
          <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
          <select name="category_id" id="category_id" class="{{ inputClasses('category_id', $errors) }}">
            <option value="">Pilih Kategori</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}"
                {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
          @error('category_id')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Publisher -->
        <div class="mb-4">
          <label for="publisher_id" class="block text-sm font-medium text-gray-700">Penerbit</label>
          <select name="publisher_id" id="publisher_id" class="{{ inputClasses('publisher_id', $errors) }}">
            <option value="">Pilih Penerbit</option>
            @foreach ($publishers as $publisher)
              <option value="{{ $publisher->id }}"
                {{ old('publisher_id', $book->publisher_id) == $publisher->id ? 'selected' : '' }}>
                {{ $publisher->name }}
              </option>
            @endforeach
          </select>
          @error('publisher_id')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Authors -->
        <div class="mb-4">
          <label for="authors" class="block text-sm font-medium text-gray-700">Penulis</label>
          <select name="authors[]" id="authors" multiple class="{{ inputClasses('authors', $errors) }}">
            @foreach ($authors as $author)
              <option value="{{ $author->id }}"
                {{ in_array($author->id, old('authors', $book->authors->pluck('id')->toArray())) ? 'selected' : '' }}>
                {{ $author->name }}
              </option>
            @endforeach
          </select>
          <p class="mt-1 text-sm text-gray-500">Pilih satu atau lebih penulis.</p>
          @error('authors')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Stock -->
        <div class="mb-4">
          <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
          <input type="number" name="stock" id="stock" value="{{ old('stock', $book->stock) }}"
            class="{{ inputClasses('stock', $errors) }}">
          @error('stock')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Description -->
        <div class="mb-4">
          <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
          <textarea name="description" id="description" rows="4" class="{{ inputClasses('description', $errors) }}">{{ old('description', $book->description) }}</textarea>
          @error('description')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Buttons -->
        <div class="flex justify-end space-x-4">
          <a href="{{ route('books.index') }}"
            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Batal</a>
          <button type="submit"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Simpan</button>
        </div>
      </form>
    </div>
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
        width: '100%',
      });
    });
  </script>
@endsection
