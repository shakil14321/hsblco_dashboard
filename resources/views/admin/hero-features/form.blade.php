<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">Hero Slide</label>
        <select name="hero_slide_id"
                class="w-full border border-gray-300 rounded-lg px-4 py-2">
            <option value="">Select Hero Slide</option>
            @foreach($slides as $slide)
                <option value="{{ $slide->id }}"
                    {{ old('hero_slide_id', $heroFeature->hero_slide_id ?? '') == $slide->id ? 'selected' : '' }}>
                    {{ $slide->title }}
                </option>
            @endforeach
        </select>
        @error('hero_slide_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">Title</label>
        <input type="text"
               name="title"
               value="{{ old('title', $heroFeature->title ?? '') }}"
               class="w-full border border-gray-300 rounded-lg px-4 py-2">
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">Icon</label>
        <input type="text"
               name="icon"
               placeholder="Example: fa-solid fa-cloud"
               value="{{ old('icon', $heroFeature->icon ?? '') }}"
               class="w-full border border-gray-300 rounded-lg px-4 py-2">
        @error('icon') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">Position</label>
        <input type="number"
               name="position"
               value="{{ old('position', $heroFeature->position ?? 0) }}"
               class="w-full border border-gray-300 rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">Status</label>
        <select name="status"
                class="w-full border border-gray-300 rounded-lg px-4 py-2">
            <option value="1" {{ old('status', $heroFeature->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $heroFeature->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

</div>
