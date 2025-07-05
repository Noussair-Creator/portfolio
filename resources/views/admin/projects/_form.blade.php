@csrf
<!-- Title -->
<div class="mb-6">
    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title', $project->title ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

<!-- Description -->
<div class="mb-6">
    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
    <textarea name="description" id="description" rows="5" class="tinymce-editor">{{ old('description', $project->description ?? '') }}</textarea>
    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

<!-- URLs -->
<div class="grid gap-6 mb-6 md:grid-cols-2">
    <div>
        <label for="project_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project URL</label>
        <input type="url" name="project_url" id="project_url" value="{{ old('project_url', $project->project_url ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="https://example.com">
        @error('project_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="repo_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repository URL</label>
        <input type="url" name="repo_url" id="repo_url" value="{{ old('repo_url', $project->repo_url ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="https://github.com/user/repo">
        @error('repo_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<!-- Tags -->
<div class="mb-6">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-4 border border-gray-200 rounded-lg dark:border-gray-700">
        @foreach($tags as $tag)
            <label class="flex items-center space-x-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                    @if(in_array($tag->id, old('tags', $project->tags->pluck('id')->toArray() ?? []))) checked @endif
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <span>{{ $tag->name }}</span>
            </label>
        @endforeach
    </div>
     @error('tags') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

<!-- Image Upload -->
<div class="mb-6">
    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project Image</label>
    <input type="file" name="image" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" onchange="previewImage(event)">
    @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror>

    @php $image_path = $project->image_path ?? ''; @endphp
    <img id="imagePreview" src="{{ $image_path ? asset('storage/' . $image_path) : '' }}" alt="Image Preview" class="mt-4 h-40 w-auto rounded-lg {{ !$image_path ? 'hidden' : '' }}">
</div>

<div class="flex items-center justify-end space-x-4">
    <a href="{{ route('admin.projects.index') }}" class="text-gray-500 dark:text-gray-400 hover:underline">
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
