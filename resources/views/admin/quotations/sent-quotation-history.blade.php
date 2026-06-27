@extends('layouts.master')

@section('content')

    <div class="px-6 py-8">

        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">
                    Sent Quotation History
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    {{ $quotation->name }} - {{ $quotation->email }}
                </p>
            </div>

            <a href="{{ route('admin.quotations.sent-quotation', $quotation->id) }}"
               class="rounded-lg bg-gray-600 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
                Back
            </a>
        </div>

        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-[#101828]">

            <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-800">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                    All Sent Estimates
                </h2>
            </div>

            <div class="p-6">
                <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-700 dark:bg-[#182132]">
                    <div class="overflow-x-auto">

                        <table class="min-w-full table-fixed">

                            <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th class="w-[6%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    #
                                </th>

                                <th class="w-[14%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Quotation No
                                </th>

                                <th class="w-[14%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Service
                                </th>

                                <th class="w-[12%] px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Subtotal
                                </th>

                                <th class="w-[12%] px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Discount
                                </th>

                                <th class="w-[12%] px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Total
                                </th>

                                <th class="w-[16%] px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Sent Date
                                </th>

                                <th class="w-[14%] px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Action
                                </th>
                            </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                            @forelse($estimates as $estimate)

                                @php
                                    $subtotal =
                                        ($estimate->service_charge ?? 0) +
                                        ($estimate->domain_charge ?? 0) +
                                        ($estimate->hosting_charge ?? 0) +
                                        ($estimate->yearly_charge ?? 0) +
                                        ($estimate->monthly_charge ?? 0);

                                    $discount = $estimate->discount ?? 0;
                                    $total = $subtotal - $discount;
                                @endphp

                                <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-800/50">

                                    <td class="px-6 py-5 text-sm text-gray-300">
                                        {{ $loop->iteration + ($estimates->currentPage() - 1) * $estimates->perPage() }}
                                    </td>

                                    <td class="px-6 py-5 text-sm font-semibold text-white">
                                        QTN-{{ str_pad($estimate->id, 5, '0', STR_PAD_LEFT) }}
                                    </td>

                                    <td class="px-6 py-5 text-sm text-gray-300">
                                        {{ $quotation->service?->title }}
                                    </td>

                                    <td class="px-6 py-5 text-right text-sm text-gray-300">
                                        {{ number_format($subtotal, 2) }}
                                    </td>

                                    <td class="px-6 py-5 text-right text-sm text-red-400">
                                        - {{ number_format($discount, 2) }}
                                    </td>

                                    <td class="px-6 py-5 text-right text-sm font-bold text-blue-400">
                                        {{ number_format($total, 2) }}
                                    </td>

                                    <td class="px-6 py-5 text-sm text-gray-300">
                                        {{ $estimate->sent_at ? \Carbon\Carbon::parse($estimate->sent_at)->format('d M Y, h:i A') : '-' }}
                                    </td>

                                    <td class="px-6 py-5 text-center">
                                        <a href="{{ route('admin.quotations.estimate.pdf', $estimate->id) }}"
                                           target="_blank"
                                           class="rounded-lg bg-purple-600 px-3 py-2 text-sm font-medium text-white hover:bg-purple-700">
                                            View PDF
                                        </a>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="8" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                                        No sent quotation found.
                                    </td>
                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

        </div>

        @if($estimates->hasPages())
            <div class="mt-6">
                {{ $estimates->links() }}
            </div>
        @endif

    </div>

@endsection
