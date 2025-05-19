@extends('layouts.app')

@section('content')
  <div class="bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg leading-6 font-medium text-gray-900">Add New Book</h3>
    </div>
    <form action="{{ route('books.store') }}" method="POST" class="px-4 py-5 sm:p-6">
      @csrf
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div>
          <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
          <input type="text" name="title" id="title"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
          @error('title')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
          <input type="text" name="isbn" id="isbn"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
          @error('isbn')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="publication_year" class="block text-sm font-medium text-gray-700">Publication Year</label>
          <input type="number" name="publication_year" id="publication_year"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
          @error('publication_year')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
          <select name="category_id" id="category_id"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
            <option value="">Select Category</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
          @error('category_id')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="publisher_id" class="block text-sm font-medium text-gray-700">Publisher</label>
          <select name="publisher_id" id="publisher_id"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
            <option value="">Select Publisher</option>
            @foreach ($publishers as $publisher)
              <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
            @endforeach
          </select>
          @error('publisher_id')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
          <input type="number" name="stock" id="stock"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
          @error('stock')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div class="sm:col-span-2">
          <label for="authors" class="block text-sm font-medium text-gray-700">Authors</label>
          <select name="authors[]" id="authors" multiple
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
            @foreach ($authors as $author)
              <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
          </select>
          @error('authors')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div class="sm:col-span-2">
          <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
          <textarea name="description" id="description" rows="4"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
          @error('description')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="mt-6 flex justify-end">
        <button type="submit"
          class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Save</button>
      </div>
    </form>
  </div>
@endsection
