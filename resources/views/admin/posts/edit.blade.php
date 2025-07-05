<x-admin-layout>
    <x-slot name="header">
        Edit Post: {{ $post->title }}
    </x-slot>

    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <form method="POST" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data">
            @method('PATCH')
            @include('admin.posts._form', ['buttonText' => 'Update Post'])
        </form>
    </div>
</x-admin-layout>
