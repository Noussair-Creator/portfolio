<x-public-layout>
    <x-slot:title>
        {{ $profile->name ?? 'Home' }} - Web Developer Portfolio
    </x-slot:title>
    <x-slot:description>
        Welcome to the portfolio of {{ $profile->name ?? 'a web developer' }}. Specializing in Laravel, PHP, and modern web technologies.
    </x-slot:description>

    <div class="container mx-auto px-4">
        <!-- Hero Section -->
        <section class="relative py-20 md:py-32">
            <!-- Background Grid Pattern -->
            <div class="absolute inset-0 -z-10 h-full w-full dark:bg-gray-900 bg-[linear-gradient(to_right,#8080800a_1px,transparent_1px),linear-gradient(to_bottom,#8080800a_1px,transparent_1px)] bg-[size:14px_24px]"></div>

            <div class="flex flex-col md:flex-row items-center justify-center gap-12 md:gap-20">
                <!-- Profile Image Column -->
                <div data-aos="fade-right" class="w-full md:w-auto flex justify-center">
                    <div class="relative w-64 h-64 md:w-80 md:h-80 group">
                        <!-- Decorative Blob Shape -->
                        <div class="absolute -inset-2 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full blur-xl opacity-60 group-hover:opacity-80 transition duration-500"></div>

                        <div class="relative h-full w-full">
                            @if($profile->photo_path)
                                <img src="{{ asset('storage/' . $profile->photo_path) }}" alt="{{ $profile->name }}" class="rounded-2xl h-full w-full object-cover shadow-2xl transition-transform duration-500 group-hover:scale-105">
                            @else
                                <div class="rounded-2xl h-full w-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center shadow-lg">
                                    <span class="text-6xl font-bold text-gray-500">{{ strtoupper(substr($profile->name ?? 'A', 0, 1)) }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Text Column -->
                <div data-aos="fade-left" data-aos-delay="200" class="w-full md:w-1/2 text-center md:text-left">
                    <h2 class="text-xl md:text-2xl font-bold text-blue-600 dark:text-blue-400 font-heading tracking-wider uppercase">{{ $profile->subtitle ?? 'Web Developer' }}</h2>
                    <h1 class="text-4xl md:text-6xl font-extrabold my-2 font-heading text-gray-800 dark:text-white">{{ $profile->name ?? 'Welcome' }}</h1>
                    <p class="text-lg text-gray-600 dark:text-gray-300 max-w-xl mx-auto md:mx-0">{{ $profile->bio ?? 'Welcome to my portfolio.' }}</p>

                    <div class="mt-8 flex justify-center md:justify-start space-x-4">
                        <a href="{{ route('projects') }}" class="inline-flex items-center space-x-2 bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition-transform duration-300 hover:scale-105 shadow-lg">
                            <span>View My Work</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                        <a href="{{ route('contact') }}" class="inline-flex items-center space-x-2 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200 font-bold py-3 px-6 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-transform duration-300 hover:scale-105 shadow-lg">
                            <span>Get In Touch</span>
                        </a>
                    </div>

                    <!-- Social Links -->
                    @if (!empty($profile->social_links))
                        <div class="mt-12 flex justify-center md:justify-start space-x-6">
                            @if (isset($profile->social_links['github']))
                                <a href="{{ $profile->social_links['github'] }}" target="_blank" class="text-gray-500 hover:text-gray-900 dark:hover:text-white transition-all duration-300 hover:scale-110">
                                    <span class="sr-only">GitHub</span>
                                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12c0 4.418 2.865 8.168 6.839 9.492.5.092.682-.217.682-.482 0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.031-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.03 1.595 1.03 2.688 0 3.848-2.338 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.001 10.001 0 0022 12c0-5.523-4.477-10-10-10z" clip-rule="evenodd" /></svg>
                                </a>
                            @endif
                            @if (isset($profile->social_links['linkedin']))
                                <a href="{{ $profile->social_links['linkedin'] }}" target="_blank" class="text-gray-500 hover:text-blue-700 transition-all duration-300 hover:scale-110">
                                    <span class="sr-only">LinkedIn</span>
                                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                </a>
                            @endif
                            @if (isset($profile->social_links['twitter']))
                                <a href="{{ $profile->social_links['twitter'] }}" target="_blank" class="text-gray-500 hover:text-black dark:hover:text-white transition-all duration-300 hover:scale-110">
                                    <span class="sr-only">Twitter</span>
                                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Recent Projects Section -->
        <div class="bg-white dark:bg-gray-800 py-20 -mx-4 px-4">
            <div class="container mx-auto">
                <div class="text-center mb-12">
                    <h2 data-aos="fade-up" class="text-3xl md:text-4xl font-bold font-heading">Recent Projects</h2>
                    <p data-aos="fade-up" data-aos-delay="100" class="text-lg text-gray-500 dark:text-gray-400 mt-2">A selection of my favorite work.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($projects as $project)
                        <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <x-project-card :project="$project" />
                        </div>
                    @empty
                        <p class="text-center col-span-3">No projects available yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
