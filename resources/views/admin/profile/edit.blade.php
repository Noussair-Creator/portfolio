<x-admin-layout>
    <x-slot name="header">
        Manage Your Profile
    </x-slot>

    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        @if (session('success'))
            <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $profile->name) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Add this new div for the subtitle --}}
                <div>
                    <label for="subtitle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subtitle
                        / Professional Title</label>
                    <input type="text" name="subtitle" id="subtitle"
                        value="{{ old('subtitle', $profile->subtitle) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                        placeholder="e.g., Full-Stack Web Developer">
                    @error('subtitle')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $profile->email) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-6">
                <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
                <textarea name="bio" id="bio" rows="5"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">{{ old('bio', $profile->bio) }}</textarea>
                @error('bio')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 p-4 border border-gray-200 rounded-lg dark:border-gray-700">
                <label class="block mb-4 text-sm font-medium text-gray-900 dark:text-white">Social Links</label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="github_url"
                            class="block text-gray-600 text-xs font-semibold mb-1 dark:text-gray-400">GitHub URL</label>
                        <input type="url" name="social_links[github]" id="github_url"
                            value="{{ old('social_links.github', $profile->social_links['github'] ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                            placeholder="https://github.com/yourusername">
                    </div>
                    <div>
                        <label for="linkedin_url"
                            class="block text-gray-600 text-xs font-semibold mb-1 dark:text-gray-400">LinkedIn
                            URL</label>
                        <input type="url" name="social_links[linkedin]" id="linkedin_url"
                            value="{{ old('social_links.linkedin', $profile->social_links['linkedin'] ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                            placeholder="https://linkedin.com/in/yourusername">
                    </div>
                    <div>
                        <label for="twitter_url"
                            class="block text-gray-600 text-xs font-semibold mb-1 dark:text-gray-400">Twitter (X)
                            URL</label>
                        <input type="url" name="social_links[twitter]" id="twitter_url"
                            value="{{ old('social_links.twitter', $profile->social_links['twitter'] ?? '') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600"
                            placeholder="https://twitter.com/yourusername">
                    </div>
                </div>
                @error('social_links.*')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile
                        Photo</label>
                    <input type="file" name="photo" id="photo"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600"
                        onchange="previewImage(event)">
                    @error('photo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <img id="imagePreview"
                        src="{{ $profile->photo_path ? asset('storage/' . $profile->photo_path) : '' }}"
                        alt="Image Preview"
                        class="mt-4 h-40 w-auto rounded-lg {{ !$profile->photo_path ? 'hidden' : '' }}">
                </div>
                <div>
                    <label for="resume" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Resume/CV
                        (PDF)</label>
                    <input type="file" name="resume" id="resume"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600">
                    @error('resume')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    @if ($profile->resume_path)
                        <p class="text-sm text-gray-600 mt-2 dark:text-gray-400">Current file: <a
                                href="{{ asset('storage/' . $profile->resume_path) }}" target="_blank"
                                class="text-blue-500 hover:underline">View Resume</a></p>
                    @endif
                </div>
            </div>

            <div class="flex items-center justify-end">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.classList.remove('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-admin-layout>
