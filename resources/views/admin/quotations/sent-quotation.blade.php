@extends('layouts.master')

@section('content')

    <div class="px-6 py-8">

        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">
                Latest Sent Quotation
            </h1>

            <a href="{{ route('admin.quotations.index') }}"
               class="rounded-lg bg-gray-600 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
                Back
            </a>
        </div>

        @if(!$quotation->latestEstimate)

            <div class="rounded-xl border border-yellow-300 bg-yellow-50 p-5 text-yellow-700">
                No sent quotation found.
            </div>

        @else

            @php
                $estimate = $quotation->latestEstimate;

                $subtotal =
                    ($estimate->service_charge ?? 0) +
                    ($estimate->domain_charge ?? 0) +
                    ($estimate->hosting_charge ?? 0) +
                    ($estimate->yearly_charge ?? 0) +
                    ($estimate->monthly_charge ?? 0);

                $discount = $estimate->discount ?? 0;
                $total = $subtotal - $discount;
            @endphp

            <div class="rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-[#101828]">

                <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-800 flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                        QTN-{{ str_pad($estimate->id, 5, '0', STR_PAD_LEFT) }}
                    </h2>

                    <a href="{{ route('admin.quotations.sent-quotation-history', $quotation->id) }}"
                       class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                        See More
                    </a>
                </div>

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5 text-gray-700 dark:text-gray-300">

                    <div>
                        <p class="text-sm text-gray-500">Customer</p>
                        <p class="font-semibold">{{ $quotation->name }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="font-semibold">{{ $quotation->email }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Service</p>
                        <p class="font-semibold">{{ $quotation->service?->title }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Sent At</p>
                        <p class="font-semibold">
                            {{ $estimate->sent_at ? \Carbon\Carbon::parse($estimate->sent_at)->format('d M Y, h:i A') : '-' }}
                        </p>
                    </div>

                </div>

                <div class="p-6 pt-0">

                    <table class="w-full rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        <tr>
                            <td class="p-4 text-gray-500">Service Charge</td>
                            <td class="p-4 text-right text-gray-800 dark:text-white">
                                {{ number_format($estimate->service_charge, 2) }}
                            </td>
                        </tr>

                        <tr>
                            <td class="p-4 text-gray-500">Domain Charge</td>
                            <td class="p-4 text-right text-gray-800 dark:text-white">
                                {{ number_format($estimate->domain_charge, 2) }}
                            </td>
                        </tr>

                        <tr>
                            <td class="p-4 text-gray-500">Hosting Charge</td>
                            <td class="p-4 text-right text-gray-800 dark:text-white">
                                {{ number_format($estimate->hosting_charge, 2) }}
                            </td>
                        </tr>

                        <tr>
                            <td class="p-4 text-gray-500">Yearly Charge</td>
                            <td class="p-4 text-right text-gray-800 dark:text-white">
                                {{ number_format($estimate->yearly_charge, 2) }}
                            </td>
                        </tr>

                        <tr>
                            <td class="p-4 text-gray-500">Monthly Charge</td>
                            <td class="p-4 text-right text-gray-800 dark:text-white">
                                {{ number_format($estimate->monthly_charge, 2) }}
                            </td>
                        </tr>

                        <tr>
                            <td class="p-4 text-gray-500">Subtotal</td>
                            <td class="p-4 text-right text-gray-800 dark:text-white">
                                {{ number_format($subtotal, 2) }}
                            </td>
                        </tr>

                        <tr>
                            <td class="p-4 text-red-500">Discount</td>
                            <td class="p-4 text-right text-red-500">
                                - {{ number_format($discount, 2) }}
                            </td>
                        </tr>

                        <tr>
                            <td class="p-4 text-lg font-bold text-blue-600">Total</td>
                            <td class="p-4 text-right text-lg font-bold text-blue-600">
                                {{ number_format($total, 2) }}
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    @if($estimate->note)
                        <div class="mt-6 rounded-xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#182132]">
                            <p class="mb-2 text-sm font-semibold text-gray-500">Note</p>
                            <p class="text-gray-700 dark:text-gray-300">{{ $estimate->note }}</p>
                        </div>
                    @endif

                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('admin.quotations.estimate.pdf', $estimate->id) }}"
                           target="_blank"
                           class="rounded-lg bg-purple-600 px-4 py-2 text-sm font-medium text-white hover:bg-purple-700">
                            View PDF
                        </a>
                    </div>

                </div>

            </div>

        @endif

    </div>

@endsection
