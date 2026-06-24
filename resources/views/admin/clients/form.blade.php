@php
    $labelClass = "mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400";
    $inputClass = "h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div>
        <label class="{{ $labelClass }}">Company Name</label>
        <input type="text" name="company_name"
               value="{{ old('company_name', $client->company_name ?? '') }}"
               class="{{ $inputClass }}">
        @error('company_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Website URL</label>
        <input type="text" name="website_url"
               value="{{ old('website_url', $client->website_url ?? '') }}"
               placeholder="https://example.com"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Logo</label>

        <input type="file" name="logo"
               class="w-full rounded-lg border border-gray-300 bg-transparent text-sm text-gray-600 file:mr-4 file:border-0 file:bg-gray-100 file:px-4 file:py-3 file:text-sm file:font-medium file:text-gray-700 hover:file:bg-gray-200 dark:border-gray-700 dark:text-gray-300 dark:file:bg-gray-800 dark:file:text-gray-300">

        @if(isset($client) && $client->logo)
            <img src="{{ asset('storage/'.$client->logo) }}"
                 class="mt-3 h-20 w-28 rounded-lg border border-gray-200 bg-gray-50 object-contain dark:border-gray-700 dark:bg-[#111827]">
        @endif

        @error('logo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">Position</label>
        <input type="number" name="position"
               value="{{ old('position', $client->position ?? 0) }}"
               class="{{ $inputClass }}">
    </div>

    <div>
        <label class="{{ $labelClass }}">Status</label>
        <select name="status" class="{{ $inputClass }}">
            <option value="1" {{ old('status', $client->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status', $client->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

</div>
