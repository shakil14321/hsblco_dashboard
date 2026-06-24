@extends('layouts.master')

@section('content')

    <div class="px-6 py-8">

{{--        <div class="mb-6 flex items-center justify-between">--}}
{{--            <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">--}}
{{--                Quotations--}}
{{--            </h1>--}}
{{--        </div>--}}



        <div
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-[#101828]">

            @if(session('success'))
                <div
                    class="mb-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-400">
                    {{ session('success') }}
                </div>
            @endif
            <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-800">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                    Quotations Table
                </h2>
            </div>

            <div class="p-6">

                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-700 dark:bg-[#182132]">

                    <div class="overflow-x-auto">

                        <table class="min-w-full table-fixed">

                            <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-700">

                                <th class="w-[5%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    #
                                </th>

                                <th class="w-[9%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Type
                                </th>

                                <th class="w-[14%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Service
                                </th>

                                <th class="w-[14%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Name
                                </th>

                                <th class="w-[17%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Email
                                </th>

                                <th class="w-[11%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Phone
                                </th>

                                <th class="w-[14%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Date & Time
                                </th>

                                <th class="w-[8%] px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Status
                                </th>

                                <th class="w-[12%] px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Action
                                </th>

                            </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                            @forelse($quotations as $quotation)

                                <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-800/50">

                                    <td class="px-6 py-5 text-sm text-gray-300">
                                        {{ $loop->iteration + ($quotations->currentPage() - 1) * $quotations->perPage() }}
                                    </td>

                                    <td class="px-6 py-5 text-sm capitalize text-gray-300">
                                        {{ $quotation->customer_type }}
                                    </td>

                                    <td class="px-6 py-5 text-sm text-gray-300">
                                        {{ $quotation->service?->title ?? '-' }}
                                    </td>

                                    <td class="px-6 py-5 text-sm font-semibold text-white">
                                        {{ $quotation->name }}
                                    </td>

                                    <td class="px-6 py-5 text-sm text-gray-300 truncate">
                                        {{ $quotation->email }}
                                    </td>

                                    <td class="px-6 py-5 text-sm text-gray-300">
                                        {{ $quotation->phone }}
                                    </td>

                                    <td class="px-6 py-5 text-sm text-gray-300">
                                        <div>
                                            {{ $quotation->created_at->format('d M Y') }}
                                        </div>
                                        <div class="text-xs text-gray-500 mt-1">
                                            {{ $quotation->created_at->format('h:i A') }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-5 text-center">

                                        @if($quotation->status == 0)
                                            <span
                                                class="inline-flex rounded-full bg-yellow-500/15 px-3 py-1 text-xs font-medium text-yellow-400">
                                                Pending
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex rounded-full bg-green-500/15 px-3 py-1 text-xs font-medium text-green-400">
                                                Seen
                                            </span>
                                        @endif

                                    </td>

                                    <td class="px-6 py-5 text-center">

                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('admin.quotations.send-mail.form', $quotation->id) }}"
                                               class="rounded-lg bg-purple-600 px-3 py-2 text-sm font-medium text-white transition hover:bg-purple-700">
                                                Send Mail
                                            </a>

                                            <a href="{{ route('admin.quotations.show', $quotation->id) }}"
                                               class="rounded-lg bg-blue-600 px-3 py-2 text-sm font-medium text-white transition hover:bg-blue-700">
                                                View
                                            </a>

                                            <form action="{{ route('admin.quotations.destroy', $quotation->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this quotation?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="rounded-lg bg-red-600 px-3 py-2 text-sm font-medium text-white transition hover:bg-red-700">
                                                    Delete
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="9"
                                        class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                                        No quotation found.
                                    </td>
                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        @if($quotations->hasPages())
            <div class="mt-6">
                {{ $quotations->links() }}
            </div>
        @endif

    </div>

@endsection
