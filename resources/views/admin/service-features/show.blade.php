@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-[#182235]">

            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Service Feature Details
                    </h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        View service feature title, icon, position and description
                    </p>
                </div>

                <a href="{{ route('admin.service-features.index') }}"
                   class="inline-flex h-11 items-center justify-center rounded-lg border border-gray-300 bg-gray-100 px-5 text-sm font-medium text-gray-700 transition hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    Back
                </a>
            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">Service</h4>
                    <p class="mt-2 font-medium text-gray-800 dark:text-white">
                        {{ $serviceFeature->service?->title ?? '-' }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">Title</h4>
                    <p class="mt-2 font-medium text-gray-800 dark:text-white">
                        {{ $serviceFeature->title }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">Icon</h4>
                    <p class="mt-2 font-medium text-gray-800 dark:text-white">
                        {{ $serviceFeature->icon ?? '-' }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">Position</h4>
                    <p class="mt-2 font-medium text-gray-800 dark:text-white">
                        {{ $serviceFeature->position }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">Status</h4>

                    <div class="mt-2">
                        @if($serviceFeature->status)
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

                <div class="md:col-span-2 rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="mb-3 text-sm font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                        Description
                    </h4>

                    <div class="leading-7 text-gray-700 dark:text-gray-300">
                        {!! nl2br(e($serviceFeature->description)) !!}
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
