@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="bg-white p-6 rounded-xl shadow">

            <h2 class="text-2xl font-bold mb-6">
                Create Service
            </h2>

            <form action="{{ route('admin.services.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @include('admin.services.form')

                <div class="mt-6">
                    <button class="bg-blue-600 text-white px-5 py-2 rounded-lg">
                        Save Service
                    </button>
                </div>

            </form>

        </div>

    </div>
@endsection
