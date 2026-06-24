@php
    $labelClass = "mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400";
    $inputClass = "h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";
    $textareaClass = "w-full rounded-lg border border-gray-300 bg-transparent px-4 py-3 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="{{ $labelClass }}">Title</label>
        <input type="text" name="title"
               value="{{ old('title', $career->title ?? '') }}"
               class="{{ $inputClass }}">
        @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Slug</label>
        <input type="text" name="slug"
               value="{{ old('slug', $career->slug ?? '') }}"
               class="{{ $inputClass }}">
        @error('slug') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Location</label>
        <input type="text" name="location"
               value="{{ old('location', $career->location ?? '') }}"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Job Type</label>
        <input type="text" name="job_type"
               value="{{ old('job_type', $career->job_type ?? '') }}"
               placeholder="Full Time / Part Time / Remote"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Salary</label>
        <input type="text" name="salary"
               value="{{ old('salary', $career->salary ?? '') }}"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Deadline</label>
        <input type="date" name="deadline"
               value="{{ old('deadline', isset($career) && $career->deadline ? $career->deadline->format('Y-m-d') : '') }}"
               class="{{ $inputClass }}">
    </div>

    <div class="md:col-span-2">
        <label class="{{ $labelClass }}">Description</label>
        <textarea name="description" rows="8"
                  class="{{ $textareaClass }}">{{ old('description', $career->description ?? '') }}</textarea>
        @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Department</label>
        <input type="text" name="department"
               value="{{ old('department', $career->department ?? '') }}"
               placeholder="Engineering"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Tech Stack</label>
        <input type="text" name="tech_stack"
               value="{{ old('tech_stack', $career->tech_stack ?? '') }}"
               placeholder="Laravel / PHP"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Apply URL</label>
        <input type="text" name="apply_url"
               value="{{ old('apply_url', $career->apply_url ?? '') }}"
               placeholder="/careers/apply"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Status</label>
        <select name="status" class="{{ $inputClass }}">
            <option value="1" {{ old('status', $career->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $career->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

</div>
