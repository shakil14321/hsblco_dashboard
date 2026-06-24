@extends('layouts.master')

@section('content')
    <div class="p-6">



        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-[#182235]">

            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                    Quotation Details
                </h2>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Customer quotation request information
                </p>

                <a href="{{ route('admin.quotations.index') }}"
                   class="inline-flex h-11 items-center justify-center rounded-lg border border-gray-300 bg-gray-100 px-5 text-sm font-medium text-gray-700 transition hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    Back
                </a>
            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">
                        Customer Type
                    </h4>

                    <p class="mt-2 font-medium capitalize text-gray-800 dark:text-white">
                        {{ $quotation->customer_type }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">
                        Service
                    </h4>

                    <p class="mt-2 font-medium text-gray-800 dark:text-white">
                        {{ $quotation->service?->title ?? 'N/A' }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">
                        Name / Company Name
                    </h4>

                    <p class="mt-2 font-medium text-gray-800 dark:text-white">
                        {{ $quotation->name }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">
                        Email Address
                    </h4>

                    <p class="mt-2 break-all font-medium text-gray-800 dark:text-white">
                        {{ $quotation->email }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">
                        Phone Number
                    </h4>

                    <p class="mt-2 font-medium text-gray-800 dark:text-white">
                        {{ $quotation->phone }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">
                        Address
                    </h4>

                    <p class="mt-2 font-medium text-gray-800 dark:text-white">
                        {{ $quotation->address ?? 'N/A' }}
                    </p>
                </div>

                <div class="md:col-span-2 rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="mb-3 text-sm font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                        Message
                    </h4>

                    <div class="leading-7 text-gray-700 dark:text-gray-300">
                        {{ $quotation->message ?? 'N/A' }}
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
