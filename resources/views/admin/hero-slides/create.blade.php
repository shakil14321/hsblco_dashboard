@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="bg-white rounded-xl shadow p-6">

            <h1 class="text-2xl font-bold mb-6">
                Create Hero Slide
            </h1>

            <form action="{{ route('admin.hero-slides.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @include('admin.hero-slides.form')

                <div class="mt-6">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
                        Save Slide
                    </button>
                </div>

            </form>

        </div>

    </div>

@endsection
