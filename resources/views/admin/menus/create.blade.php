@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                Add Menu
            </h1>
        </div>

        <div
            class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm
               dark:border-gray-800 dark:bg-[#182235]">

            <form action="{{ route('admin.menus.store') }}" method="POST">
                @csrf

                @include('admin.menus.form')

                <div class="flex items-center gap-3 mt-6">

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center h-11 px-5
                           rounded-lg bg-blue-600 text-white font-medium
                           hover:bg-blue-700 transition">
                        Save
                    </button>

                    <a href="{{ route('admin.menus.index') }}"
                       class="inline-flex items-center justify-center h-11 px-5
                          rounded-lg border border-gray-300
                          bg-gray-100 text-gray-700 font-medium
                          hover:bg-gray-200 transition
                          dark:border-gray-700
                          dark:bg-gray-800
                          dark:text-gray-300
                          dark:hover:bg-gray-700">
                        Back
                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection
