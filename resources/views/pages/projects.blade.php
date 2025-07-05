<x-public-layout>
    <section class="py-12 overflow-hidden">
        <h2 data-aos="fade-down" class="text-4xl font-bold text-center mb-8 font-heading">All Projects</h2>

        <div data-aos="fade-down" data-aos-delay="150" class="flex justify-center flex-wrap gap-2 mb-10">
            <a href="{{ route('projects') }}" class="px-4 py-1.5 text-sm rounded-full {{ !request('tag') ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }} hover:bg-blue-400 transition-colors duration-300">All</a>
            @foreach($tags as $tag)
                <a href="{{ route('projects', ['tag' => $tag->slug]) }}" class="px-4 py-1.5 text-sm rounded-full {{ request('tag') == $tag->slug ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }} hover:bg-blue-400 transition-colors duration-300">{{ $tag->name }}</a>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($projects as $project)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <x-project-card :project="$project" />
                </div>
            @empty
                <p class="text-center col-span-3">No projects found for this category.</p>
            @endforelse
        </div>
    </section>
</x-public-layout>
