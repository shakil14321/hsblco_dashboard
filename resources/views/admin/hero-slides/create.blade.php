@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                Create Hero Slide
            </h1>
        </div>

        <div
            class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm
               dark:border-gray-800 dark:bg-[#182235]">

            <form action="{{ route('admin.hero-slides.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @include('admin.hero-slides.form')

                <div class="mt-6">
                    <button
                        type="submit"
                        class="inline-flex h-11 items-center justify-center rounded-lg bg-blue-600 px-5 text-sm font-medium text-white transition hover:bg-blue-700">
                        Save Slide
                    </button>
                </div>

            </form>

        </div>

    </div>

@endsection
