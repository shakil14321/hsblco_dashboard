@extends('layouts.master')

@section('content')
    <div class="p-6">

        <div class="bg-white p-6 rounded-xl shadow">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Contact Message Details</h2>

                <a href="{{ route('admin.contact-messages.index') }}"
                   class="bg-gray-200 px-5 py-2 rounded-lg">
                    Back
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">

                <div>
                    <p class="text-sm text-gray-500">Name</p>
                    <p class="font-semibold">{{ $contactMessage->name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="font-semibold">{{ $contactMessage->email }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Phone</p>
                    <p class="font-semibold">{{ $contactMessage->phone ?? '-' }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Company Name</p>
                    <p class="font-semibold">{{ $contactMessage->company_name ?? '-' }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Status</p>
                    <p class="font-semibold capitalize">{{ $contactMessage->status }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Date</p>
                    <p class="font-semibold">
                        {{ $contactMessage->created_at?->format('d M, Y h:i A') }}
                    </p>
                </div>

            </div>

            <div>
                <p class="text-sm text-gray-500 mb-2">Message</p>

                <div class="bg-gray-50 p-5 rounded-lg leading-7">
                    {!! nl2br(e($contactMessage->message)) !!}
                </div>
            </div>

            <div class="mt-6 flex gap-3">

                <a href="mailto:{{ $contactMessage->email }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
                    Reply by Email
                </a>

                <form action="{{ route('admin.contact-messages.destroy', $contactMessage->id) }}"
                      method="POST"
                      onsubmit="return confirm('Delete this message?')">
                    @csrf
                    @method('DELETE')

                    <button class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg">
                        Delete
                    </button>
                </form>

            </div>

        </div>

    </div>
@endsection
