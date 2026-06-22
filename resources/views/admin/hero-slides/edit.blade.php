@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="bg-white rounded-xl shadow p-6">

            <h1 class="text-2xl font-bold mb-6">
                Edit Hero Slide
            </h1>

            <form action="{{ route('admin.hero-slides.update',$heroSlide->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @include('admin.hero-slides.form')

                <div class="mt-6 flex gap-3">

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
                        Update Slide
                    </button>

                    <a href="{{ route('admin.hero-slides.index') }}"
                       class="bg-gray-300 hover:bg-gray-400 px-5 py-2 rounded-lg">
                        Back
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
