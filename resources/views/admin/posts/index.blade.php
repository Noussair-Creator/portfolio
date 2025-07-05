<x-admin-layout>
    <x-slot name="header">
        Manage Blog Posts
    </x-slot>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <div class="flex justify-between items-center p-4 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">All Blog Posts</h3>
            <a href="{{ route('admin.posts.create') }}"
                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-300">
                + Add New Post
            </a>
        </div>

        @if (session('success'))
            <div class="m-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Title</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Published At</th>
                        <th scope="col" class="px-6 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ Str::limit($post->title, 50) }}
                            </th>
                            <td class="px-6 py-4">
                                @if ($post->is_published)
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Published</span>
                                @else
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->published_at ? $post->published_at->format('M d, Y') : 'N/A' }}
                            </td>
                            <td class="px-6 py-4 text-right flex justify-end items-center space-x-4">
                                <a href="{{ route('admin.posts.edit', $post) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                                <x-admin.delete-modal title="Delete Post: {{ Str::limit($post->title, 30) }}"
                                    formAction="{{ route('admin.posts.destroy', $post) }}" />
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td colspan="4" class="px-6 py-4 text-center">No posts found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
