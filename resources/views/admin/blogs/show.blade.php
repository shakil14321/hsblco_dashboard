@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-[#182235]">

            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Blog Details
                    </h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        View blog title, image, author and description
                    </p>
                </div>

                <a href="{{ route('admin.blogs.index') }}"
                   class="inline-flex h-11 items-center justify-center rounded-lg border border-gray-300 bg-gray-100 px-5 text-sm font-medium text-gray-700 transition hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    Back
                </a>
            </div>

            @if($blog->image)
                <div class="mb-6 overflow-hidden rounded-2xl border border-gray-200 bg-gray-100 dark:border-gray-700 dark:bg-[#111827]">
                    <img src="{{ asset('storage/'.$blog->image) }}"
                         alt="{{ $blog->title }}"
                         class="h-[360px] w-full object-contain p-4">
                </div>
            @endif

            <div class="mb-6 rounded-2xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-[#111827]">

                <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                    {{ $blog->title }}
                </h1>

                <div class="mt-3 flex flex-wrap items-center gap-3 text-sm text-gray-500 dark:text-gray-400">

                <span>
                    <strong class="text-gray-700 dark:text-gray-300">Author:</strong>
                    {{ $blog->author_name ?? 'Unknown Author' }}
                </span>

                    @if($blog->publish_date)
                        <span class="hidden sm:inline">•</span>
                        <span>
                        <strong class="text-gray-700 dark:text-gray-300">Publish Date:</strong>
                        {{ $blog->publish_date->format('M d, Y') }}
                    </span>
                    @endif

                </div>

            </div>

            <div class="grid grid-cols-1 gap-6">

                <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="mb-3 text-sm font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                        Short Description
                    </h4>

                    <p class="text-base leading-7 text-gray-700 dark:text-gray-300">
                        {{ $blog->short_description ?: 'No short description available.' }}
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                    <h4 class="mb-3 text-sm font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                        Description
                    </h4>

                    <div class="prose max-w-none text-base leading-8 text-gray-700 dark:text-gray-300">
                        {!! nl2br(e($blog->description)) !!}
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
