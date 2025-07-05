<x-public-layout>
    <x-slot:title>
        {{ $post->title }}
    </x-slot:title>
    <x-slot:description>
        {{ $post->excerpt }}
    </x-slot:description>
    @if ($post->image_path)
        <x-slot:og_image>
            {{ asset('storage/' . $post->image_path) }}
        </x-slot:og_image>
    @endif

    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                @if ($post->image_path)
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                        class="rounded-lg mb-8 w-full h-auto max-h-96 object-cover">
                @endif
                <h1 class="text-5xl font-extrabold mb-4">{{ $post->title }}</h1>
                <p class="text-lg text-gray-500 mb-8">Published on {{ $post->published_at->format('F j, Y') }}</p>

                <div class="prose dark:prose-invert max-w-none text-lg leading-relaxed">
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </section>
</x-public-layout>
