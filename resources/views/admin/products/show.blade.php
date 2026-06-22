@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="bg-white p-6 rounded-xl shadow">

            <h2 class="text-2xl font-bold mb-6">
                Product Details
            </h2>

            @if($product->image)

                <img
                    src="{{ asset('storage/'.$product->image) }}"
                    class="w-60 rounded mb-5">

            @endif

            <div class="space-y-3">

                <p>
                    <strong>Name:</strong>
                    {{ $product->name }}
                </p>

                <p>
                    <strong>Category:</strong>
                    {{ $product->category?->name }}
                </p>

                <p>
                    <strong>Featured:</strong>
                    {{ $product->featured ? 'Yes' : 'No' }}
                </p>

                <p>
                    <strong>Status:</strong>
                    {{ $product->status ? 'Active' : 'Inactive' }}
                </p>

            </div>

            <hr class="my-5">

            <h4 class="font-bold mb-2">
                Short Description
            </h4>

            <p>
                {{ $product->short_description }}
            </p>

            <hr class="my-5">

            <h4 class="font-bold mb-2">
                Description
            </h4>

            <div>
                {!! nl2br(e($product->description)) !!}
            </div>

        </div>

    </div>

@endsection
