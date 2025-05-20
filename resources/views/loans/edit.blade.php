@extends('layouts.app')

@section('content')
  <div class="max-w-7xl mx-auto bg-white rounded-2xl overflow-hidden mt-4">
    <div class="px-8 py-10 bg-gradient-to-r from-gray-50 to-gray-400 rounded-t-3xl">
      <h3 class="text-3xl font-bold text-gray-900 tracking-tight">Edit Peminjaman</h3>
      <p class="mt-2 text-base text-gray-600">Perbarui informasi peminjaman buku dengan data yang sesuai.</p>
    </div>
    <form action="{{ route('loans.update', $loan) }}" method="POST" class="px-4 py-5 sm:p-6">
      @csrf
      @method('PUT')
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div>
          <label for="user_id" class="block text-sm font-medium text-gray-700">Pengguna</label>
          <select name="user_id" id="user_id"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
            <option value="">Select User</option>
            @foreach ($users as $user)
              <option value="{{ $user->id }}" {{ old('user_id', $loan->user_id) == $user->id ? 'selected' : '' }}>
                {{ $user->name }}</option>
            @endforeach
          </select>
          @error('user_id')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="book_id" class="block text-sm font-medium text-gray-700">Buku</label>
          <select name="book_id" id="book_id"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
            <option value="">Select Book</option>
            @foreach ($books as $book)
              <option value="{{ $book->id }}" {{ old('book_id', $loan->book_id) == $book->id ? 'selected' : '' }}>
                {{ $book->title }} (Stock: {{ $book->stock }})</option>
            @endforeach
          </select>
          @error('book_id')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="loan_date" class="block text-sm font-medium text-gray-700">Tanggal Pinjam</label>
          <input type="date" name="loan_date" id="loan_date" value="{{ old('loan_date', $loan->loan_date) }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
          @error('loan_date')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="return_date" class="block text-sm font-medium text-gray-700">Tanggal Kembali</label>
          <input type="date" name="return_date" id="return_date"
            value="{{ old('return_date', $loan->return_date ? $loan->return_date : '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          @error('return_date')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="is_returned" class="block text-sm font-medium text-gray-700">Sudah Dikembalikan</label>
          <input type="checkbox" name="is_returned" id="is_returned" value="1"
            {{ old('is_returned', $loan->is_returned) ? 'checked' : '' }}
            class="mt-1 h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
          @error('is_returned')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="mt-10 flex justify-end space-x-4">
        <a href="{{ route('loans.index') }}"
          class="inline-flex items-center px-6 py-3 border border-gray-200 text-sm font-semibold rounded-lg text-gray-700 bg-white hover:bg-gray-100">
          Batal
        </a>
        <button type="submit"
          class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Perbarui</button>
      </div>

    </form>
  </div>
@endsection
