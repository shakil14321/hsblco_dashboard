@php
    $labelClass = "mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400";

    $inputClass = "h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="{{ $labelClass }}">Hero Slide</label>

        <select name="hero_slide_id" class="{{ $inputClass }}">
            <option value="">Select Hero Slide</option>

            @foreach($slides as $slide)
                <option value="{{ $slide->id }}"
                    {{ old('hero_slide_id', $heroFeature->hero_slide_id ?? '') == $slide->id ? 'selected' : '' }}>
                    {{ $slide->title }}
                </option>
            @endforeach
        </select>

        @error('hero_slide_id')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Title</label>

        <input type="text"
               name="title"
               value="{{ old('title', $heroFeature->title ?? '') }}"
               class="{{ $inputClass }}">

        @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Icon</label>

        <input type="text"
               name="icon"
               placeholder="Example: fa-solid fa-cloud"
               value="{{ old('icon', $heroFeature->icon ?? '') }}"
               class="{{ $inputClass }}">

        @error('icon')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Position</label>

        <input type="number"
               name="position"
               value="{{ old('position', $heroFeature->position ?? 0) }}"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Status</label>

        <select name="status" class="{{ $inputClass }}">
            <option value="1" {{ old('status', $heroFeature->status ?? 1) == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0" {{ old('status', $heroFeature->status ?? 1) == 0 ? 'selected' : '' }}>
                Inactive
            </option>
        </select>
    </div>

</div>
