@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                Create Company Stat
            </h2>
        </div>

        <div
            class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm
               dark:border-gray-800 dark:bg-[#182235]">

            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 dark:border-red-900 dark:bg-red-950/30">
                    <ul class="list-disc list-inside text-sm text-red-600 dark:text-red-400">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.company-stats.store') }}" method="POST">
                @csrf

                @include('admin.company-stats.form')

                <div class="mt-6">
                    <button
                        type="submit"
                        class="inline-flex h-11 items-center justify-center rounded-lg bg-blue-600 px-5 text-sm font-medium text-white transition hover:bg-blue-700">
                        Save
                    </button>
                </div>

            </form>

        </div>

    </div>

@endsection
