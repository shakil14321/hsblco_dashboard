@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold">
                Company Stats
            </h2>

            <a href="{{ route('admin.company-stats.create') }}"
               class="bg-blue-600 text-white px-5 py-2 rounded-lg">
                Add Stat
            </a>

        </div>

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-slate-100">
                <tr>
                    <th class="p-4 text-left">Title</th>
                    <th class="p-4 text-left">Value</th>
                    <th class="p-4 text-left">Suffix</th>
                    <th class="p-4 text-left">Position</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-right">Action</th>
                </tr>
                </thead>

                <tbody>

                @foreach($stats as $stat)

                    <tr class="border-t">

                        <td class="p-4">{{ $stat->title }}</td>
                        <td class="p-4">{{ $stat->value }}</td>
                        <td class="p-4">{{ $stat->suffix }}</td>
                        <td class="p-4">{{ $stat->position }}</td>

                        <td class="p-4">
                            @if($stat->status)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                Active
                            </span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                Inactive
                            </span>
                            @endif
                        </td>

                        <td class="p-4 text-right">

                            <a href="{{ route('admin.company-stats.edit',$stat->id) }}"
                               class="bg-yellow-500 text-white px-3 py-2 rounded">
                                Edit
                            </a>

                            <form action="{{ route('admin.company-stats.destroy',$stat->id) }}"
                                  method="POST"
                                  class="inline-block">

                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Delete?')"
                                        class="bg-red-600 text-white px-3 py-2 rounded">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

@endsection
