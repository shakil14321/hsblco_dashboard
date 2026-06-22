<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="block mb-2 font-medium">Service</label>

        <select name="service_id"
                class="w-full border rounded-lg px-4 py-2">
            <option value="">Select Service</option>

            @foreach($services as $service)
                <option value="{{ $service->id }}"
                    {{ old('service_id', $serviceFeature->service_id ?? '') == $service->id ? 'selected' : '' }}>
                    {{ $service->title }}
                </option>
            @endforeach
        </select>

        @error('service_id')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Title</label>

        <input type="text"
               name="title"
               value="{{ old('title', $serviceFeature->title ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">

        @error('title')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Icon</label>

        <input type="text"
               name="icon"
               value="{{ old('icon', $serviceFeature->icon ?? '') }}"
               placeholder="fa-solid fa-cloud"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Position</label>

        <input type="number"
               name="position"
               value="{{ old('position', $serviceFeature->position ?? 0) }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div class="md:col-span-2">
        <label class="block mb-2 font-medium">Description</label>

        <textarea name="description"
                  rows="5"
                  class="w-full border rounded-lg px-4 py-2">{{ old('description', $serviceFeature->description ?? '') }}</textarea>
    </div>

    <div>
        <label class="block mb-2 font-medium">Status</label>

        <select name="status"
                class="w-full border rounded-lg px-4 py-2">
            <option value="1" {{ old('status', $serviceFeature->status ?? 1) == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0" {{ old('status', $serviceFeature->status ?? 1) == 0 ? 'selected' : '' }}>
                Inactive
            </option>
        </select>
    </div>

</div>
