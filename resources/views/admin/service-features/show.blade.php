@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="bg-white p-6 rounded-xl shadow">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Service Feature Details</h2>

                <a href="{{ route('admin.service-features.index') }}"
                   class="bg-gray-200 px-5 py-2 rounded-lg">
                    Back
                </a>
            </div>

            <div class="space-y-4">
                <p><strong>Service:</strong> {{ $serviceFeature->service?->title ?? '-' }}</p>
                <p><strong>Title:</strong> {{ $serviceFeature->title }}</p>
                <p><strong>Icon:</strong> {{ $serviceFeature->icon ?? '-' }}</p>
                <p><strong>Position:</strong> {{ $serviceFeature->position }}</p>
                <p><strong>Status:</strong> {{ $serviceFeature->status ? 'Active' : 'Inactive' }}</p>

                <div>
                    <strong>Description:</strong>
                    <div class="mt-2 bg-gray-50 p-4 rounded-lg leading-7">
                        {!! nl2br(e($serviceFeature->description)) !!}
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
