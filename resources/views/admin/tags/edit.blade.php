<x-admin-layout>
    <x-slot name="header">
        Edit Tag: {{ $tag->name }}
    </x-slot>

    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <form method="POST" action="{{ route('admin.tags.update', $tag) }}">
            @method('PATCH')
            @include('admin.tags._form', ['buttonText' => 'Update Tag'])
        </form>
    </div>
</x-admin-layout>
