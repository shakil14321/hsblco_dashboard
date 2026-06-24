@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-[#182235]">

            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Contact Message Details
                    </h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        View sender information and message details
                    </p>
                </div>

                <a href="{{ route('admin.contact-messages.index') }}"
                   class="inline-flex h-11 items-center justify-center rounded-lg border border-gray-300 bg-gray-100 px-5 text-sm font-medium text-gray-700 transition hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    Back
                </a>
            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 mb-6">

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Name</p>
                    <p class="mt-2 font-semibold text-gray-800 dark:text-white">
                        {{ $contactMessage->name }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Email</p>
                    <p class="mt-2 break-all font-semibold text-gray-800 dark:text-white">
                        {{ $contactMessage->email }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Phone</p>
                    <p class="mt-2 font-semibold text-gray-800 dark:text-white">
                        {{ $contactMessage->phone ?? '-' }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Company Name</p>
                    <p class="mt-2 font-semibold text-gray-800 dark:text-white">
                        {{ $contactMessage->company_name ?? '-' }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>

                    <div class="mt-2">
                    <span class="rounded-full bg-blue-100 px-3 py-1 text-sm capitalize text-blue-700 dark:bg-blue-500/15 dark:text-blue-400">
                        {{ $contactMessage->status }}
                    </span>
                    </div>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Date</p>
                    <p class="mt-2 font-semibold text-gray-800 dark:text-white">
                        {{ $contactMessage->created_at?->format('d M, Y h:i A') }}
                    </p>
                </div>

            </div>

            <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">
                <h4 class="mb-3 text-sm font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                    Message
                </h4>

                <div class="leading-7 text-gray-700 dark:text-gray-300">
                    {!! nl2br(e($contactMessage->message)) !!}
                </div>
            </div>

            <div class="mt-6 flex gap-3">

                <a href="mailto:{{ $contactMessage->email }}"
                   class="inline-flex h-11 items-center justify-center rounded-lg bg-blue-600 px-5 text-sm font-medium text-white transition hover:bg-blue-700">
                    Reply by Email
                </a>

                <form action="{{ route('admin.contact-messages.destroy', $contactMessage->id) }}"
                      method="POST"
                      onsubmit="return confirm('Delete this message?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="inline-flex h-11 items-center justify-center rounded-lg bg-red-600 px-5 text-sm font-medium text-white transition hover:bg-red-700">
                        Delete
                    </button>
                </form>

            </div>

        </div>

    </div>
@endsection
