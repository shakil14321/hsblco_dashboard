<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="block mb-2 font-medium">Name</label>
        <input type="text" name="name"
               value="{{ old('name', $productCategory->name ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
        @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Slug</label>
        <input type="text" name="slug"
               value="{{ old('slug', $productCategory->slug ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
        @error('slug') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Image</label>
        <input type="file" name="image"
               class="w-full border rounded-lg px-4 py-2">

        @if(isset($productCategory) && $productCategory->image)
            <img src="{{ asset('storage/'.$productCategory->image) }}"
                 class="mt-3 w-24 h-20 object-cover rounded border">
        @endif
    </div>

    <div>
        <label class="block mb-2 font-medium">Position</label>
        <input type="number" name="position"
               value="{{ old('position', $productCategory->position ?? 0) }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Status</label>
        <select name="status" class="w-full border rounded-lg px-4 py-2">
            <option value="1" {{ old('status', $productCategory->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $productCategory->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

</div>
