@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                Create Service Feature
            </h2>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-[#182235]">

            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 dark:border-red-900 dark:bg-red-950/30">
                    @foreach ($errors->all() as $error)
                        <p class="text-sm text-red-600 dark:text-red-400">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.service-features.store') }}" method="POST">
                @csrf

                @include('admin.service-features.form')

                <div class="mt-6 flex gap-3">
                    <button type="submit"
                            class="inline-flex h-11 items-center justify-center rounded-lg bg-blue-600 px-5 text-sm font-medium text-white transition hover:bg-blue-700">
                        Save Feature
                    </button>

                    <a href="{{ route('admin.service-features.index') }}"
                       class="inline-flex h-11 items-center justify-center rounded-lg border border-gray-300 bg-gray-100 px-5 text-sm font-medium text-gray-700 transition hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                        Back
                    </a>
                </div>
            </form>

        </div>

    </div>
@endsection
