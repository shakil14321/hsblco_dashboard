@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                Edit FAQ
            </h2>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-[#182235]">

            <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.faqs.form')

                <div class="mt-6">
                    <button type="submit"
                            class="inline-flex h-11 items-center justify-center rounded-lg bg-blue-600 px-5 text-sm font-medium text-white transition hover:bg-blue-700">
                        Update FAQ
                    </button>
                </div>

            </form>

        </div>

    </div>

@endsection
