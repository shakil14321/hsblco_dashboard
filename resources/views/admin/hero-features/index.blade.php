@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Hero Features</h1>

            <a href="{{ route('admin.hero-features.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Add Feature
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left">Slide</th>
                    <th class="px-4 py-3 text-left">Title</th>
                    <th class="px-4 py-3 text-left">Icon</th>
                    <th class="px-4 py-3 text-left">Position</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-right">Action</th>
                </tr>
                </thead>

                <tbody class="divide-y">
                @forelse($features as $feature)
                    <tr>
                        <td class="px-4 py-3">
                            {{ $feature->heroSlide?->title ?? '-' }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $feature->title }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $feature->icon ?? '-' }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $feature->position }}
                        </td>

                        <td class="px-4 py-3">
                            @if($feature->status)
                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">Active</span>
                            @else
                                <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">Inactive</span>
                            @endif
                        </td>

                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.hero-features.edit', $feature->id) }}"
                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                Edit
                            </a>

                            <form action="{{ route('admin.hero-features.destroy', $feature->id) }}"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')

                                <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                            No hero feature found.
                        </td>
                    </tr>
                @endforelse
                </tbody>

            </table>
        </div>

    </div>
@endsection
