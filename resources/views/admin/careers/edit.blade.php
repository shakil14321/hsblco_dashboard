@extends('layouts.master')

@section('content')
    <div class="p-6">
        <div class="bg-white p-6 rounded-xl shadow">

            <h2 class="text-2xl font-bold mb-6">Edit Career</h2>

            @if ($errors->any())
                <div class="mb-4 bg-red-100 text-red-700 p-4 rounded-lg">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.careers.update', $career->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.careers.form')

                <div class="mt-6 flex gap-3">
                    <button class="bg-blue-600 text-white px-5 py-2 rounded-lg">
                        Update Career
                    </button>

                    <a href="{{ route('admin.careers.index') }}"
                       class="bg-gray-200 px-5 py-2 rounded-lg">
                        Back
                    </a>
                </div>
            </form>

        </div>
    </div>
@endsection
