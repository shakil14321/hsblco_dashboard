<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="block mb-2 font-medium">Title</label>
        <input type="text" name="title"
               value="{{ old('title', $blog->title ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Slug</label>
        <input type="text" name="slug"
               value="{{ old('slug', $blog->slug ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
        @error('slug') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Author Name</label>
        <input type="text" name="author_name"
               value="{{ old('author_name', $blog->author_name ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Publish Date</label>
        <input type="date" name="publish_date"
               value="{{ old('publish_date', isset($blog) && $blog->publish_date ? $blog->publish_date->format('Y-m-d') : '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div class="md:col-span-2">
        <label class="block mb-2 font-medium">Short Description</label>
        <textarea name="short_description" rows="3"
                  class="w-full border rounded-lg px-4 py-2">{{ old('short_description', $blog->short_description ?? '') }}</textarea>
    </div>

    <div class="md:col-span-2">
        <label class="block mb-2 font-medium">Description</label>
        <textarea name="description" rows="8"
                  class="w-full border rounded-lg px-4 py-2">{{ old('description', $blog->description ?? '') }}</textarea>
        @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Image</label>
        <input type="file" name="image"
               class="w-full border rounded-lg px-4 py-2">

        @if(isset($blog) && $blog->image)
            <img src="{{ asset('storage/'.$blog->image) }}"
                 class="mt-3 w-28 h-20 object-cover rounded-lg border">
        @endif
    </div>

    <div>
        <label class="block mb-2 font-medium">Featured</label>
        <select name="featured" class="w-full border rounded-lg px-4 py-2">
            <option value="0" {{ old('featured', $blog->featured ?? 0) == 0 ? 'selected' : '' }}>No</option>
            <option value="1" {{ old('featured', $blog->featured ?? 0) == 1 ? 'selected' : '' }}>Yes</option>
        </select>
    </div>

    <div>
        <label class="block mb-2 font-medium">Status</label>
        <select name="status" class="w-full border rounded-lg px-4 py-2">
            <option value="1" {{ old('status', $blog->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $blog->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

</div>
