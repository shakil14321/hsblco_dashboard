@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-[#182235]">

            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Subscriber Details
                    </h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        View newsletter subscriber information
                    </p>
                </div>

                <a href="{{ route('admin.newsletter-subscribers.index') }}"
                   class="inline-flex h-11 items-center justify-center rounded-lg border border-gray-300 bg-gray-100 px-5 text-sm font-medium text-gray-700 transition hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    Back
                </a>
            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">
                        Email Address
                    </h4>

                    <p class="mt-2 break-all font-medium text-gray-800 dark:text-white">
                        {{ $newsletterSubscriber->email }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">
                        Status
                    </h4>

                    <div class="mt-2">
                        @if($newsletterSubscriber->status)
                            <span class="rounded-full bg-green-100 px-3 py-1 text-sm text-green-700 dark:bg-green-500/15 dark:text-green-400">
                            Active
                        </span>
                        @else
                            <span class="rounded-full bg-red-100 px-3 py-1 text-sm text-red-700 dark:bg-red-500/15 dark:text-red-400">
                            Inactive
                        </span>
                        @endif
                    </div>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827] md:col-span-2">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">
                        Subscription Date
                    </h4>

                    <p class="mt-2 font-medium text-gray-800 dark:text-white">
                        {{ $newsletterSubscriber->created_at?->format('d M, Y h:i A') }}
                    </p>
                </div>

            </div>

        </div>

    </div>
@endsection
