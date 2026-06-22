@extends('layouts.master')

@section('content')
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Menus</h1>

            <a href="{{ route('admin.menus.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Add Menu
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Name</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Parent</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">URL</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Position</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                    <th class="px-4 py-3 text-right text-sm font-semibold text-gray-700">Action</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                @forelse($menus as $menu)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-gray-800">{{ $menu->name }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $menu->parent?->name ?? '-' }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $menu->url ?? '-' }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $menu->position }}</td>
                        <td class="px-4 py-3">
                            @if($menu->status)
                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">Active</span>
                            @else
                                <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">Inactive</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.menus.edit', $menu->id) }}"
                               class="inline-block px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                Edit
                            </a>

                            <form action="{{ route('admin.menus.destroy', $menu->id) }}"
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
                            No menu found.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
