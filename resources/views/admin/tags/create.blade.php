<x-admin-layout>
    <x-slot name="header">
        Add New Tag
    </x-slot>

    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <form method="POST" action="{{ route('admin.tags.store') }}">
            @include('admin.tags._form', ['buttonText' => 'Create Tag'])
        </form>
    </div>
</x-admin-layout>
