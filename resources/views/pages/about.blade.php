<x-public-layout>
    <x-slot:title>
        About Me - {{ $profile->name ?? 'Portfolio' }}
    </x-slot:title>
    <x-slot:description>
        Learn more about my skills, background, and passion for web development.
    </x-slot:description>

    <section class="py-12 overflow-hidden">
        <h2 data-aos="fade-down" class="text-4xl font-bold text-center mb-4 font-heading">
            {{ $about->title ?? 'About Me' }}</h2>
        <h3 data-aos="fade-down" data-aos-delay="150" class="text-xl text-gray-600 dark:text-gray-300 text-center mb-8 font-heading">
            {{ $about->subtitle ?? '' }}</h3>
        <div data-aos="fade-up" data-aos-delay="300"
            class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">

            <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300 leading-relaxed">
                {!! $about->description ?? '' !!}</div>
            {{-- Add this section for the download button --}}
            @if ($profile->resume_path)
                <div class="mt-8 text-center">
                    <a href="{{ asset('storage/' . $profile->resume_path) }}" download
                        class="inline-block bg-blue-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-600 transition-colors duration-300">
                        Download My Resume
                    </a>
                </div>
            @endif
            @if (!empty($about->skills))
                <div class="mt-8">
                    <h4 class="text-2xl font-bold mb-4 font-heading">My Skills</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($about->skills as $skill)
                            <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">{{ $skill }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>
</x-public-layout>
