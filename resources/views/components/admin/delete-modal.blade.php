@props(['title', 'formAction'])

<div x-data="{ showModal: false }" @keydown.escape.window="showModal = false">
    <!-- Trigger Button -->
    <button @click="showModal = true" type="button" class="font-medium text-red-600 dark:text-red-500 hover:underline">
        Delete
    </button>

    <!-- Modal Background -->
    <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 z-40" aria-hidden="true"></div>

    <!-- Modal Dialog -->
    <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90" class="fixed inset-0 flex items-center justify-center z-50 p-4">
        <div @click.away="showModal = false" class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-full max-w-md">
            <div class="p-6">
                {{-- Add text-center to the title --}}
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2 text-center">{{ $title }}
                </h3>
                {{-- Add text-left to the description --}}
                <p class="text-gray-600 dark:text-gray-400 text-left">
                    This action cannot be undone. Are you absolutely sure you want to proceed?
                </p>
                <div class="mt-6 flex justify-end space-x-4">
                    <button @click="showModal = false" type="button"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:bg-gray-600">
                        Cancel
                    </button>
                    <form action="{{ $formAction }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                            Yes, Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
