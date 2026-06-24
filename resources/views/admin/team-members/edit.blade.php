@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                Edit Team Member
            </h2>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-[#182235]">

            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 dark:border-red-900 dark:bg-red-950/30">
                    <ul class="list-disc list-inside text-sm text-red-600 dark:text-red-400">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.team-members.update', $teamMember->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('admin.team-members.form')

                <div class="mt-6 flex gap-3">
                    <button type="submit"
                            class="inline-flex h-11 items-center justify-center rounded-lg bg-blue-600 px-5 text-sm font-medium text-white transition hover:bg-blue-700">
                        Update Member
                    </button>

                    <a href="{{ route('admin.team-members.index') }}"
                       class="inline-flex h-11 items-center justify-center rounded-lg border border-gray-300 bg-gray-100 px-5 text-sm font-medium text-gray-700 transition hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                        Back
                    </a>
                </div>
            </form>

        </div>

    </div>
@endsection
