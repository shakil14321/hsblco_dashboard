@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-[#182235]">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                    FAQ Details
                </h2>

                <a href="{{ route('admin.faqs.index') }}"
                   class="inline-flex h-11 items-center justify-center rounded-lg border border-gray-300 bg-gray-100 px-5 text-sm font-medium text-gray-700 transition hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    Back
                </a>
            </div>

            <div class="space-y-5">

                <div>
                    <h4 class="text-sm text-gray-500 dark:text-gray-400 mb-1">Question</h4>
                    <p class="text-lg font-semibold text-gray-800 dark:text-white/90">
                        {{ $faq->question }}
                    </p>
                </div>

                <div>
                    <h4 class="text-sm text-gray-500 dark:text-gray-400 mb-1">Answer</h4>
                    <div class="leading-7 rounded-lg bg-gray-50 p-4 text-gray-700 dark:bg-[#111827] dark:text-gray-300">
                        {!! nl2br(e($faq->answer)) !!}
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <h4 class="text-sm text-gray-500 dark:text-gray-400 mb-1">Position</h4>
                        <p class="text-gray-800 dark:text-white/90">{{ $faq->position }}</p>
                    </div>

                    <div>
                        <h4 class="text-sm text-gray-500 dark:text-gray-400 mb-1">Status</h4>

                        @if($faq->status)
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

            </div>

            <div class="mt-6 flex gap-3">

                <a href="{{ route('admin.faqs.edit', $faq->id) }}"
                   class="inline-flex h-11 items-center justify-center rounded-lg bg-yellow-500 px-5 text-sm font-medium text-white transition hover:bg-yellow-600">
                    Edit
                </a>

                <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            onclick="return confirm('Delete FAQ?')"
                            class="inline-flex h-11 items-center justify-center rounded-lg bg-red-600 px-5 text-sm font-medium text-white transition hover:bg-red-700">
                        Delete
                    </button>
                </form>

            </div>

        </div>

    </div>

@endsection
