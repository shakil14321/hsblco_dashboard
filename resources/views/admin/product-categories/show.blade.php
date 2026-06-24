@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-[#182235]">

            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Product Category Details
                    </h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        View category image, name, slug and status
                    </p>
                </div>

                <a href="{{ route('admin.product-categories.index') }}"
                   class="inline-flex h-11 items-center justify-center rounded-lg border border-gray-300 bg-gray-100 px-5 text-sm font-medium text-gray-700 transition hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    Back
                </a>
            </div>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-5 text-center dark:border-gray-700 dark:bg-[#111827]">

                    @if($productCategory->image)
                        <img src="{{ asset('storage/'.$productCategory->image) }}"
                             class="mx-auto h-36 w-48 rounded-xl border border-gray-200 bg-white object-contain p-3 dark:border-gray-700 dark:bg-white">
                    @else
                        <div class="mx-auto flex h-36 w-48 items-center justify-center rounded-xl border border-gray-200 bg-gray-100 text-gray-400 dark:border-gray-700 dark:bg-gray-800">
                            No Image
                        </div>
                    @endif

                    <h3 class="mt-5 text-2xl font-bold text-gray-800 dark:text-white">
                        {{ $productCategory->name }}
                    </h3>

                    <p class="mt-1 break-all text-sm text-gray-500 dark:text-gray-400">
                        {{ $productCategory->slug }}
                    </p>

                    <div class="mt-4">
                        @if($productCategory->status)
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

                <div class="lg:col-span-2 space-y-6">

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                            <h4 class="text-sm text-gray-500 dark:text-gray-400">Name</h4>
                            <p class="mt-2 font-medium text-gray-800 dark:text-white">
                                {{ $productCategory->name }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                            <h4 class="text-sm text-gray-500 dark:text-gray-400">Slug</h4>
                            <p class="mt-2 break-all font-medium text-gray-800 dark:text-white">
                                {{ $productCategory->slug }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                            <h4 class="text-sm text-gray-500 dark:text-gray-400">Position</h4>
                            <p class="mt-2 font-medium text-gray-800 dark:text-white">
                                {{ $productCategory->position }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-700 dark:bg-[#111827]">
                            <h4 class="text-sm text-gray-500 dark:text-gray-400">Status</h4>
                            <div class="mt-2">
                                @if($productCategory->status)
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

                </div>

            </div>

        </div>

    </div>
@endsection
