<x-admin-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div>
        <!-- Stat Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Total Projects Card -->
            <div
                class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg transform transition-transform duration-300 hover:-translate-y-1">
                <div class="flex items-center">
                    <div class="bg-blue-500/20 text-blue-500 p-3 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-500 dark:text-gray-400">Total Projects</h3>
                        <p class="text-3xl font-bold text-gray-800 dark:text-gray-100">{{ $projectCount }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Blog Posts Card -->
            <div
                class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg transform transition-transform duration-300 hover:-translate-y-1">
                <div class="flex items-center">
                    <div class="bg-green-500/20 text-green-500 p-3 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-500 dark:text-gray-400">Total Blog Posts</h3>
                        <p class="text-3xl font-bold text-gray-800 dark:text-gray-100">{{ $postCount }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Tags Card -->
            <div
                class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg transform transition-transform duration-300 hover:-translate-y-1">
                <div class="flex items-center">
                    <div class="bg-indigo-500/20 text-indigo-500 p-3 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-500 dark:text-gray-400">Total Tags</h3>
                        <p class="text-3xl font-bold text-gray-800 dark:text-gray-100">{{ $tagCount }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div>
            <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Quick Actions</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <a href="{{ route('admin.projects.create') }}"
                    class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-300 shadow hover:shadow-lg">
                    + Add New Project
                </a>
                <a href="{{ route('admin.posts.create') }}"
                    class="flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-300 shadow hover:shadow-lg">
                    + Add New Post
                </a>
                <a href="{{ route('admin.tags.create') }}"
                    class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-300 shadow hover:shadow-lg">
                    + Add New Tag
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
