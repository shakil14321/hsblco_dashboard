@extends('layouts.master')

@section('content')

    <div class="p-6">

        <div class="flex justify-between mb-6">

            <h2 class="text-2xl font-bold">
                Products
            </h2>

            <a
                href="{{ route('admin.products.create') }}"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg">

                Add Product

            </a>

        </div>

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-slate-100">

                <tr>

                    <th class="p-4 text-left">
                        Image
                    </th>

                    <th class="p-4 text-left">
                        Name
                    </th>

                    <th class="p-4 text-left">
                        Category
                    </th>

                    <th class="p-4 text-left">
                        Featured
                    </th>

                    <th class="p-4 text-left">
                        Status
                    </th>

                    <th class="p-4 text-right">
                        Action
                    </th>

                </tr>

                </thead>

                <tbody>

                @foreach($products as $product)

                    <tr class="border-t">

                        <td class="p-4">

                            @if($product->image)

                                <img
                                    src="{{ asset('storage/'.$product->image) }}"
                                    class="w-16 h-16 object-cover rounded">

                            @endif

                        </td>

                        <td class="p-4">
                            {{ $product->name }}
                        </td>

                        <td class="p-4">
                            {{ $product->category?->name }}
                        </td>

                        <td class="p-4">
                            {{ $product->featured ? 'Yes' : 'No' }}
                        </td>

                        <td class="p-4">
                            {{ $product->status ? 'Active' : 'Inactive' }}
                        </td>

                        <td class="p-4 text-right">

                            <a
                                href="{{ route('admin.products.show',$product->id) }}"
                                class="bg-slate-600 text-white px-3 py-2 rounded">
                                View
                            </a>

                            <a
                                href="{{ route('admin.products.edit',$product->id) }}"
                                class="bg-yellow-500 text-white px-3 py-2 rounded">
                                Edit
                            </a>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

@endsection
