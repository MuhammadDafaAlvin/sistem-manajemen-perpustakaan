@extends('layouts.app')

@section('content')
  <div class="bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Book</h3>
    </div>
    <form action="{{ route('books.update', $book) }}" method="POST" class="px-4 py-5 sm:p-6">
      @csrf
      @method('PUT')
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div>
          <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
          <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
          @error('title')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <!-- Tambahkan input lain seperti create.blade.php, dengan value="{{ old('field', $book->field) }}" -->
        <div class="sm:col-span-2">
          <label for="authors" class="block text-sm font-medium text-gray-700">Authors</label>
          <select name="authors[]" id="authors" multiple
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
            @foreach ($authors as $author)
              <option value="{{ $author->id }}" {{ $book->authors->contains($author->id) ? 'selected' : '' }}>
                {{ $author->name }}</option>
            @endforeach
          </select>
          @error('authors')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="mt-6 flex justify-end">
        <button type="submit"
          class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Update</button>
      </div>
    </form>
  </div>
@endsection
