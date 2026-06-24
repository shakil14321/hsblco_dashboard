@extends('layouts.master')

@section('content')

    <div class="px-6 py-8">

        <div class="mb-6">
            <a href="{{ route('admin.quotations.index') }}" class="text-blue-500">
                ← Back
            </a>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-[#101828]">

            <h1 class="mb-6 text-2xl font-semibold text-gray-800 dark:text-white">
                Send Quotation Mail
            </h1>

            <div class="mb-6 rounded-xl border border-gray-200 p-5 dark:border-gray-700">
                <p class="text-gray-300">
                    <strong>Name:</strong> {{ $quotation->name }}
                </p>
                <p class="text-gray-300">
                    <strong>Email:</strong> {{ $quotation->email }}
                </p>
                <p class="text-gray-300">
                    <strong>Service:</strong> {{ $quotation->service?->title }}
                </p>
            </div>

            <form action="{{ route('admin.quotations.send-mail', $quotation->id) }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                    <div>
                        <label class="mb-2 block text-sm text-gray-300">Service Charge</label>
                        <input type="number" name="service_charge" value="0"
                               class="w-full rounded-lg border border-gray-700 bg-[#182132] px-4 py-3 text-white">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm text-gray-300">Domain Charge</label>
                        <input type="number" name="domain_charge" value="0"
                               class="w-full rounded-lg border border-gray-700 bg-[#182132] px-4 py-3 text-white">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm text-gray-300">Hosting Charge</label>
                        <input type="number" name="hosting_charge" value="0"
                               class="w-full rounded-lg border border-gray-700 bg-[#182132] px-4 py-3 text-white">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm text-gray-300">Yearly Charge</label>
                        <input type="number" name="yearly_charge" value="0"
                               class="w-full rounded-lg border border-gray-700 bg-[#182132] px-4 py-3 text-white">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm text-gray-300">Monthly Charge</label>
                        <input type="number" name="monthly_charge" value="0"
                               class="w-full rounded-lg border border-gray-700 bg-[#182132] px-4 py-3 text-white">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm text-gray-300">Discount</label>
                        <input type="number" name="discount" value="0"
                               class="w-full rounded-lg border border-gray-700 bg-[#182132] px-4 py-3 text-white">
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-2 block text-sm text-gray-300">Note</label>
                        <textarea name="note" rows="4"
                                  class="w-full rounded-lg border border-gray-700 bg-[#182132] px-4 py-3 text-white"></textarea>
                    </div>

                </div>

                <button type="submit"
                        class="mt-6 rounded-lg bg-blue-600 px-6 py-3 text-white hover:bg-blue-700">
                    Send Mail
                </button>

            </form>

        </div>

    </div>

@endsection
