@csrf
<!-- Title -->
<div class="mb-6">
    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Title</label>
    <input type="text" name="title" id="title" value="{{ old('title', $post->title ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

<!-- Excerpt -->
<div class="mb-6">
    <label for="excerpt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Excerpt</label>
    <textarea name="excerpt" id="excerpt" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
    @error('excerpt') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

<!-- Body -->
<div class="mb-6">
    <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
    <textarea name="body" id="body" rows="10" class="tinymce-editor">{{ old('body', $post->body ?? '') }}</textarea>
    @error('body') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

<!-- Image Upload -->
<div class="mb-6">
    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Featured Image</label>
    <input type="file" name="image" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" onchange="previewImage(event)">
    @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

    @php $image_path = $post->image_path ?? ''; @endphp
    <img id="imagePreview" src="{{ $image_path ? asset('storage/' . $image_path) : '' }}" alt="Image Preview" class="mt-4 h-40 w-auto rounded-lg {{ !$image_path ? 'hidden' : '' }}">
</div>

<!-- Publish Checkbox -->
<div class="mb-6">
    <label class="flex items-center">
        <input type="checkbox" name="is_published" value="1" @if(old('is_published', $post->is_published ?? false)) checked @endif class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <span class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Publish this post</span>
    </label>
</div>

<div class="flex items-center justify-end space-x-4">
    <a href="{{ route('admin.posts.index') }}" class="text-gray-500 dark:text-gray-400 hover:underline">
        Cancel
    </a>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        {{ $buttonText ?? 'Submit' }}
    </button>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
