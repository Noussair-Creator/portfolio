<x-admin-layout>
    <x-slot name="header">
        Add New Project
    </x-slot>

    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
            @include('admin.projects._form', ['buttonText' => 'Create Project'])
        </form>
    </div>
</x-admin-layout>
