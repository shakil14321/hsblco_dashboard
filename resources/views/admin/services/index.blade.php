@extends('layouts.master')

@section('content')

    <div class="px-6 py-8">

        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">
                Services
            </h1>

            <a href="{{ route('admin.services.create') }}"
               class="inline-flex items-center rounded-lg bg-blue-600 px-5 py-3 text-sm font-medium text-white hover:bg-blue-700 transition">
                Add Service
            </a>
        </div>

        @if(session('success'))
            <div class="mb-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-400">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-[#101828]">

            <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-800">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                    Services Table
                </h2>
            </div>

            <div class="p-6">
                <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-700 dark:bg-[#182132]">
                    <div class="overflow-x-auto">

                        <table class="min-w-full table-fixed">

                            <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th class="w-[16%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Image
                                </th>
                                <th class="w-[18%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Title
                                </th>
                                <th class="w-[18%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Icon
                                </th>
                                <th class="w-[14%] px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Featured
                                </th>
                                <th class="w-[14%] px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Status
                                </th>
                                <th class="w-[20%] px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Action
                                </th>
                            </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                            @forelse($services as $service)

                                <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-800/50">

                                    <td class="px-6 py-5 align-middle">
                                        @if($service->image)
                                            <img src="{{ asset('storage/'.$service->image) }}"
                                                 class="h-16 w-16 rounded-lg border border-gray-200 object-cover dark:border-gray-700"
                                                 alt="{{ $service->title }}">
                                        @else
                                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                            No Image
                                        </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-5 align-middle text-sm font-semibold text-gray-800 dark:text-white">
                                        {{ $service->title }}
                                    </td>

                                    <td class="px-6 py-5 align-middle text-sm text-gray-600 dark:text-gray-300">
                                        {{ $service->icon ?? '-' }}
                                    </td>

                                    <td class="px-6 py-5 text-center align-middle">
                                        @if($service->featured)
                                            <span class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700 dark:bg-blue-500/15 dark:text-blue-400">
                                            Yes
                                        </span>
                                        @else
                                            <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700 dark:bg-gray-500/15 dark:text-gray-400">
                                            No
                                        </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-5 text-center align-middle">
                                        @if($service->status)
                                            <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700 dark:bg-green-500/15 dark:text-green-400">
                                            Active
                                        </span>
                                        @else
                                            <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700 dark:bg-red-500/15 dark:text-red-400">
                                            Inactive
                                        </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-5 text-center align-middle">
                                        <div class="inline-flex items-center justify-center gap-2 whitespace-nowrap">

                                            <a href="{{ route('admin.services.show', $service->id) }}"
                                               class="rounded-lg bg-slate-600 px-3 py-2 text-sm font-medium text-white hover:bg-slate-700 transition">
                                                View
                                            </a>

                                            <a href="{{ route('admin.services.edit', $service->id) }}"
                                               class="rounded-lg bg-amber-500 px-3 py-2 text-sm font-medium text-white hover:bg-amber-600 transition">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.services.destroy', $service->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this service?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="rounded-lg bg-red-600 px-3 py-2 text-sm font-medium text-white hover:bg-red-700 transition">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                                        No services found.
                                    </td>
                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
