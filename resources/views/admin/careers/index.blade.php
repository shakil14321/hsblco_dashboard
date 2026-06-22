@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Careers</h2>

            <a href="{{ route('admin.careers.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
                Add Career
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[900px] text-sm text-left">
                    <thead class="bg-slate-100 text-gray-700">
                    <tr>
                        <th class="px-5 py-4">Title</th>
                        <th class="px-5 py-4">Location</th>
                        <th class="px-5 py-4">Job Type</th>
                        <th class="px-5 py-4">Salary</th>
                        <th class="px-5 py-4">Deadline</th>
                        <th class="px-5 py-4 text-center">Status</th>
                        <th class="px-5 py-4 text-right">Action</th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                    @forelse($careers as $career)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-4 font-medium">{{ $career->title }}</td>
                            <td class="px-5 py-4">{{ $career->location ?? '-' }}</td>
                            <td class="px-5 py-4">{{ $career->job_type ?? '-' }}</td>
                            <td class="px-5 py-4">{{ $career->salary ?? '-' }}</td>
                            <td class="px-5 py-4">
                                {{ $career->deadline ? $career->deadline->format('d M, Y') : '-' }}
                            </td>

                            <td class="px-5 py-4 text-center">
                                @if($career->status)
                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">Active</span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs">Inactive</span>
                                @endif
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex justify-end gap-2 whitespace-nowrap">
                                    <a href="{{ route('admin.careers.show', $career->id) }}"
                                       class="bg-slate-600 text-white px-3 py-2 rounded-lg">
                                        View
                                    </a>

                                    <a href="{{ route('admin.careers.edit', $career->id) }}"
                                       class="bg-yellow-500 text-white px-3 py-2 rounded-lg">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.careers.destroy', $career->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this career?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="bg-red-600 text-white px-3 py-2 rounded-lg">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-5 py-8 text-center text-gray-500">
                                No career found.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
