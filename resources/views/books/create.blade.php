@extends('layouts.app')

@section('content')
  <div class="bg-[#1a1a1a] shadow overflow-hidden sm:rounded-3xl mt-4 max-w-7xl mx-auto">
    <div class="px-8 py-10 rounded-t-3xl">
      <h3 class="text-3xl font-bold text-white tracking-tight">Tambah Buku</h3>
      <p class="mt-2 text-base text-gray-400">Isi formulir berikut untuk menambahkan buku baru ke sistem.</p>
    </div>
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="px-8 py-10">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Title -->
        <div>
          <label for="title" class="block text-sm font-medium text-gray-300">Judul <span
              class="text-red-500">*</span></label>
          <input type="text" name="title" id="title" value="{{ old('title') }}"
            class="mt-1 block w-full rounded-lg border {{ $errors->has('title') ? 'border-red-500' : 'border-gray-600' }} bg-[#1a1a1a] px-4 py-3 text-white placeholder-gray-500 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm"
            placeholder="Masukkan judul buku" required>
          @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- ISBN -->
        <div>
          <label for="isbn" class="block text-sm font-medium text-gray-300">ISBN <span
              class="text-red-500">*</span></label>
          <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}"
            class="mt-1 block w-full rounded-lg border {{ $errors->has('isbn') ? 'border-red-500' : 'border-gray-600' }} bg-[#1a1a1a] px-4 py-3 text-white placeholder-gray-500 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm"
            placeholder="Masukkan ISBN" required>
          @error('isbn')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Publication Year -->
        <div>
          <label for="publication_year" class="block text-sm font-medium text-gray-300">Tahun Terbit <span
              class="text-red-500">*</span></label>
          <input type="number" name="publication_year" id="publication_year" value="{{ old('publication_year') }}"
            class="mt-1 block w-full rounded-lg border {{ $errors->has('publication_year') ? 'border-red-500' : 'border-gray-600' }} bg-[#1a1a1a] px-4 py-3 text-white placeholder-gray-500 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm"
            placeholder="Masukkan tahun terbit" required>
          @error('publication_year')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Stock -->
        <div>
          <label for="stock" class="block text-sm font-medium text-gray-300">Stok <span
              class="text-red-500">*</span></label>
          <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
            class="mt-1 block w-full rounded-lg border {{ $errors->has('stock') ? 'border-red-500' : 'border-gray-600' }} bg-[#1a1a1a] px-4 py-3 text-white placeholder-gray-500 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm"
            placeholder="Masukkan jumlah stok" required>
          @error('stock')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Category -->
        <div>
          <label for="category_id" class="block text-sm font-medium text-gray-300">Kategori <span
              class="text-red-500">*</span></label>
          <select name="category_id" id="category_id"
            class="mt-1 block w-full rounded-lg border {{ $errors->has('category_id') ? 'border-red-500' : 'border-gray-600' }} bg-[#1a1a1a] px-4 py-3 text-white focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm"
            required>
            <option value="" class="text-gray-400">Pilih Kategori</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
          <label for="publisher_id" class="block text-sm font-medium text-gray-300">Penerbit <span
              class="text-red-500">*</span></label>
          <select name="publisher_id" id="publisher_id"
            class="mt-1 block w-full rounded-lg border {{ $errors->has('publisher_id') ? 'border-red-500' : 'border-gray-600' }} bg-[#1a1a1a] px-4 py-3 text-white focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm"
            required>
            <option value="" class="text-gray-400">Pilih Penerbit</option>
            @foreach ($publishers as $publisher)
              <option value="{{ $publisher->id }}" {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>
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
          <label for="authors" class="block text-sm font-medium text-gray-300">Penulis <span
              class="text-red-500">*</span></label>
          <select name="authors[]" id="authors" multiple
            class="mt-1 block w-full rounded-lg border {{ $errors->has('authors') ? 'border-red-500' : 'border-gray-600' }} bg-[#1a1a1a] px-4 py-3 text-white focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm"
            required>
            @foreach ($authors as $author)
              <option value="{{ $author->id }}" {{ in_array($author->id, old('authors', [])) ? 'selected' : '' }}>
                {{ $author->name }}
              </option>
            @endforeach
          </select>
          <p class="mt-1 text-sm text-gray-400">Pilih satu atau lebih penulis.</p>
          @error('authors')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Description -->
        <div class="md:col-span-2">
          <label for="description" class="block text-sm font-medium text-gray-300">Deskripsi</label>
          <textarea name="description" id="description" rows="4"
            class="mt-1 block w-full rounded-lg border {{ $errors->has('description') ? 'border-red-500' : 'border-gray-600' }} bg-[#1a1a1a] px-4 py-3 text-white placeholder-gray-500 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm"
            placeholder="Masukkan deskripsi buku">{{ old('description') }}</textarea>
          @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- Tambahkan di dalam <form> setelah field description -->
      <div class="sm:col-span-2">
        <label for="cover_image" class="block text-sm font-medium text-gray-300">Gambar Sampul</label>
        <div class="mt-1 relative">
          <input type="file" name="cover_image" id="cover_image"
            class="block w-full rounded-lg border {{ $errors->has('cover_image') ? 'border-red-500' : 'border-gray-700' }} bg-[#2a2a2a] px-4 py-3 text-white focus:ring-2 focus:ring-indigo-400 focus:border-indigo-500 sm:text-sm"
            accept="image/jpeg,image/png">
        </div>
        <p class="mt-1 text-sm text-gray-500">Unggah gambar sampul (jpg/png, maks 2MB).</p>
        @error('cover_image')
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <!-- Buttons -->
      <div class="mt-10 flex justify-end space-x-4">
        <a href="{{ route('books.index') }}"
          class="inline-flex items-center px-4 py-2 border border-gray-700 text-sm font-semibold rounded-xl text-gray-400 bg-[#1a1a1a] hover:bg-gray-800">
          Batal
        </a>
        <button type="submit"
          class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-semibold rounded-xl text-white bg-green-600 hover:bg-green-700">
          Simpan
        </button>
      </div>
    </form>
  </div>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <style>
    .select2-container--default .select2-selection--multiple {
      background-color: #1a1a1a;
      border: 1px solid #4b5563;
      color: white;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
      background-color: #3c3b43;
      border: none;
      color: white;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
      color: #838689;
      margin-right: 4px;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
      border-color: #6366f1;
      box-shadow: 0 0 0 1px #6366f1;
    }

    .select2-container--default .select2-results>.select2-results__options {
      background-color: #1a1a1a;
      color: white;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
      background-color: #4f46e5;
      color: white;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__placeholder {
      color: #9ca3af;
    }
  </style>

  <!-- jQuery & Select2 JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#authors').select2({
        placeholder: "Pilih penulis",
        allowClear: true,
        width: '48.5%'
      });
    });
  </script>
@endsection
