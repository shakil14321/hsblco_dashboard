@php
    $labelClass = "mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400";
    $inputClass = "h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";
    $textareaClass = "w-full rounded-lg border border-gray-300 bg-transparent px-4 py-3 text-sm text-gray-800 shadow-sm placeholder:text-gray-400 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-[#111827] dark:text-white/90 dark:placeholder:text-white/30";
@endphp

<div class="space-y-5">

    <div>
        <label class="{{ $labelClass }}">
            Question
        </label>

        <input type="text"
               name="question"
               value="{{ old('question', $faq->question ?? '') }}"
               class="{{ $inputClass }}">

        @error('question')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="{{ $labelClass }}">
            Answer
        </label>

        <textarea
            name="answer"
            rows="6"
            class="{{ $textareaClass }}">{{ old('answer', $faq->answer ?? '') }}</textarea>

        @error('answer')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <div>
            <label class="{{ $labelClass }}">
                Position
            </label>

            <input type="number"
                   name="position"
                   value="{{ old('position', $faq->position ?? 0) }}"
                   class="{{ $inputClass }}">
        </div>

        <div>
            <label class="{{ $labelClass }}">
                Status
            </label>

            <select name="status" class="{{ $inputClass }}">
                <option value="1" {{ old('status', $faq->status ?? 1) == 1 ? 'selected' : '' }}>
                    Active
                </option>

                <option value="0" {{ old('status', $faq->status ?? 1) == 0 ? 'selected' : '' }}>
                    Inactive
                </option>
            </select>
        </div>

    </div>

</div>
