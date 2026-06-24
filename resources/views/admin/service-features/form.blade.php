@php
    $labelClass = "mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400";
    $inputClass = "h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";
    $textareaClass = "w-full rounded-lg border border-gray-300 bg-transparent px-4 py-3 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="{{ $labelClass }}">Service</label>

        <select name="service_id" class="{{ $inputClass }}">
            <option value="">Select Service</option>

            @foreach($services as $service)
                <option value="{{ $service->id }}"
                    {{ old('service_id', $serviceFeature->service_id ?? '') == $service->id ? 'selected' : '' }}>
                    {{ $service->title }}
                </option>
            @endforeach
        </select>

        @error('service_id')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Title</label>

        <input type="text"
               name="title"
               value="{{ old('title', $serviceFeature->title ?? '') }}"
               class="{{ $inputClass }}">

        @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Icon</label>

        <input type="text"
               name="icon"
               value="{{ old('icon', $serviceFeature->icon ?? '') }}"
               placeholder="fa-solid fa-cloud"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Position</label>

        <input type="number"
               name="position"
               value="{{ old('position', $serviceFeature->position ?? 0) }}"
               class="{{ $inputClass }}">
    </div>

    <div class="md:col-span-2">
        <label class="{{ $labelClass }}">Description</label>

        <textarea name="description"
                  rows="5"
                  class="{{ $textareaClass }}">{{ old('description', $serviceFeature->description ?? '') }}</textarea>
    </div>

    <div>
        <label class="{{ $labelClass }}">Status</label>

        <select name="status" class="{{ $inputClass }}">
            <option value="1" {{ old('status', $serviceFeature->status ?? 1) == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0" {{ old('status', $serviceFeature->status ?? 1) == 0 ? 'selected' : '' }}>
                Inactive
            </option>
        </select>
    </div>

</div>
