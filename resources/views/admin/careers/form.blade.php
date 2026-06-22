<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="block mb-2 font-medium">Title</label>
        <input type="text" name="title"
               value="{{ old('title', $career->title ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
        @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Slug</label>
        <input type="text" name="slug"
               value="{{ old('slug', $career->slug ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
        @error('slug') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Location</label>
        <input type="text" name="location"
               value="{{ old('location', $career->location ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Job Type</label>
        <input type="text" name="job_type"
               value="{{ old('job_type', $career->job_type ?? '') }}"
               placeholder="Full Time / Part Time / Remote"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Salary</label>
        <input type="text" name="salary"
               value="{{ old('salary', $career->salary ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Deadline</label>
        <input type="date" name="deadline"
               value="{{ old('deadline', isset($career) && $career->deadline ? $career->deadline->format('Y-m-d') : '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div class="md:col-span-2">
        <label class="block mb-2 font-medium">Description</label>
        <textarea name="description" rows="8"
                  class="w-full border rounded-lg px-4 py-2">{{ old('description', $career->description ?? '') }}</textarea>
        @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Department</label>
        <input type="text" name="department"
               value="{{ old('department', $career->department ?? '') }}"
               placeholder="Engineering"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Tech Stack</label>
        <input type="text" name="tech_stack"
               value="{{ old('tech_stack', $career->tech_stack ?? '') }}"
               placeholder="Laravel / PHP"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Apply URL</label>
        <input type="text" name="apply_url"
               value="{{ old('apply_url', $career->apply_url ?? '') }}"
               placeholder="/careers/apply"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Status</label>
        <select name="status" class="w-full border rounded-lg px-4 py-2">
            <option value="1" {{ old('status', $career->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $career->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

</div>
