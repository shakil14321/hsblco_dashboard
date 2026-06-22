@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="bg-white p-6 rounded-xl shadow">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Client Details</h2>

                <a href="{{ route('admin.clients.index') }}"
                   class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg">
                    Back
                </a>
            </div>

            <div class="flex gap-6 items-start">

                <div>
                    @if($client->logo)
                        <img src="{{ asset('storage/'.$client->logo) }}"
                             class="w-44 h-32 object-contain rounded-xl border bg-gray-50">
                    @else
                        <div class="w-44 h-32 rounded-xl border bg-gray-50 flex items-center justify-center text-gray-400">
                            No Logo
                        </div>
                    @endif
                </div>

                <div class="flex-1 space-y-4">

                    <div>
                        <h3 class="text-2xl font-bold">
                            {{ $client->company_name }}
                        </h3>
                    </div>

                    <div>
                        <strong>Website:</strong>
                        @if($client->website_url)
                            <a href="{{ $client->website_url }}" target="_blank"
                               class="text-blue-600 hover:underline">
                                {{ $client->website_url }}
                            </a>
                        @else
                            -
                        @endif
                    </div>

                    <div>
                        <strong>Position:</strong>
                        {{ $client->position }}
                    </div>

                    <div>
                        <strong>Status:</strong>
                        @if($client->status)
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                            Active
                        </span>
                        @else
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                            Inactive
                        </span>
                        @endif
                    </div>

                    <div class="flex gap-3 pt-4">
                        <a href="{{ route('admin.clients.edit', $client->id) }}"
                           class="bg-yellow-500 text-white px-5 py-2 rounded-lg">
                            Edit
                        </a>

                        <form action="{{ route('admin.clients.destroy', $client->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Delete Client?')"
                                    class="bg-red-600 text-white px-5 py-2 rounded-lg">
                                Delete
                            </button>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
