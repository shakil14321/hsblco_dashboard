@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold">
                FAQs
            </h2>

            <a href="{{ route('admin.faqs.create') }}"
               class="bg-blue-600 text-white px-5 py-2 rounded-lg">
                Add FAQ
            </a>

        </div>

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-slate-100">
                <tr>
                    <th class="p-4 text-left">Question</th>
                    <th class="p-4 text-left">Position</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-right">Action</th>
                </tr>
                </thead>

                <tbody>

                @foreach($faqs as $faq)

                    <tr class="border-t">

                        <td class="p-4">
                            {{ $faq->question }}
                        </td>

                        <td class="p-4">
                            {{ $faq->position }}
                        </td>

                        <td class="p-4">

                            @if($faq->status)
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

                            <a href="{{ route('admin.faqs.edit',$faq->id) }}"
                               class="bg-yellow-500 text-white px-3 py-2 rounded">
                                Edit
                            </a>

                            <a href="{{ route('admin.faqs.show',$faq->id) }}"
                               class="bg-slate-600 text-white px-3 py-2 rounded">
                                View
                            </a>

                            <form action="{{ route('admin.faqs.destroy',$faq->id) }}"
                                  method="POST"
                                  class="inline-block">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Delete FAQ?')"
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
