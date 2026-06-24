@php
    $labelClass = "mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400";

    $inputClass = "h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="{{ $labelClass }}">Name</label>
        <input type="text"
               name="name"
               value="{{ old('name', $menu->name ?? '') }}"
               required
               class="{{ $inputClass }}">

        @error('name')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Slug</label>
        <input type="text"
               name="slug"
               value="{{ old('slug', $menu->slug ?? '') }}"
               class="{{ $inputClass }}">

        @error('slug')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">URL</label>
        <input type="text"
               name="url"
               value="{{ old('url', $menu->url ?? '') }}"
               placeholder="/about-us"
               class="{{ $inputClass }}">

        @error('url')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Parent Menu</label>
        <select name="parent_id"
                class="{{ $inputClass }}">
            <option value="">No Parent</option>

            @foreach($parents as $parent)
                <option value="{{ $parent->id }}"
                    {{ old('parent_id', $menu->parent_id ?? '') == $parent->id ? 'selected' : '' }}>
                    {{ $parent->name }}
                </option>
            @endforeach
        </select>

        @error('parent_id')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Position</label>
        <input type="number"
               name="position"
               value="{{ old('position', $menu->position ?? 0) }}"
               class="{{ $inputClass }}">

        @error('position')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Status</label>
        <select name="status"
                class="{{ $inputClass }}">
            <option value="1" {{ old('status', $menu->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $menu->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>

        @error('status')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>
