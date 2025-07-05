<x-public-layout>
    <x-slot:title>
        Blog - {{ $profile->name ?? 'Portfolio' }}
    </x-slot:title>
    <x-slot:description>
        A collection of articles and tutorials on web development, Laravel, and more.
    </x-slot:description>

    <section class="py-12">
        <div class="container mx-auto px-4">
            <h1 data-aos="fade-down" class="text-4xl font-bold text-center mb-12">My Blog</h1>
            <div class="max-w-3xl mx-auto space-y-12">
                @forelse($posts as $post)
                    <article data-aos="fade-up">
                        @if ($post->image_path)
                            <a href="{{ route('blog.show', $post) }}">
                                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                                    class="rounded-lg mb-4 w-full h-64 object-cover">
                            </a>
                        @endif
                        <p class="text-sm text-gray-500">{{ $post->published_at->format('F j, Y') }}</p>
                        <h2 class="text-3xl font-bold mt-2"><a href="{{ route('blog.show', $post) }}"
                                class="hover:text-blue-500">{{ $post->title }}</a></h2>
                        <p class="text-gray-600 mt-4">{{ $post->excerpt }}</p>
                        <a href="{{ route('blog.show', $post) }}"
                            class="text-blue-500 hover:underline mt-4 inline-block">Read More &rarr;</a>
                    </article>
                @empty
                    <p class="text-center">No posts have been published yet.</p>
                @endforelse

                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </section>
</x-public-layout>
