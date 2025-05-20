@extends('layouts.app')

@section('content')
  <div class="max-w-7xl mx-auto bg-white rounded-2xl overflow-hidden mt-4">
    <div class="px-8 py-10 bg-gradient-to-r from-gray-50 to-gray-400">
      <h3 class="text-3xl font-bold text-gray-900 tracking-tight">Edit Buku</h3>
      <p class="mt-2 text-base text-gray-600">Perbarui informasi buku dengan data yang sesuai.</p>
    </div>
    <form action="{{ route('books.update', $book) }}" method="POST" class="px-8 py-10">
      @csrf
      @method('PUT')

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Field per kolom -->
        <!-- Title -->
        <div>
          <label for="title" class="block text-sm font-medium text-gray-700">Judul <span
              class="text-red-500">*</span></label>
          <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}"
            class="mt-1 block w-full rounded-lg border {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }} bg-gray-50 px-4 py-3 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm"
            placeholder="Masukkan judul buku" required>
          @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- ISBN -->
        <div>
          <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN <span
              class="text-red-500">*</span></label>
          <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book->isbn) }}"
            class="mt-1 block w-full rounded-lg border {{ $errors->has('isbn') ? 'border-red-500' : 'border-gray-300' }} bg-gray-50 px-4 py-3 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm"
            placeholder="Masukkan ISBN" required>
          @error('isbn')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Publication Year -->
        <div>
          <label for="publication_year" class="block text-sm font-medium text-gray-700">Tahun Terbit <span
              class="text-red-500">*</span></label>
          <input type="number" name="publication_year" id="publication_year"
            value="{{ old('publication_year', $book->publication_year) }}"
            class="mt-1 block w-full rounded-lg border {{ $errors->has('publication_year') ? 'border-red-500' : 'border-gray-300' }} bg-gray-50 px-4 py-3 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm"
            placeholder="Masukkan tahun terbit" required>
          @error('publication_year')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Stock -->
        <div>
          <label for="stock" class="block text-sm font-medium text-gray-700">Stok <span
              class="text-red-500">*</span></label>
          <input type="number" name="stock" id="stock" value="{{ old('stock', $book->stock) }}"
            class="mt-1 block w-full rounded-lg border {{ $errors->has('stock') ? 'border-red-500' : 'border-gray-300' }} bg-gray-50 px-4 py-3 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm"
            placeholder="Masukkan jumlah stok" required>
          @error('stock')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Category -->
        <div>
          <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori <span
              class="text-red-500">*</span></label>
          <select name="category_id" id="category_id"
            class="mt-1 block w-full rounded-lg border {{ $errors->has('category_id') ? 'border-red-500' : 'border-gray-300' }} bg-gray-50 px-4 py-3 text-gray-900 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm">
            <option value="">Pilih Kategori</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}"
                {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
          @error('category_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Publisher -->
        <div>
          <label for="publisher_id" class="block text-sm font-medium text-gray-700">Penerbit <span
              class="text-red-500">*</span></label>
          <select name="publisher_id" id="publisher_id"
            class="mt-1 block w-full rounded-lg border {{ $errors->has('publisher_id') ? 'border-red-500' : 'border-gray-300' }} bg-gray-50 px-4 py-3 text-gray-900 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm">
            <option value="">Pilih Penerbit</option>
            @foreach ($publishers as $publisher)
              <option value="{{ $publisher->id }}"
                {{ old('publisher_id', $book->publisher_id) == $publisher->id ? 'selected' : '' }}>
                {{ $publisher->name }}
              </option>
            @endforeach
          </select>
          @error('publisher_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Authors -->
        <div class="md:col-span-2">
          <label for="authors" class="block text-sm font-medium text-gray-700">Penulis <span
              class="text-red-500">*</span></label>
          <select name="authors[]" id="authors" multiple
            class="mt-1 block w-full rounded-lg border {{ $errors->has('authors') ? 'border-red-500' : 'border-gray-300' }} bg-gray-50 px-4 py-3 text-gray-900 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm">
            @foreach ($authors as $author)
              <option value="{{ $author->id }}"
                {{ in_array($author->id, old('authors', $book->authors->pluck('id')->toArray())) ? 'selected' : '' }}>
                {{ $author->name }}
              </option>
            @endforeach
          </select>
          <p class="mt-1 text-sm text-gray-500">Pilih satu atau lebih penulis.</p>
          @error('authors')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Description -->
        <div class="md:col-span-2">
          <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
          <textarea name="description" id="description" rows="4"
            class="mt-1 block w-full rounded-lg border {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }} bg-gray-50 px-4 py-3 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm"
            placeholder="Masukkan deskripsi buku">{{ old('description', $book->description) }}</textarea>
          @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- Buttons -->
      <div class="mt-10 flex justify-end space-x-4">
        <a href="{{ route('books.index') }}"
          class="inline-flex items-center px-6 py-3 border border-gray-200 text-sm font-semibold rounded-lg text-gray-700 bg-white hover:bg-gray-100">
          Batal
        </a>
        <button type="submit"
          class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-semibold rounded-lg text-white bg-indigo-600 hover:bg-indigo-700">
          Simpan
        </button>
      </div>
    </form>
  </div>

  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
