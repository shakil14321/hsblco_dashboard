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
               value="{{ old('title', $companyStat->title ?? '') }}"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Value</label>

        <input type="text"
               name="value"
               value="{{ old('value', $companyStat->value ?? '') }}"
               placeholder="13"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Suffix</label>

        <input type="text"
               name="suffix"
               value="{{ old('suffix', $companyStat->suffix ?? '') }}"
               placeholder="+"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Position</label>

        <input type="number"
               name="position"
               value="{{ old('position', $companyStat->position ?? 0) }}"
               class="{{ $inputClass }}">
    </div>

    <div class="md:col-span-2">
        <label class="{{ $labelClass }}">Short Description</label>

        <textarea
            name="short_description"
            rows="4"
            class="{{ $textareaClass }}">{{ old('short_description', $companyStat->short_description ?? '') }}</textarea>
    </div>

    <div>
        <label class="{{ $labelClass }}">Status</label>

        <select name="status" class="{{ $inputClass }}">
            <option value="1"
                {{ old('status', $companyStat->status ?? 1) == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0"
                {{ old('status', $companyStat->status ?? 1) == 0 ? 'selected' : '' }}>
                Inactive
            </option>
        </select>
    </div>

</div>
