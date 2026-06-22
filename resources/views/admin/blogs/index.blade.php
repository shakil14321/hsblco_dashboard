@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Blogs</h2>

            <a href="{{ route('admin.blogs.create') }}"
               class="bg-blue-600 text-white px-5 py-2 rounded-lg">
                Add Blog
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
                    <th class="p-4 text-left">Image</th>
                    <th class="p-4 text-left">Title</th>
                    <th class="p-4 text-left">Author</th>
                    <th class="p-4 text-left">Date</th>
                    <th class="p-4 text-left">Featured</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-right">Action</th>
                </tr>
                </thead>

                <tbody>
                @forelse($blogs as $blog)
                    <tr class="border-t">
                        <td class="p-4">
                            @if($blog->image)
                                <img src="{{ asset('storage/'.$blog->image) }}"
                                     class="w-20 h-14 object-cover rounded">
                            @else
                                -
                            @endif
                        </td>

                        <td class="p-4">{{ $blog->title }}</td>
                        <td class="p-4">{{ $blog->author_name ?? '-' }}</td>
                        <td class="p-4">
                            {{ $blog->publish_date ? $blog->publish_date->format('M d, Y') : '-' }}
                        </td>

                        <td class="p-4">
                            {{ $blog->featured ? 'Yes' : 'No' }}
                        </td>

                        <td class="p-4">
                            @if($blog->status)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">Active</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">Inactive</span>
                            @endif
                        </td>

                        <td class="p-4 text-right">
                            <a href="{{ route('admin.blogs.show',$blog->id) }}"
                               class="bg-slate-600 text-white px-3 py-2 rounded">
                                View
                            </a>

                            <a href="{{ route('admin.blogs.edit',$blog->id) }}"
                               class="bg-yellow-500 text-white px-3 py-2 rounded">
                                Edit
                            </a>

                            <form action="{{ route('admin.blogs.destroy',$blog->id) }}"
                                  method="POST"
                                  class="inline-block">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Delete Blog?')"
                                        class="bg-red-600 text-white px-3 py-2 rounded">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="p-6 text-center text-gray-500">
                            No blog found.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
