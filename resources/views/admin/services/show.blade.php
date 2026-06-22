@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="bg-white p-6 rounded-xl shadow">

            <h2 class="text-2xl font-bold mb-6">
                Service Details
            </h2>

            @if($service->image)
                <img src="{{ asset('storage/'.$service->image) }}"
                     class="w-64 rounded mb-6">
            @endif

            <div class="space-y-3">

                <p><strong>Title:</strong> {{ $service->title }}</p>
                <p><strong>Slug:</strong> {{ $service->slug }}</p>
                <p><strong>Icon:</strong> {{ $service->icon }}</p>
                <p><strong>Position:</strong> {{ $service->position }}</p>
                <p><strong>Featured:</strong> {{ $service->featured ? 'Yes' : 'No' }}</p>
                <p><strong>Status:</strong> {{ $service->status ? 'Active' : 'Inactive' }}</p>

            </div>

            <hr class="my-6">

            <h4 class="font-bold mb-2">Short Description</h4>
            <p>{{ $service->short_description }}</p>

            <hr class="my-6">

            <h4 class="font-bold mb-2">Description</h4>
            <div>{!! nl2br(e($service->description)) !!}</div>

        </div>

    </div>

@endsection
