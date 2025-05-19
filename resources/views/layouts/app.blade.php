<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Library Management') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
  <div class="min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex">
            <div class="flex-shrink-0 flex items-center">
              <a href="{{ route('dashboard') }}" class="text-xl font-bold">Library</a>
            </div>
            @auth
              <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                <a href="{{ route('books.index') }}"
                  class="border-b-2 border-transparent text-gray-500 hover:border-indigo-500 hover:text-gray-700 inline-flex items-center px-1 pt-1 text-sm font-medium">Books</a>
                <a href="{{ route('categories.index') }}"
                  class="border-b-2 border-transparent text-gray-500 hover:border-indigo-500 hover:text-gray-700 inline-flex items-center px-1 pt-1 text-sm font-medium">Categories</a>
                <a href="{{ route('publishers.index') }}"
                  class="border-b-2 border-transparent text-gray-500 hover:border-indigo-500 hover:text-gray-700 inline-flex items-center px-1 pt-1 text-sm font-medium">Publishers</a>
                <a href="{{ route('authors.index') }}"
                  class="border-b-2 border-transparent text-gray-500 hover:border-indigo-500 hover:text-gray-700 inline-flex items-center px-1 pt-1 text-sm font-medium">Authors</a>
                <a href="{{ route('loans.index') }}"
                  class="border-b-2 border-transparent text-gray-500 hover:border-indigo-500 hover:text-gray-700 inline-flex items-center px-1 pt-1 text-sm font-medium">Loans</a>
              </div>
            @endauth
          </div>
          <div class="hidden sm:ml-6 sm:flex sm:items-center">
            @auth
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-500 hover:text-gray-700 text-sm font-medium">Logout</button>
              </form>
            @else
              <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 text-sm font-medium">Login</a>
              <a href="{{ route('register') }}"
                class="ml-4 text-gray-500 hover:text-gray-700 text-sm font-medium">Register</a>
            @endauth
          </div>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
      @yield('content')
    </main>
  </div>
</body>

</html>
