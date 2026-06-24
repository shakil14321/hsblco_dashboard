@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                Website Settings
            </h2>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-[#182235]">

            @if(session('success'))
                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-700 dark:border-green-900 dark:bg-green-950/30 dark:text-green-400">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.website-settings.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @php
                    $labelClass = "mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400";
                    $inputClass = "h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";
                    $textareaClass = "w-full rounded-lg border border-gray-300 bg-transparent px-4 py-3 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";
                    $fileClass = "w-full rounded-lg border border-gray-300 bg-transparent text-sm text-gray-600 file:mr-4 file:border-0 file:bg-gray-100 file:px-4 file:py-3 file:text-sm file:font-medium file:text-gray-700 hover:file:bg-gray-200 dark:border-gray-700 dark:text-gray-300 dark:file:bg-gray-800 dark:file:text-gray-300";
                @endphp

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                    <div>
                        <label class="{{ $labelClass }}">Site Name</label>
                        <input type="text"
                               name="site_name"
                               value="{{ old('site_name',$setting->site_name) }}"
                               class="{{ $inputClass }}">
                    </div>

                    <div>
                        <label class="{{ $labelClass }}">Email</label>
                        <input type="email"
                               name="email"
                               value="{{ old('email',$setting->email) }}"
                               class="{{ $inputClass }}">
                    </div>

                    <div>
                        <label class="{{ $labelClass }}">Phone</label>
                        <input type="text"
                               name="phone"
                               value="{{ old('phone',$setting->phone) }}"
                               class="{{ $inputClass }}">
                    </div>

                    <div>
                        <label class="{{ $labelClass }}">Facebook</label>
                        <input type="text"
                               name="facebook"
                               value="{{ old('facebook',$setting->facebook) }}"
                               class="{{ $inputClass }}">
                    </div>

                    <div>
                        <label class="{{ $labelClass }}">LinkedIn</label>
                        <input type="text"
                               name="linkedin"
                               value="{{ old('linkedin',$setting->linkedin) }}"
                               class="{{ $inputClass }}">
                    </div>

                    <div>
                        <label class="{{ $labelClass }}">YouTube</label>
                        <input type="text"
                               name="youtube"
                               value="{{ old('youtube',$setting->youtube) }}"
                               class="{{ $inputClass }}">
                    </div>

                    <div>
                        <label class="{{ $labelClass }}">Twitter</label>
                        <input type="text"
                               name="twitter"
                               value="{{ old('twitter',$setting->twitter) }}"
                               class="{{ $inputClass }}">
                    </div>

                    <div>
                        <label class="{{ $labelClass }}">Logo</label>

                        <input type="file"
                               name="logo"
                               class="{{ $fileClass }}">

                        @if($setting->logo)
                            <img src="{{ asset('storage/'.$setting->logo) }}"
                                 class="mt-3 h-16 rounded-lg border border-gray-200 bg-white p-2 object-contain dark:border-gray-700">
                        @endif
                    </div>

                    <div>
                        <label class="{{ $labelClass }}">Favicon</label>

                        <input type="file"
                               name="favicon"
                               class="{{ $fileClass }}">

                        @if($setting->favicon)
                            <img src="{{ asset('storage/'.$setting->favicon) }}"
                                 class="mt-3 h-12 rounded-lg border border-gray-200 bg-white p-2 object-contain dark:border-gray-700">
                        @endif
                    </div>

                    <div class="md:col-span-2">
                        <label class="{{ $labelClass }}">Address</label>

                        <textarea
                            name="address"
                            rows="4"
                            class="{{ $textareaClass }}">{{ old('address',$setting->address) }}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="{{ $labelClass }}">Footer Text</label>

                        <textarea
                            name="footer_text"
                            rows="3"
                            class="{{ $textareaClass }}">{{ old('footer_text',$setting->footer_text) }}</textarea>
                    </div>

                </div>

                <button type="submit"
                        class="mt-6 inline-flex h-11 items-center justify-center rounded-lg bg-blue-600 px-6 text-sm font-medium text-white transition hover:bg-blue-700">
                    Save Settings
                </button>

            </form>

        </div>

    </div>

@endsection
