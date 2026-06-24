@php
    $labelClass = "mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400";
    $inputClass = "h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";
    $textareaClass = "w-full rounded-lg border border-gray-300 bg-transparent px-4 py-3 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="{{ $labelClass }}">
            Category
        </label>

        <select name="product_category_id" class="{{ $inputClass }}">
            <option value="">Select Category</option>

            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('product_category_id',$product->product_category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        @error('product_category_id')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">
            Product Name
        </label>

        <input type="text"
               name="name"
               value="{{ old('name',$product->name ?? '') }}"
               class="{{ $inputClass }}">

        @error('name')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">
            Slug
        </label>

        <input type="text"
               name="slug"
               value="{{ old('slug',$product->slug ?? '') }}"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">
            Product Image
        </label>

        <input type="file"
               name="image"
               class="w-full rounded-lg border border-gray-300 bg-transparent text-sm text-gray-600 file:mr-4 file:border-0 file:bg-gray-100 file:px-4 file:py-3 file:text-sm file:font-medium file:text-gray-700 hover:file:bg-gray-200 dark:border-gray-700 dark:text-gray-300 dark:file:bg-gray-800 dark:file:text-gray-300">

        @if(isset($product) && $product->image)
            <img src="{{ asset('storage/'.$product->image) }}"
                 class="mt-3 h-24 w-24 rounded-lg border border-gray-200 object-cover dark:border-gray-700">
        @endif
    </div>

    <div class="md:col-span-2">
        <label class="{{ $labelClass }}">
            Short Description
        </label>

        <textarea
            name="short_description"
            rows="3"
            class="{{ $textareaClass }}">{{ old('short_description',$product->short_description ?? '') }}</textarea>
    </div>

    <div class="md:col-span-2">
        <label class="{{ $labelClass }}">
            Description
        </label>

        <textarea
            name="description"
            rows="8"
            class="{{ $textareaClass }}">{{ old('description',$product->description ?? '') }}</textarea>
    </div>

    <div>
        <label class="{{ $labelClass }}">
            Featured
        </label>

        <select name="featured" class="{{ $inputClass }}">
            <option value="1" {{ old('featured', $product->featured ?? 1) == 1 ? 'selected' : '' }}>
                Yes
            </option>

            <option value="0" {{ old('featured', $product->featured ?? 1) == 0 ? 'selected' : '' }}>
                No
            </option>
        </select>
    </div>

    <div>
        <label class="{{ $labelClass }}">
            Status
        </label>

        <select name="status" class="{{ $inputClass }}">
            <option value="1" {{ old('status', $product->status ?? 1) == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0" {{ old('status', $product->status ?? 1) == 0 ? 'selected' : '' }}>
                Inactive
            </option>
        </select>
    </div>

</div>
