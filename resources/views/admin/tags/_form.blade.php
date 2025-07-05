@csrf
<!-- Name -->
<div class="mb-6">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tag Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $tag->name ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

<div class="flex items-center justify-end space-x-4">
    <a href="{{ route('admin.tags.index') }}" class="text-gray-500 dark:text-gray-400 hover:underline">
        Cancel
    </a>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        {{ $buttonText ?? 'Submit' }}
    </button>
</div>
