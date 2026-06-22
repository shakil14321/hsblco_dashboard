@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Hero Slides</h1>

            <a href="{{ route('admin.hero-slides.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Add Slide
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="w-full">
                <thead class="bg-slate-100">
                <tr>
                    <th class="text-left p-4">Image</th>
                    <th class="text-left p-4">Title</th>
                    <th class="text-left p-4">Slide</th>
                    <th class="text-left p-4">Position</th>
                    <th class="text-left p-4">Status</th>
                    <th class="text-right p-4">Action</th>
                </tr>
                </thead>

                <tbody>

                @forelse($slides as $slide)

                    <tr class="border-t">

                        <td class="p-4">
                            @if($slide->image)
                                <img src="{{ asset('storage/'.$slide->image) }}"
                                     class="w-20 h-14 object-cover rounded">
                            @endif
                        </td>

                        <td class="p-4">
                            {{ $slide->title }}
                        </td>

                        <td class="p-4">
                            {{ $slide->slide_number }}
                        </td>

                        <td class="p-4">
                            {{ $slide->position }}
                        </td>

                        <td class="p-4">
                            @if($slide->status)
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">
                            Active
                        </span>
                            @else
                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">
                            Inactive
                        </span>
                            @endif
                        </td>

                        <td class="p-4 text-right">

                            <a href="{{ route('admin.hero-slides.edit',$slide->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded">
                                Edit
                            </a>

                            <form action="{{ route('admin.hero-slides.destroy',$slide->id) }}"
                                  method="POST"
                                  class="inline-block">
                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Delete this slide?')"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">
                                    Delete
                                </button>
                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center p-8 text-gray-500">
                            No slides found.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
