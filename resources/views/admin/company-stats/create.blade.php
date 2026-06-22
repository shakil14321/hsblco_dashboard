@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="bg-white p-6 rounded-xl shadow">

            <h2 class="text-2xl font-bold mb-6">
                Create Company Stat
            </h2>
            @if ($errors->any())
                <div class="mb-4 bg-red-100 text-red-700 p-4 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.company-stats.store') }}" method="POST">
                @csrf

                @include('admin.company-stats.form')

                <div class="mt-6">
                    <button class="bg-blue-600 text-white px-5 py-2 rounded-lg">
                        Save
                    </button>
                </div>

            </form>

        </div>

    </div>

@endsection
