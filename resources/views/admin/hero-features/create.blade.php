@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                Add Hero Feature
            </h1>
        </div>

        <div
            class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm
               dark:border-gray-800 dark:bg-[#182235]">

            <form action="{{ route('admin.hero-features.store') }}" method="POST">
                @csrf

                @include('admin.hero-features.form')

                <div class="flex items-center gap-3 mt-6">

                    <button
                        type="submit"
                        class="inline-flex h-11 items-center justify-center rounded-lg bg-blue-600 px-5 text-sm font-medium text-white transition hover:bg-blue-700">
                        Save
                    </button>

                    <a href="{{ route('admin.hero-features.index') }}"
                       class="inline-flex h-11 items-center justify-center rounded-lg border border-gray-300 bg-gray-100 px-5 text-sm font-medium text-gray-700 transition hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                        Back
                    </a>

                </div>
            </form>

        </div>

    </div>
@endsection
