@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Services</h2>

            <a href="{{ route('admin.services.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
                Add Service
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
                        <th class="px-5 py-4 font-semibold w-28">Image</th>
                        <th class="px-5 py-4 font-semibold">Title</th>
                        <th class="px-5 py-4 font-semibold">Icon</th>
                        <th class="px-5 py-4 font-semibold w-28 text-center">Featured</th>
                        <th class="px-5 py-4 font-semibold w-28 text-center">Status</th>
                        <th class="px-5 py-4 font-semibold w-56 text-right">Action</th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">

                    @forelse($services as $service)

                        <tr class="hover:bg-gray-50">

                            <td class="px-5 py-4 align-middle">
                                @if($service->image)
                                    <img src="{{ asset('storage/'.$service->image) }}"
                                         class="w-16 h-16 object-cover rounded-lg border">
                                @else
                                    <span class="text-gray-400">No Image</span>
                                @endif
                            </td>

                            <td class="px-5 py-4 align-middle font-medium text-gray-900">
                                {{ $service->title }}
                            </td>

                            <td class="px-5 py-4 align-middle text-gray-600">
                                {{ $service->icon ?? '-' }}
                            </td>

                            <td class="px-5 py-4 align-middle text-center">
                                @if($service->featured)
                                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs">
                                    Yes
                                </span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-xs">
                                    No
                                </span>
                                @endif
                            </td>

                            <td class="px-5 py-4 align-middle text-center">
                                @if($service->status)
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

                                    <a href="{{ route('admin.services.show', $service->id) }}"
                                       class="bg-slate-600 hover:bg-slate-700 text-white px-3 py-2 rounded-lg">
                                        View
                                    </a>

                                    <a href="{{ route('admin.services.edit', $service->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.services.destroy', $service->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this service?')">
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
                                No services found.
                            </td>
                        </tr>
                    @endforelse

                    </tbody>

                </table>

            </div>
        </div>

    </div>

@endsection
