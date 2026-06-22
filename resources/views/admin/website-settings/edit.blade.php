@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="text-2xl font-bold mb-6">
                Website Settings
            </h2>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.website-settings.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label>Site Name</label>

                        <input type="text"
                               name="site_name"
                               value="{{ old('site_name',$setting->site_name) }}"
                               class="w-full border rounded-lg p-3">
                    </div>

                    <div>
                        <label>Email</label>

                        <input type="email"
                               name="email"
                               value="{{ old('email',$setting->email) }}"
                               class="w-full border rounded-lg p-3">
                    </div>

                    <div>
                        <label>Phone</label>

                        <input type="text"
                               name="phone"
                               value="{{ old('phone',$setting->phone) }}"
                               class="w-full border rounded-lg p-3">
                    </div>

                    <div>
                        <label>Facebook</label>

                        <input type="text"
                               name="facebook"
                               value="{{ old('facebook',$setting->facebook) }}"
                               class="w-full border rounded-lg p-3">
                    </div>

                    <div>
                        <label>LinkedIn</label>

                        <input type="text"
                               name="linkedin"
                               value="{{ old('linkedin',$setting->linkedin) }}"
                               class="w-full border rounded-lg p-3">
                    </div>

                    <div>
                        <label>YouTube</label>

                        <input type="text"
                               name="youtube"
                               value="{{ old('youtube',$setting->youtube) }}"
                               class="w-full border rounded-lg p-3">
                    </div>

                    <div>
                        <label>Twitter</label>

                        <input type="text"
                               name="twitter"
                               value="{{ old('twitter',$setting->twitter) }}"
                               class="w-full border rounded-lg p-3">
                    </div>

                    <div>
                        <label>Logo</label>

                        <input type="file"
                               name="logo"
                               class="w-full border rounded-lg p-3">

                        @if($setting->logo)
                            <img
                                src="{{ asset('storage/'.$setting->logo) }}"
                                class="h-16 mt-3">
                        @endif
                    </div>

                    <div>
                        <label>Favicon</label>

                        <input type="file"
                               name="favicon"
                               class="w-full border rounded-lg p-3">

                        @if($setting->favicon)
                            <img
                                src="{{ asset('storage/'.$setting->favicon) }}"
                                class="h-12 mt-3">
                        @endif
                    </div>

                    <div class="md:col-span-2">
                        <label>Address</label>

                        <textarea
                            name="address"
                            rows="4"
                            class="w-full border rounded-lg p-3">{{ old('address',$setting->address) }}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label>Footer Text</label>

                        <textarea
                            name="footer_text"
                            rows="3"
                            class="w-full border rounded-lg p-3">{{ old('footer_text',$setting->footer_text) }}</textarea>
                    </div>

                </div>

                <button
                    class="mt-6 bg-blue-600 text-white px-6 py-3 rounded-lg">
                    Save Settings
                </button>

            </form>

        </div>

    </div>

@endsection
