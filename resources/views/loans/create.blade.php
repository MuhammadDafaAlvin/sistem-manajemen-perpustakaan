@extends('layouts.app')

@section('content')
  <div class="max-w-7xl mx-auto bg-[#1a1a1a] rounded-2xl overflow-hidden mt-4 shadow-lg">
    <div class="px-8 py-10 bg-[#111112] rounded-t-2xl">
      <h3 class="text-3xl font-bold text-white tracking-tight">Tambah Peminjaman</h3>
      <p class="mt-2 text-base text-gray-400">Isi formulir berikut untuk menambahkan peminjaman baru ke sistem.</p>
    </div>
    <form action="{{ route('loans.store') }}" method="POST" class="px-4 py-5 sm:p-6 bg-[#1a1a1a]">
      @csrf
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div>
          <label for="user_id" class="block text-sm font-medium text-gray-300">Pengguna</label>
          <select name="user_id" id="user_id"
            class="mt-1 block w-full border-gray-700 bg-[#333333] text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
            <option value="" class="text-black">Pilih Pengguna</option>
            @foreach ($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
          </select>
          @error('user_id')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="book_id" class="block text-sm font-medium text-gray-300">Buku</label>
          <select name="book_id" id="book_id"
            class="mt-1 block w-full border-gray-700 bg-[#333333] text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
            <option value="" class="text-black">Pilih Buku</option>
            @foreach ($books as $book)
              <option value="{{ $book->id }}">{{ $book->title }} (Stock: {{ $book->stock }})</option>
            @endforeach
          </select>
          @error('book_id')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="loan_date" class="block text-sm font-medium text-gray-300">Tanggal Pinjam</label>
          <input type="date" name="loan_date" id="loan_date" value="{{ old('loan_date', now()->format('Y-m-d')) }}"
            class="mt-1 block w-full border-gray-700 bg-[#333333] text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            required>
          @error('loan_date')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="return_date" class="block text-sm font-medium text-gray-300">Tanggal Kembali</label>
          <input type="date" name="return_date" id="return_date" value="{{ old('return_date') }}"
            class="mt-1 block w-full border-gray-700 bg-[#333333] text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          @error('return_date')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex items-center space-x-2">
          <input type="checkbox" name="is_returned" id="is_returned" value="1"
            {{ old('is_returned') ? 'checked' : '' }}
            class="h-4 w-4 text-indigo-600 border-gray-700 rounded focus:ring-indigo-500">
          <label for="is_returned" class="block text-sm font-medium text-gray-300">Sudah Dikembalikan</label>
          @error('is_returned')
            <span class="text-red-600 text-sm">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="mt-6 flex justify-end space-x-4">
        <a href="{{ route('loans.index') }}"
          class="inline-flex items-center px-4 py-2 border border-gray-600 text-sm font-medium rounded-xl text-gray-300 bg-[#111112] hover:bg-[#222222]">Batal</a>
        <button type="submit"
          class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-xl shadow-sm text-white bg-green-600 hover:bg-green-700">Simpan</button>
      </div>
    </form>
  </div>
@endsection
