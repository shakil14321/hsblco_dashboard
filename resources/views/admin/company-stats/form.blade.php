<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="block mb-2 font-medium">Title</label>
        <input type="text"
               name="title"
               value="{{ old('title', $companyStat->title ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Value</label>
        <input type="text"
               name="value"
               value="{{ old('value', $companyStat->value ?? '') }}"
               placeholder="13"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Suffix</label>
        <input type="text"
               name="suffix"
               value="{{ old('suffix', $companyStat->suffix ?? '') }}"
               placeholder="+"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Position</label>
        <input type="number"
               name="position"
               value="{{ old('position', $companyStat->position ?? 0) }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div class="md:col-span-2">
        <label class="block mb-2 font-medium">Short Description</label>
        <textarea name="short_description"
                  rows="4"
                  class="w-full border rounded-lg px-4 py-2">{{ old('short_description', $companyStat->short_description ?? '') }}</textarea>
    </div>

    <div>
        <label class="block mb-2 font-medium">Status</label>

        <select name="status"
                class="w-full border rounded-lg px-4 py-2">

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
