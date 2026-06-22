<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="block mb-2 font-medium">Company Name</label>
        <input type="text" name="company_name"
               value="{{ old('company_name', $client->company_name ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
        @error('company_name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Website URL</label>
        <input type="text" name="website_url"
               value="{{ old('website_url', $client->website_url ?? '') }}"
               placeholder="https://example.com"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Logo</label>
        <input type="file" name="logo"
               class="w-full border rounded-lg px-4 py-2">

        @if(isset($client) && $client->logo)
            <img src="{{ asset('storage/'.$client->logo) }}"
                 class="mt-3 w-28 h-20 object-contain rounded-lg border bg-gray-50">
        @endif

        @error('logo') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Position</label>
        <input type="number" name="position"
               value="{{ old('position', $client->position ?? 0) }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block mb-2 font-medium">Status</label>
        <select name="status" class="w-full border rounded-lg px-4 py-2">
            <option value="1" {{ old('status', $client->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $client->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

</div>
