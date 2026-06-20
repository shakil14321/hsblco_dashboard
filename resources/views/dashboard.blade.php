@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

    <div class="bg-white rounded-xl p-6 shadow">
        <h1 class="text-3xl font-bold">
            Welcome {{ Auth::user()->name }}
        </h1>

        <p class="text-gray-500 mt-2">
            Dashboard Overview
        </p>
    </div>

@endsection
