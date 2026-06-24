@php
    $labelClass = "mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400";
    $inputClass = "h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";
    $textareaClass = "w-full rounded-lg border border-gray-300 bg-transparent px-4 py-3 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="{{ $labelClass }}">Title</label>
        <input type="text" name="title"
               value="{{ old('title', $blog->title ?? '') }}"
               class="{{ $inputClass }}">
        @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Slug</label>
        <input type="text" name="slug"
               value="{{ old('slug', $blog->slug ?? '') }}"
               class="{{ $inputClass }}">
        @error('slug') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Author Name</label>
        <input type="text" name="author_name"
               value="{{ old('author_name', $blog->author_name ?? '') }}"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Publish Date</label>
        <input type="date" name="publish_date"
               value="{{ old('publish_date', isset($blog) && $blog->publish_date ? $blog->publish_date->format('Y-m-d') : '') }}"
               class="{{ $inputClass }}">
    </div>

    <div class="md:col-span-2">
        <label class="{{ $labelClass }}">Short Description</label>
        <textarea name="short_description" rows="3"
                  class="{{ $textareaClass }}">{{ old('short_description', $blog->short_description ?? '') }}</textarea>
    </div>

    <div class="md:col-span-2">
        <label class="{{ $labelClass }}">Description</label>
        <textarea name="description" rows="8"
                  class="{{ $textareaClass }}">{{ old('description', $blog->description ?? '') }}</textarea>
        @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Image</label>

        <input type="file" name="image"
               class="w-full rounded-lg border border-gray-300 bg-transparent text-sm text-gray-600 file:mr-4 file:border-0 file:bg-gray-100 file:px-4 file:py-3 file:text-sm file:font-medium file:text-gray-700 hover:file:bg-gray-200 dark:border-gray-700 dark:text-gray-300 dark:file:bg-gray-800 dark:file:text-gray-300">

        @if(isset($blog) && $blog->image)
            <img src="{{ asset('storage/'.$blog->image) }}"
                 class="mt-3 h-20 w-28 rounded-lg border border-gray-200 object-cover dark:border-gray-700">
        @endif
    </div>

    <div>
        <label class="{{ $labelClass }}">Featured</label>
        <select name="featured" class="{{ $inputClass }}">
            <option value="0" {{ old('featured', $blog->featured ?? 0) == 0 ? 'selected' : '' }}>No</option>
            <option value="1" {{ old('featured', $blog->featured ?? 0) == 1 ? 'selected' : '' }}>Yes</option>
        </select>
    </div>

    <div>
        <label class="{{ $labelClass }}">Status</label>
        <select name="status" class="{{ $inputClass }}">
            <option value="1" {{ old('status', $blog->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $blog->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

</div>
