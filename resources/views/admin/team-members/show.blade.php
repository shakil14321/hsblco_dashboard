@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="bg-white p-6 rounded-xl shadow">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Team Member Details</h2>

                <a href="{{ route('admin.team-members.index') }}"
                   class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg">
                    Back
                </a>
            </div>

            <div class="flex gap-6 items-start">

                <div>
                    @if($teamMember->image)
                        <img src="{{ asset('storage/'.$teamMember->image) }}"
                             class="w-40 h-40 object-cover rounded-xl border">
                    @endif
                </div>

                <div class="flex-1 space-y-4">

                    <div>
                        <h3 class="text-2xl font-bold">
                            {{ $teamMember->name }}
                        </h3>

                        <p class="text-gray-500">
                            {{ $teamMember->designation }}
                        </p>
                    </div>

                    <div>
                        <strong>Position:</strong>
                        {{ $teamMember->position }}
                    </div>

                    <div>
                        <strong>Status:</strong>
                        @if($teamMember->status)
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                            Active
                        </span>
                        @else
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                            Inactive
                        </span>
                        @endif
                    </div>

                    <div>
                        <strong>Facebook:</strong>
                        {{ $teamMember->facebook ?? '-' }}
                    </div>

                    <div>
                        <strong>Twitter:</strong>
                        {{ $teamMember->twitter ?? '-' }}
                    </div>

                    <div>
                        <strong>LinkedIn:</strong>
                        {{ $teamMember->linkedin ?? '-' }}
                    </div>

                    <div>
                        <strong>Bio:</strong>
                        <p class="mt-2 bg-gray-50 p-4 rounded-lg leading-7">
                            {{ $teamMember->bio ?? '-' }}
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
