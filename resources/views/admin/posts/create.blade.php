<x-admin-layout>
    <x-slot name="header">
        Add New Post
    </x-slot>

    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
            @include('admin.posts._form', ['buttonText' => 'Create Post'])
        </form>
    </div>
</x-admin-layout>
