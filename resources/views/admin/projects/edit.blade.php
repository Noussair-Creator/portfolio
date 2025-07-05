<x-admin-layout>
    <x-slot name="header">
        Edit Project: {{ $project->title }}
    </x-slot>

    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data">
            @method('PATCH')
            @include('admin.projects._form', ['buttonText' => 'Update Project'])
        </form>
    </div>
</x-admin-layout>
