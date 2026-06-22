@extends('layouts.master')

@section('content')
    <div class="p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Menu</h1>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.menus.form')

                <div class="flex items-center gap-3 mt-6">
                    <button type="submit"
                            class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Update
                    </button>

                    <a href="{{ route('admin.menus.index') }}"
                       class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                        Back
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
