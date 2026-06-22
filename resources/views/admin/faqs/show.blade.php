@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="bg-white p-6 rounded-xl shadow">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">
                    FAQ Details
                </h2>

                <a href="{{ route('admin.faqs.index') }}"
                   class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg">
                    Back
                </a>
            </div>

            <div class="space-y-5">

                <div>
                    <h4 class="text-sm text-gray-500 mb-1">Question</h4>
                    <p class="text-lg font-semibold text-gray-800">
                        {{ $faq->question }}
                    </p>
                </div>

                <div>
                    <h4 class="text-sm text-gray-500 mb-1">Answer</h4>
                    <div class="text-gray-700 leading-7 bg-gray-50 p-4 rounded-lg">
                        {!! nl2br(e($faq->answer)) !!}
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-5">

                    <div>
                        <h4 class="text-sm text-gray-500 mb-1">Position</h4>
                        <p class="text-gray-800">{{ $faq->position }}</p>
                    </div>

                    <div>
                        <h4 class="text-sm text-gray-500 mb-1">Status</h4>

                        @if($faq->status)
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                            Active
                        </span>
                        @else
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                            Inactive
                        </span>
                        @endif
                    </div>

                </div>

            </div>

            <div class="mt-6 flex gap-3">

                <a href="{{ route('admin.faqs.edit', $faq->id) }}"
                   class="bg-yellow-500 text-white px-5 py-2 rounded-lg">
                    Edit
                </a>

                <form action="{{ route('admin.faqs.destroy', $faq->id) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')

                    <button onclick="return confirm('Delete FAQ?')"
                            class="bg-red-600 text-white px-5 py-2 rounded-lg">
                        Delete
                    </button>
                </form>

            </div>

        </div>

    </div>

@endsection
