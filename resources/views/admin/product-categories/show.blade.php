@extends('layouts.master')

@section('content')
    <div class="p-6">
        <div class="bg-white p-6 rounded-xl shadow">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Product Category Details</h2>
                <a href="{{ route('admin.product-categories.index') }}" class="bg-gray-200 px-5 py-2 rounded-lg">Back</a>
            </div>

            @if($productCategory->image)
                <img src="{{ asset('storage/'.$productCategory->image) }}"
                     class="w-48 h-36 object-cover rounded-lg border mb-5">
            @endif

            <div class="space-y-3">
                <p><strong>Name:</strong> {{ $productCategory->name }}</p>
                <p><strong>Slug:</strong> {{ $productCategory->slug }}</p>
                <p><strong>Position:</strong> {{ $productCategory->position }}</p>
                <p>
                    <strong>Status:</strong>
                    {{ $productCategory->status ? 'Active' : 'Inactive' }}
                </p>
            </div>
        </div>
    </div>
@endsection
