@extends('layouts.master')

@section('content')

    <div class="p-6">

        <h2 class="text-2xl font-bold mb-6">
            Newsletter Subscribers
        </h2>

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-slate-100">

                <tr>
                    <th class="p-4">#</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Subscribed</th>
                    <th class="p-4 text-right">Action</th>
                </tr>

                </thead>

                <tbody>

                @foreach($subscribers as $subscriber)

                    <tr class="border-t">

                        <td class="p-4">
                            {{ $subscriber->id }}
                        </td>

                        <td class="p-4">
                            {{ $subscriber->email }}
                        </td>

                        <td class="p-4">

                            @if($subscriber->status)

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                Active
                            </span>

                            @else

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">
                                Inactive
                            </span>

                            @endif

                        </td>

                        <td class="p-4">
                            {{ $subscriber->created_at?->format('d M Y') }}
                        </td>

                        <td class="p-4">

                            <div class="flex justify-end gap-2">

                                <a href="{{ route('admin.newsletter-subscribers.show',$subscriber->id) }}"
                                   class="bg-slate-600 text-white px-3 py-2 rounded">
                                    View
                                </a>

                                @if($subscriber->status)

                                    <form action="{{ route('admin.newsletter-subscribers.deactivate',$subscriber->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button class="bg-yellow-500 text-white px-3 py-2 rounded">
                                            Disable
                                        </button>

                                    </form>

                                @else

                                    <form action="{{ route('admin.newsletter-subscribers.activate',$subscriber->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button class="bg-green-600 text-white px-3 py-2 rounded">
                                            Enable
                                        </button>

                                    </form>

                                @endif

                                <form action="{{ route('admin.newsletter-subscribers.destroy',$subscriber->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Delete subscriber?')"
                                        class="bg-red-600 text-white px-3 py-2 rounded">
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

@endsection
