@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="bg-white p-6 rounded-xl shadow">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Blog Details</h2>

                <a href="{{ route('admin.blogs.index') }}"
                   class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg">
                    Back
                </a>
            </div>

            @if($blog->image)
                <img src="{{ asset('storage/'.$blog->image) }}"
                     class="w-full max-h-80 object-cover rounded-xl mb-6">
            @endif

            <h1 class="text-3xl font-bold mb-3">
                {{ $blog->title }}
            </h1>

            <div class="text-sm text-gray-500 mb-6">
                {{ $blog->author_name ?? 'Unknown Author' }}
                @if($blog->publish_date)
                    • {{ $blog->publish_date->format('M d, Y') }}
                @endif
            </div>

            <div class="mb-6">
                <h4 class="text-sm text-gray-500 mb-1">Short Description</h4>
                <p class="text-gray-700">
                    {{ $blog->short_description }}
                </p>
            </div>

            <div>
                <h4 class="text-sm text-gray-500 mb-1">Description</h4>
                <div class="text-gray-700 leading-7 bg-gray-50 p-4 rounded-lg">
                    {!! nl2br(e($blog->description)) !!}
                </div>
            </div>

        </div>

    </div>
@endsection
