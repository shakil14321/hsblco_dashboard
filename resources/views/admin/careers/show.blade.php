@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-[#182235]">

            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Career Details
                    </h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        View career title, location, salary, deadline and description
                    </p>
                </div>

                <a href="{{ route('admin.careers.index') }}"
                   class="inline-flex h-11 items-center justify-center rounded-lg border border-gray-300 bg-gray-100 px-5 text-sm font-medium text-gray-700 transition hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    Back
                </a>
            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">Title</h4>
                    <p class="mt-2 font-medium text-gray-800 dark:text-white">
                        {{ $career->title }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">Slug</h4>
                    <p class="mt-2 break-all font-medium text-gray-800 dark:text-white">
                        {{ $career->slug }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">Location</h4>
                    <p class="mt-2 font-medium text-gray-800 dark:text-white">
                        {{ $career->location ?? '-' }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">Job Type</h4>
                    <p class="mt-2 font-medium text-gray-800 dark:text-white">
                        {{ $career->job_type ?? '-' }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">Salary</h4>
                    <p class="mt-2 font-medium text-gray-800 dark:text-white">
                        {{ $career->salary ?? '-' }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">Deadline</h4>
                    <p class="mt-2 font-medium text-gray-800 dark:text-white">
                        {{ $career->deadline ? $career->deadline->format('d M, Y') : '-' }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">Department</h4>
                    <p class="mt-2 font-medium text-gray-800 dark:text-white">
                        {{ $career->department ?? '-' }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">Tech Stack</h4>
                    <p class="mt-2 font-medium text-gray-800 dark:text-white">
                        {{ $career->tech_stack ?? '-' }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">Apply URL</h4>
                    <p class="mt-2 break-all font-medium text-blue-600 dark:text-blue-400">
                        {{ $career->apply_url ?? '-' }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="text-sm text-gray-500 dark:text-gray-400">Status</h4>

                    <div class="mt-2">
                        @if($career->status)
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
                        {!! nl2br(e($career->description)) !!}
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
