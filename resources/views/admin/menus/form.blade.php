<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
    <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">Name</label>
        <input type="text"
               name="name"
               value="{{ old('name', $menu->name ?? '') }}"
               required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

        @error('name')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">Slug</label>
        <input type="text"
               name="slug"
               value="{{ old('slug', $menu->slug ?? '') }}"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

        @error('slug')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">URL</label>
        <input type="text"
               name="url"
               value="{{ old('url', $menu->url ?? '') }}"
               placeholder="/about-us"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

        @error('url')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">Parent Menu</label>
        <select name="parent_id"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
            <option value="">No Parent</option>

            @foreach($parents as $parent)
                <option value="{{ $parent->id }}"
                    {{ old('parent_id', $menu->parent_id ?? '') == $parent->id ? 'selected' : '' }}>
                    {{ $parent->name }}
                </option>
            @endforeach
        </select>

        @error('parent_id')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">Position</label>
        <input type="number"
               name="position"
               value="{{ old('position', $menu->position ?? 0) }}"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

        @error('position')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">Status</label>
        <select name="status"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
            <option value="1" {{ old('status', $menu->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $menu->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>

        @error('status')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
