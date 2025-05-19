@extends('layouts.app')

@section('content')
  <div class="bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg leading-6 font-medium text-gray-900">Our Books</h3>
    </div>
    <div class="px-4 py-5 sm:p-6">
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($books as $book)
          <div class="bg-gray-50 shadow rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:p-6">
              <h4 class="text-lg font-medium text-gray-900">{{ $book->title }}</h4>
              <p class="mt-1 text-sm text-gray-500">ISBN: {{ $book->isbn }}</p>
              <p class="mt-1 text-sm text-gray-500">Category: {{ $book->category->name }}</p>
              <p class="mt-1 text-sm text-gray-500">Publisher: {{ $book->publisher->name }}</p>
              <p class="mt-1 text-sm text-gray-500">Authors: {{ $book->authors->pluck('name')->implode(', ') }}</p>
              <p class="mt-1 text-sm text-gray-500">Stock: {{ $book->stock }}</p>
              <p class="mt-2 text-sm text-gray-600">{{ Str::limit($book->description, 100) }}</p>
            </div>
          </div>
        @endforeach
      </div>
      <div class="mt-6">
        {{ $books->links() }}
      </div>
    </div>
  </div>
@endsection
