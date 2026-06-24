@php
    $labelClass = "mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400";

    $inputClass = "h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";

    $textareaClass = "w-full rounded-lg border border-gray-300 bg-transparent px-4 py-3 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="{{ $labelClass }}">Title</label>
        <input type="text"
               name="title"
               value="{{ old('title', $heroSlide->title ?? '') }}"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Subtitle</label>
        <input type="text"
               name="subtitle"
               value="{{ old('subtitle', $heroSlide->subtitle ?? '') }}"
               class="{{ $inputClass }}">
    </div>

    <div class="md:col-span-2">
        <label class="{{ $labelClass }}">Description</label>
        <textarea
            name="description"
            rows="5"
            class="{{ $textareaClass }}">{{ old('description', $heroSlide->description ?? '') }}</textarea>
    </div>

    <div>
        <label class="{{ $labelClass }}">Button Text</label>
        <input type="text"
               name="button_text"
               value="{{ old('button_text', $heroSlide->button_text ?? '') }}"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Button URL</label>
        <input type="text"
               name="button_url"
               value="{{ old('button_url', $heroSlide->button_url ?? '') }}"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Slide Number</label>
        <input type="number"
               name="slide_number"
               value="{{ old('slide_number', $heroSlide->slide_number ?? 1) }}"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Position</label>
        <input type="number"
               name="position"
               value="{{ old('position', $heroSlide->position ?? 0) }}"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Image</label>

        <input type="file"
               name="image"
               class="w-full rounded-lg border border-gray-300 bg-transparent text-sm text-gray-600 file:mr-4 file:border-0 file:bg-gray-100 file:px-4 file:py-3 file:text-sm file:font-medium file:text-gray-700 hover:file:bg-gray-200 dark:border-gray-700 dark:text-gray-300 dark:file:bg-gray-800 dark:file:text-gray-300">
    </div>

    <div>
        <label class="{{ $labelClass }}">Status</label>

        <select name="status"
                class="{{ $inputClass }}">
            <option value="1"
                {{ old('status', $heroSlide->status ?? 1) == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0"
                {{ old('status', $heroSlide->status ?? 1) == 0 ? 'selected' : '' }}>
                Inactive
            </option>
        </select>
    </div>

</div>
