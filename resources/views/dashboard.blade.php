<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <!-- Statistik -->
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-8">
        <!-- Total Books -->
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
          <h3 class="text-lg font-medium text-gray-900">Total Books</h3>
          <p class="mt-2 text-3xl font-bold text-indigo-600">{{ \App\Models\Book::count() }}</p>
          <p class="mt-1 text-sm text-gray-500">Books in the library</p>
        </div>
        <!-- Available Books -->
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
          <h3 class="text-lg font-medium text-gray-900">Available Books</h3>
          <p class="mt-2 text-3xl font-bold text-indigo-600">{{ \App\Models\Book::where('stock', '>', 0)->count() }}</p>
          <p class="mt-1 text-sm text-gray-500">Books with stock</p>
        </div>
        <!-- Total Categories -->
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
          <h3 class="text-lg font-medium text-gray-900">Total Categories</h3>
          <p class="mt-2 text-3xl font-bold text-indigo-600">{{ \App\Models\Category::count() }}</p>
          <p class="mt-1 text-sm text-gray-500">Book categories</p>
        </div>
        <!-- Total Publishers -->
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
          <h3 class="text-lg font-medium text-gray-900">Total Publishers</h3>
          <p class="mt-2 text-3xl font-bold text-indigo-600">{{ \App\Models\Publisher::count() }}</p>
          <p class="mt-1 text-sm text-gray-500">Book publishers</p>
        </div>
        <!-- Total Authors -->
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
          <h3 class="text-lg font-medium text-gray-900">Total Authors</h3>
          <p class="mt-2 text-3xl font-bold text-indigo-600">{{ \App\Models\Author::count() }}</p>
          <p class="mt-1 text-sm text-gray-500">Book authors</p>
        </div>
        <!-- Active Loans -->
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
          <h3 class="text-lg font-medium text-gray-900">Active Loans</h3>
          <p class="mt-2 text-3xl font-bold text-indigo-600">
            {{ \App\Models\Loan::where('is_returned', false)->count() }}</p>
          <p class="mt-1 text-sm text-gray-500">Books currently borrowed</p>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="bg-white shadow-sm sm:rounded-lg p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Quick Links</h3>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
          <a href="{{ route('books.index') }}"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Manage
            Books</a>
          <a href="{{ route('categories.index') }}"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Manage
            Categories</a>
          <a href="{{ route('publishers.index') }}"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Manage
            Publishers</a>
          <a href="{{ route('authors.index') }}"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Manage
            Authors</a>
          <a href="{{ route('loans.index') }}"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Manage
            Loans</a>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
