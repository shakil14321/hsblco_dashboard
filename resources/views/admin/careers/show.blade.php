@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="bg-white p-6 rounded-xl shadow">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Career Details</h2>

                <a href="{{ route('admin.careers.index') }}"
                   class="bg-gray-200 px-5 py-2 rounded-lg">
                    Back
                </a>
            </div>

            <div class="space-y-4">
                <p><strong>Title:</strong> {{ $career->title }}</p>
                <p><strong>Slug:</strong> {{ $career->slug }}</p>
                <p><strong>Location:</strong> {{ $career->location ?? '-' }}</p>
                <p><strong>Job Type:</strong> {{ $career->job_type ?? '-' }}</p>
                <p><strong>Salary:</strong> {{ $career->salary ?? '-' }}</p>
                <p><strong>Deadline:</strong> {{ $career->deadline ? $career->deadline->format('d M, Y') : '-' }}</p>
                <p><strong>Status:</strong> {{ $career->status ? 'Active' : 'Inactive' }}</p>

                <div>
                    <strong>Description:</strong>
                    <div class="mt-2 bg-gray-50 p-4 rounded-lg leading-7">
                        {!! nl2br(e($career->description)) !!}
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
