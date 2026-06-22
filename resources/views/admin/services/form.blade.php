<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="block mb-2">Title</label>
        <input type="text"
               name="title"
               value="{{ old('title', $service->title ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2">Slug</label>
        <input type="text"
               name="slug"
               value="{{ old('slug', $service->slug ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2">Icon</label>
        <input type="text"
               name="icon"
               value="{{ old('icon', $service->icon ?? '') }}"
               placeholder="fa-solid fa-cloud"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2">Position</label>
        <input type="number"
               name="position"
               value="{{ old('position', $service->position ?? 0) }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2">Image</label>
        <input type="file"
               name="image"
               class="w-full border rounded-lg px-4 py-2">

        @if(isset($service) && $service->image)
            <img src="{{ asset('storage/'.$service->image) }}"
                 class="w-24 h-24 mt-2 rounded border object-cover">
        @endif
    </div>

    <div>
        <label class="block mb-2">Featured</label>

        <select name="featured"
                class="w-full border rounded-lg px-4 py-2">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
    </div>

    <div>
        <label class="block mb-2">Status</label>

        <select name="status"
                class="w-full border rounded-lg px-4 py-2">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>

    <div class="md:col-span-2">
        <label class="block mb-2">Short Description</label>

        <textarea
            name="short_description"
            rows="3"
            class="w-full border rounded-lg px-4 py-2">{{ old('short_description', $service->short_description ?? '') }}</textarea>
    </div>

    <div class="md:col-span-2">
        <label class="block mb-2">Description</label>

        <textarea
            name="description"
            rows="8"
            class="w-full border rounded-lg px-4 py-2">{{ old('description', $service->description ?? '') }}</textarea>
    </div>

</div>
