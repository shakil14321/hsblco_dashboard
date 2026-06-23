@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Clients</h2>

            <a href="{{ route('admin.clients.create') }}"
               class="bg-blue-600 text-white px-5 py-2 rounded-lg">
                Add Client
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-700 p-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-slate-100">
                <tr>
                    <th class="p-4 text-left">Logo</th>
                    <th class="p-4 text-left">Company Name</th>
                    <th class="p-4 text-left">Website</th>
                    <th class="p-4 text-left">Position</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-right">Action</th>
                </tr>
                </thead>

                <tbody>
                @forelse($clients as $client)
                    <tr class="border-t">
                        <td class="p-4">
                            @if($client->logo)
                                <img src="{{ asset('storage/'.$client->logo) }}"
                                     class="w-20 h-14 object-contain rounded border bg-gray-50">
                            @else
                                -
                            @endif
                        </td>

                        <td class="p-4">{{ $client->company_name }}</td>

                        <td class="p-4">
                            @if($client->website_url)
                                <a href="{{ $client->website_url }}" target="_blank"
                                   class="text-blue-600 hover:underline">
                                    Visit
                                </a>
                            @else
                                -
                            @endif
                        </td>

                        <td class="p-4">{{ $client->position }}</td>

                        <td class="p-4">
                            @if($client->status)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">Active</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">Inactive</span>
                            @endif
                        </td>

                        <td class="p-4 text-right">
                            <a href="{{ route('admin.clients.show',$client->id) }}"
                               class="bg-slate-600 text-white px-3 py-2 rounded">
                                View
                            </a>

                            <a href="{{ route('admin.clients.edit',$client->id) }}"
                               class="bg-yellow-500 text-white px-3 py-2 rounded">
                                Edit
                            </a>

                            <form action="{{ route('admin.clients.destroy',$client->id) }}"
                                  method="POST"
                                  class="inline-block">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Delete Client?')"
                                        class="bg-red-600 text-white px-3 py-2 rounded">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-6 text-center text-gray-500">
                            No client found.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>


    <button class="btn btn-secondary">
        Test DaisyUI
    </button>
@endsection
