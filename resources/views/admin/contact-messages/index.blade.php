@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Contact Messages</h2>
        </div>

        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <div class="overflow-x-auto">

                <table class="w-full min-w-[900px] text-sm text-left">

                    <thead class="bg-slate-100 text-gray-700">
                    <tr>
                        <th class="px-5 py-4">Name</th>
                        <th class="px-5 py-4">Email</th>
                        <th class="px-5 py-4">Phone</th>
                        <th class="px-5 py-4">Company Name</th>
                        <th class="px-5 py-4 text-center">Status</th>
                        <th class="px-5 py-4">Date</th>
                        <th class="px-5 py-4 text-right">Action</th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                    @forelse($messages as $message)
                        <tr class="hover:bg-gray-50 {{ $message->status === 'unread' ? 'bg-blue-50' : '' }}">

                            <td class="px-5 py-4 font-medium text-gray-900">
                                {{ $message->name }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $message->email }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $message->phone ?? '-' }}
                            </td>

                            <td class="px-5 py-4">
                                {{ $message->company_name ?? '-' }}
                            </td>

                            <td class="px-5 py-4 text-center">
                                @if($message->status === 'unread')
                                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs">
                                    Unread
                                </span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                                    Read
                                </span>
                                @endif
                            </td>

                            <td class="px-5 py-4">
                                {{ $message->created_at?->format('d M, Y h:i A') }}
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex justify-end gap-2 whitespace-nowrap">

                                    <a href="{{ route('admin.contact-messages.show', $message->id) }}"
                                       class="bg-slate-600 hover:bg-slate-700 text-white px-3 py-2 rounded-lg">
                                        View
                                    </a>

                                    @if($message->status === 'unread')
                                        <form action="{{ route('admin.contact-messages.read', $message->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg">
                                                Mark Read
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.contact-messages.unread', $message->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <button class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg">
                                                Mark Unread
                                            </button>
                                        </form>
                                    @endif

                                    <form action="{{ route('admin.contact-messages.destroy', $message->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this message?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-5 py-8 text-center text-gray-500">
                                No contact message found.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>

            </div>
        </div>

    </div>
@endsection
