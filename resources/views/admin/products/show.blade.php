@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-[#182235]">

            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                    Product Details
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    View product image, category, featured status and description
                </p>
            </div>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 text-center dark:border-gray-700 dark:bg-[#111827]">

                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}"
                             class="mx-auto h-48 w-full rounded-xl border border-gray-200 bg-white object-contain p-3 dark:border-gray-700 dark:bg-white">
                    @else
                        <div class="mx-auto flex h-48 w-full items-center justify-center rounded-xl border border-gray-200 bg-gray-100 text-gray-400 dark:border-gray-700 dark:bg-gray-800">
                            No Image
                        </div>
                    @endif

                    <h3 class="mt-5 text-2xl font-bold text-gray-800 dark:text-white">
                        {{ $product->name }}
                    </h3>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        {{ $product->category?->name ?? 'No Category' }}
                    </p>

                </div>

                <div class="lg:col-span-2 space-y-6">

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                            <h4 class="text-sm text-gray-500 dark:text-gray-400">Name</h4>
                            <p class="mt-2 font-medium text-gray-800 dark:text-white">
                                {{ $product->name }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                            <h4 class="text-sm text-gray-500 dark:text-gray-400">Category</h4>
                            <p class="mt-2 font-medium text-gray-800 dark:text-white">
                                {{ $product->category?->name ?? '-' }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                            <h4 class="text-sm text-gray-500 dark:text-gray-400">Featured</h4>
                            <div class="mt-2">
                                @if($product->featured)
                                    <span class="rounded-full bg-blue-100 px-3 py-1 text-sm text-blue-700 dark:bg-blue-500/15 dark:text-blue-400">
                                    Yes
                                </span>
                                @else
                                    <span class="rounded-full bg-gray-100 px-3 py-1 text-sm text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                                    No
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                            <h4 class="text-sm text-gray-500 dark:text-gray-400">Status</h4>
                            <div class="mt-2">
                                @if($product->status)
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

                    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                        <h4 class="mb-3 text-sm font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                            Short Description
                        </h4>

                        <p class="leading-7 text-gray-700 dark:text-gray-300">
                            {{ $product->short_description ?? '-' }}
                        </p>
                    </div>

                    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                        <h4 class="mb-3 text-sm font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                            Description
                        </h4>

                        <div class="leading-7 text-gray-700 dark:text-gray-300">
                            {!! nl2br(e($product->description)) !!}
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
