<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- SEO and Font tags --}}
    <title>{{ $title ?? ($profile->name ?? 'Portfolio') }}</title>
    <link rel="icon" href="{{ asset('my_icon.png') }}" type="image/x-icon">
    <meta name="description" content="{{ $description ?? $profile->bio }}">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@700;800&display=swap"
        rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 font-sans antialiased flex flex-col min-h-screen">

    <div class="container mx-auto px-10 w-full flex-grow">
        <header class="py-6 relative">
            <nav class="flex justify-between items-center">
                {{-- This will display your logo --}}
                <a href="{{ route('home') }}">
                    <!-- Light mode logo -->
                    <img src="{{ asset('logo-light.png') }}" alt="{{ $profile->name ?? 'Portfolio' }} Logo"
                        class="h-20 w-auto block dark:hidden">

                    <!-- Dark mode logo -->
                    <img src="{{ asset('logo-dark.png') }}" alt="{{ $profile->name ?? 'Portfolio' }} Logo"
                        class="h-20 w-auto hidden dark:block">
                </a>

                <!-- Desktop Menu & Theme Switcher -->
                <div class="hidden md:flex items-center space-x-6">
                    <ul class="flex space-x-6">
                        <li><a href="{{ route('home') }}"
                                class="hover:text-blue-500 transition-colors duration-300">Home</a></li>
                        <li><a href="{{ route('about') }}"
                                class="hover:text-blue-500 transition-colors duration-300">About</a></li>
                        <li><a href="{{ route('projects') }}"
                                class="hover:text-blue-500 transition-colors duration-300">Projects</a></li>
                        <li><a href="{{ route('blog.index') }}"
                                class="hover:text-blue-500 transition-colors duration-300">Blog</a></li>
                        <li><a href="{{ route('contact') }}"
                                class="hover:text-blue-500 transition-colors duration-300">Contact</a></li>
                    </ul>
                    <button id="theme-switcher" class="text-2xl" title="Toggle dark mode"></button>
                </div>

                <!-- Mobile Menu Button & Theme Switcher -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-theme-switcher" class="text-2xl mr-4" title="Toggle dark mode"></button>
                    <button id="mobile-menu-button" class="text-gray-800 dark:text-gray-200 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </nav>

            <!-- Mobile Menu Panel -->
            <div id="mobile-menu"
                class="md:hidden mt-4 rounded-lg shadow-lg p-4 absolute top-full left-0 w-full z-20
            transform transition-all duration-300 ease-in-out
            opacity-0 -translate-y-4 pointer-events-none
            bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border border-gray-200/50 dark:border-gray-700/50">
                <ul class="flex flex-col space-y-4">
                    <li><a href="{{ route('home') }}"
                            class="block text-center py-2 hover:bg-gray-200/50 dark:hover:bg-gray-700/50 rounded">Home</a>
                    </li>
                    <li><a href="{{ route('about') }}"
                            class="block text-center py-2 hover:bg-gray-200/50 dark:hover:bg-gray-700/50 rounded">About</a>
                    </li>
                    <li><a href="{{ route('projects') }}"
                            class="block text-center py-2 hover:bg-gray-200/50 dark:hover:bg-gray-700/50 rounded">Projects</a>
                    </li>
                    <li><a href="{{ route('blog.index') }}"
                            class="block text-center py-2 hover:bg-gray-200/50 dark:hover:bg-gray-700/50 rounded">Blog</a>
                    </li>
                    <li><a href="{{ route('contact') }}"
                            class="block text-center py-2 hover:bg-gray-200/50 dark:hover:bg-gray-700/50 rounded">Contact</a>
                    </li>
                </ul>
            </div>
        </header>

        <main>
            {{ $slot }}
        </main>
    </div>


    <footer class="text-center py-8 mt-auto border-t dark:border-gray-700 w-full bg-white dark:bg-gray-800">
        @if (!empty($profile->social_links))
            <div class="flex justify-center space-x-6 mb-4">
                @if (isset($profile->social_links['github']))
                    <a href="{{ $profile->social_links['github'] }}" target="_blank"
                        class="text-gray-500 hover:text-blue-500 transition-colors duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0019.91 1S18.73.65 16 2.48a13.38 13.38 0 00-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 005 4.77a5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22">
                            </path>
                        </svg>
                    </a>
                @endif
                @if (isset($profile->social_links['linkedin']))
                    <a href="{{ $profile->social_links['linkedin'] }}" target="_blank"
                        class="text-gray-500 hover:text-blue-500 transition-colors duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM6 9H2v12h4V9zM4 6a2 2 0 100-4 2 2 0 000 4z">
                            </path>
                        </svg>
                    </a>
                @endif
                @if (isset($profile->social_links['twitter']))
                    <a href="{{ $profile->social_links['twitter'] }}" target="_blank"
                        class="text-gray-500 hover:text-blue-500 transition-colors duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                            </path>
                        </svg>
                    </a>
                @endif
            </div>
        @endif
        <p class="dark:text-gray-400">&copy; {{ date('Y') }} {{ $profile->name ?? '' }}. All Rights Reserved.</p>

    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
</body>

</html>
