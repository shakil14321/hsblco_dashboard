<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="block mb-2 font-medium">
            Category
        </label>

        <select
            name="product_category_id"
            class="w-full border rounded-lg px-4 py-2">

            <option value="">
                Select Category
            </option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ old('product_category_id',$product->product_category_id ?? '') == $category->id ? 'selected' : '' }}>

                    {{ $category->name }}

                </option>

            @endforeach

        </select>

        @error('product_category_id')
        <p class="text-red-600 text-sm mt-1">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">
            Product Name
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name',$product->name ?? '') }}"
            class="w-full border rounded-lg px-4 py-2">

        @error('name')
        <p class="text-red-600 text-sm mt-1">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">
            Slug
        </label>

        <input
            type="text"
            name="slug"
            value="{{ old('slug',$product->slug ?? '') }}"
            class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">
            Product Image
        </label>

        <input
            type="file"
            name="image"
            class="w-full border rounded-lg px-4 py-2">

        @if(isset($product) && $product->image)

            <img
                src="{{ asset('storage/'.$product->image) }}"
                class="w-24 h-24 mt-3 rounded border object-cover">

        @endif
    </div>

    <div class="md:col-span-2">

        <label class="block mb-2 font-medium">
            Short Description
        </label>

        <textarea
            name="short_description"
            rows="3"
            class="w-full border rounded-lg px-4 py-2">{{ old('short_description',$product->short_description ?? '') }}</textarea>

    </div>

    <div class="md:col-span-2">

        <label class="block mb-2 font-medium">
            Description
        </label>

        <textarea
            name="description"
            rows="8"
            class="w-full border rounded-lg px-4 py-2">{{ old('description',$product->description ?? '') }}</textarea>

    </div>

    <div>

        <label class="block mb-2 font-medium">
            Featured
        </label>

        <select
            name="featured"
            class="w-full border rounded-lg px-4 py-2">

            <option value="1">
                Yes
            </option>

            <option value="0">
                No
            </option>

        </select>

    </div>

    <div>

        <label class="block mb-2 font-medium">
            Status
        </label>

        <select
            name="status"
            class="w-full border rounded-lg px-4 py-2">

            <option value="1">
                Active
            </option>

            <option value="0">
                Inactive
            </option>

        </select>

    </div>

</div>
