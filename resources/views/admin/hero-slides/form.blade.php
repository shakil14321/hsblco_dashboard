<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="block mb-2">Title</label>
        <input type="text"
               name="title"
               value="{{ old('title', $heroSlide->title ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2">Subtitle</label>
        <input type="text"
               name="subtitle"
               value="{{ old('subtitle', $heroSlide->subtitle ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div class="md:col-span-2">
        <label class="block mb-2">Description</label>
        <textarea name="description"
                  rows="5"
                  class="w-full border rounded-lg px-4 py-2">{{ old('description', $heroSlide->description ?? '') }}</textarea>
    </div>

    <div>
        <label class="block mb-2">Button Text</label>
        <input type="text"
               name="button_text"
               value="{{ old('button_text', $heroSlide->button_text ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2">Button URL</label>
        <input type="text"
               name="button_url"
               value="{{ old('button_url', $heroSlide->button_url ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2">Slide Number</label>
        <input type="number"
               name="slide_number"
               value="{{ old('slide_number', $heroSlide->slide_number ?? 1) }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2">Position</label>
        <input type="number"
               name="position"
               value="{{ old('position', $heroSlide->position ?? 0) }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2">Image</label>
        <input type="file"
               name="image"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2">Status</label>
        <select name="status"
                class="w-full border rounded-lg px-4 py-2">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>

</div>
