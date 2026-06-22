@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="bg-white rounded-xl shadow p-6">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Add Hero Feature</h1>

            <form action="{{ route('admin.hero-features.store') }}" method="POST">
                @csrf

                @include('admin.hero-features.form')

                <div class="flex items-center gap-3 mt-6">
                    <button type="submit"
                            class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Save
                    </button>

                    <a href="{{ route('admin.hero-features.index') }}"
                       class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                        Back
                    </a>
                </div>
            </form>
        </div>

    </div>
@endsection
