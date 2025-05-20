@extends('layouts.app')

@section('content')
  <div class="bg-[#1a1a1a] shadow overflow-hidden sm:rounded-3xl mt-4">
    <div class="px-8 py-10 flex justify-between items-center">
      <div class="ml-[-0.5rem]">
        <h3 class="text-3xl font-bold text-white tracking-tight">Daftar Peminjaman</h3>
        <p class="mt-2 text-base text-gray-400">Semua peminjaman buku di perpustakaan</p>
      </div>
      <a href="{{ route('loans.create') }}"
        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-xl shadow-sm text-white bg-green-600 hover:bg-green-700">
        Tambah Peminjaman
      </a>
    </div>

    <div class="border-t border-gray-700">
      <table class="min-w-full divide-y divide-gray-700">
        <thead class="bg-[#2a2a2a] tracking-tight">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Pengguna</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Buku</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Tanggal Pinjam</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Tanggal Kembali
            </th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Sudah Dikembalikan
            </th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-400">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-[#1a1a1a] divide-y divide-gray-700">
          @foreach ($loans as $loan)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{ $loan->user->name }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{ $loan->book->title }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $loan->loan_date }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $loan->return_date ?? '-' }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $loan->is_returned ? 'Ya' : 'Tidak' }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex">
                <a href="{{ route('loans.edit', $loan) }}" class="text-yellow-500 hover:text-yellow-400">Edit</a>
                <form action="{{ route('loans.destroy', $loan) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-500 hover:text-red-700 ml-4"
                    onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="px-4 py-3 mt-4 text-gray-400">
    {{ $loans->links() }}
  </div>
@endsection
