<div class="space-y-5">

    <div>
        <label class="block mb-2 font-medium">
            Question
        </label>

        <input type="text"
               name="question"
               value="{{ old('question', $faq->question ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">

        @error('question')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">
            Answer
        </label>

        <textarea
            name="answer"
            rows="6"
            class="w-full border rounded-lg px-4 py-2">{{ old('answer', $faq->answer ?? '') }}</textarea>

        @error('answer')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-2 gap-5">

        <div>
            <label class="block mb-2 font-medium">
                Position
            </label>

            <input type="number"
                   name="position"
                   value="{{ old('position', $faq->position ?? 0) }}"
                   class="w-full border rounded-lg px-4 py-2">
        </div>

        <div>
            <label class="block mb-2 font-medium">
                Status
            </label>

            <select name="status"
                    class="w-full border rounded-lg px-4 py-2">

                <option value="1"
                    {{ old('status', $faq->status ?? 1) == 1 ? 'selected' : '' }}>
                    Active
                </option>

                <option value="0"
                    {{ old('status', $faq->status ?? 1) == 0 ? 'selected' : '' }}>
                    Inactive
                </option>

            </select>
        </div>

    </div>

</div>
