@extends('layouts.app')

@section('content')
  <div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6 flex justify-between">
      <h3 class="text-lg leading-6 font-medium text-gray-900">Loans</h3>
      <a href="{{ route('loans.create') }}"
        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">Add
        Loan</a>
    </div>
    <div class="border-t border-gray-200">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Book</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Loan Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Return Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Returned</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($loans as $loan)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loan->id }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loan->user->name }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loan->book->title }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loan->loan_date }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $loan->return_date ? $loan->return_date : '-' }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loan->is_returned ? 'Yes' : 'No' }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="{{ route('loans.edit', $loan) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                <form action="{{ route('loans.destroy', $loan) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-600 hover:text-red-900 ml-4"
                    onclick="return confirm('Are you sure?')">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="px-4 py-3">
        {{ $loans->links() }}
      </div>
    </div>
  </div>
@endsection
