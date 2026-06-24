@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-[#182235]">

            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Team Member Details
                    </h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        View team member profile and social information
                    </p>
                </div>

                <a href="{{ route('admin.team-members.index') }}"
                   class="inline-flex h-11 items-center justify-center rounded-lg border border-gray-300 bg-gray-100 px-5 text-sm font-medium text-gray-700 transition hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    Back
                </a>
            </div>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 text-center dark:border-gray-700 dark:bg-[#111827]">

                    @if($teamMember->image)
                        <img src="{{ asset('storage/'.$teamMember->image) }}"
                             class="mx-auto h-40 w-40 rounded-2xl border border-gray-200 object-cover dark:border-gray-700">
                    @else
                        <div class="mx-auto flex h-40 w-40 items-center justify-center rounded-2xl border border-gray-200 bg-gray-100 text-4xl font-bold text-gray-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">
                            {{ strtoupper(substr($teamMember->name, 0, 1)) }}
                        </div>
                    @endif

                    <h3 class="mt-5 text-2xl font-bold text-gray-800 dark:text-white">
                        {{ $teamMember->name }}
                    </h3>

                    <p class="mt-1 text-gray-500 dark:text-gray-400">
                        {{ $teamMember->designation }}
                    </p>

                    <div class="mt-4">
                        @if($teamMember->status)
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

                <div class="lg:col-span-2 space-y-6">

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                            <h4 class="text-sm text-gray-500 dark:text-gray-400">Position</h4>
                            <p class="mt-2 font-medium text-gray-800 dark:text-white">
                                {{ $teamMember->position }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                            <h4 class="text-sm text-gray-500 dark:text-gray-400">Facebook</h4>
                            <p class="mt-2 break-all text-gray-800 dark:text-white">
                                {{ $teamMember->facebook ?? '-' }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                            <h4 class="text-sm text-gray-500 dark:text-gray-400">Twitter</h4>
                            <p class="mt-2 break-all text-gray-800 dark:text-white">
                                {{ $teamMember->twitter ?? '-' }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                            <h4 class="text-sm text-gray-500 dark:text-gray-400">LinkedIn</h4>
                            <p class="mt-2 break-all text-gray-800 dark:text-white">
                                {{ $teamMember->linkedin ?? '-' }}
                            </p>
                        </div>

                    </div>

                    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                        <h4 class="mb-3 text-sm font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                            Bio
                        </h4>

                        <p class="leading-7 text-gray-700 dark:text-gray-300">
                            {{ $teamMember->bio ?? '-' }}
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
