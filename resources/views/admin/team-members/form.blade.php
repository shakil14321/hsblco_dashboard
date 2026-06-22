<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="block mb-2 font-medium">Name</label>
        <input type="text" name="name"
               value="{{ old('name', $teamMember->name ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
        @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Designation</label>
        <input type="text" name="designation"
               value="{{ old('designation', $teamMember->designation ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
        @error('designation') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Image</label>
        <input type="file" name="image"
               class="w-full border rounded-lg px-4 py-2">

        @if(isset($teamMember) && $teamMember->image)
            <img src="{{ asset('storage/'.$teamMember->image) }}"
                 class="mt-3 w-28 h-28 object-cover rounded-lg border">
        @endif
    </div>

    <div>
        <label class="block mb-2 font-medium">Position</label>
        <input type="number" name="position"
               value="{{ old('position', $teamMember->position ?? 0) }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Facebook</label>
        <input type="text" name="facebook"
               value="{{ old('facebook', $teamMember->facebook ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Twitter</label>
        <input type="text" name="twitter"
               value="{{ old('twitter', $teamMember->twitter ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">LinkedIn</label>
        <input type="text" name="linkedin"
               value="{{ old('linkedin', $teamMember->linkedin ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Status</label>
        <select name="status" class="w-full border rounded-lg px-4 py-2">
            <option value="1" {{ old('status', $teamMember->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $teamMember->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <div class="md:col-span-2">
        <label class="block mb-2 font-medium">Bio</label>
        <textarea name="bio" rows="5"
                  class="w-full border rounded-lg px-4 py-2">{{ old('bio', $teamMember->bio ?? '') }}</textarea>
    </div>

</div>
