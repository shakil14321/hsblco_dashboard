@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Service Features</h2>

            <a href="{{ route('admin.service-features.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
                Add Feature
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
                        <th class="px-5 py-4 font-semibold">Service</th>
                        <th class="px-5 py-4 font-semibold">Title</th>
                        <th class="px-5 py-4 font-semibold">Icon</th>
                        <th class="px-5 py-4 font-semibold w-24 text-center">Position</th>
                        <th class="px-5 py-4 font-semibold w-28 text-center">Status</th>
                        <th class="px-5 py-4 font-semibold w-56 text-right">Action</th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">

                    @forelse($features as $feature)

                        <tr class="hover:bg-gray-50">

                            <td class="px-5 py-4 align-middle">
                                {{ $feature->service?->title ?? '-' }}
                            </td>

                            <td class="px-5 py-4 align-middle font-medium text-gray-900">
                                {{ $feature->title }}
                            </td>

                            <td class="px-5 py-4 align-middle text-gray-600">
                                {{ $feature->icon ?? '-' }}
                            </td>

                            <td class="px-5 py-4 align-middle text-center">
                                {{ $feature->position }}
                            </td>

                            <td class="px-5 py-4 align-middle text-center">
                                @if($feature->status)
                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                                    Active
                                </span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs">
                                    Inactive
                                </span>
                                @endif
                            </td>

                            <td class="px-5 py-4 align-middle">
                                <div class="flex justify-end gap-2 whitespace-nowrap">

                                    <a href="{{ route('admin.service-features.show', $feature->id) }}"
                                       class="bg-slate-600 hover:bg-slate-700 text-white px-3 py-2 rounded-lg">
                                        View
                                    </a>

                                    <a href="{{ route('admin.service-features.edit', $feature->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.service-features.destroy', $feature->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this feature?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-8 text-center text-gray-500">
                                No service feature found.
                            </td>
                        </tr>
                    @endforelse

                    </tbody>

                </table>

            </div>
        </div>
    </div>
@endsection
