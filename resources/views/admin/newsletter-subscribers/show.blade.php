@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="bg-white p-6 rounded-xl shadow">

            <h2 class="text-2xl font-bold mb-6">
                Subscriber Details
            </h2>

            <div class="space-y-4">

                <div>
                    <strong>Email:</strong>
                    {{ $newsletterSubscriber->email }}
                </div>

                <div>
                    <strong>Status:</strong>

                    @if($newsletterSubscriber->status)
                        Active
                    @else
                        Inactive
                    @endif
                </div>

                <div>
                    <strong>Created At:</strong>
                    {{ $newsletterSubscriber->created_at }}
                </div>

            </div>

        </div>

    </div>

@endsection
