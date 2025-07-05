<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- TinyMCE Script -->
    <script src="https://cdn.tiny.cloud/1/f2ng69mlky1581td7881h5jb783mjztidjhmlrvm5govqdij/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div x-data="{ isSidebarOpen: false, profileDropdownOpen: false }" class="flex h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Sidebar -->
        <aside
            class="w-64 bg-white dark:bg-gray-800 p-6 flex-col fixed inset-y-0 left-0 z-30 transform transition-transform duration-300 ease-in-out md:translate-x-0 shadow-lg"
            :class="{ 'translate-x-0': isSidebarOpen, '-translate-x-full': !isSidebarOpen }">

            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold font-heading text-blue-600 dark:text-blue-400">Admin Panel</h1>
                <button @click="isSidebarOpen = false"
                    class="md:hidden text-gray-500 dark:text-gray-400 hover:text-black dark:hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <nav class="mt-8 flex-grow space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center space-x-3 py-2.5 px-4 rounded-lg transition duration-200 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.profile.edit') }}"
                    class="flex items-center space-x-3 py-2.5 px-4 rounded-lg transition duration-200 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('admin.profile.edit') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Profile</span>
                </a>
                <a href="{{ route('admin.about.edit') }}"
                    class="flex items-center space-x-3 py-2.5 px-4 rounded-lg transition duration-200 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('admin.about.edit') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>About Me</span>
                </a>
                <a href="{{ route('admin.projects.index') }}"
                    class="flex items-center space-x-3 py-2.5 px-4 rounded-lg transition duration-200 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('admin.projects.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                        </path>
                    </svg>
                    <span>Projects</span>
                </a>
                <a href="{{ route('admin.tags.index') }}"
                    class="flex items-center space-x-3 py-2.5 px-4 rounded-lg transition duration-200 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('admin.tags.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z">
                        </path>
                    </svg>
                    <span>Tags</span>
                </a>
                <a href="{{ route('admin.posts.index') }}"
                    class="flex items-center space-x-3 py-2.5 px-4 rounded-lg transition duration-200 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('admin.posts.*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    <span>Blog Posts</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col md:pl-64">
            <!-- Overlay for mobile -->
            <div @click="isSidebarOpen = false" x-show="isSidebarOpen"
                class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden"></div>

            <header class="flex justify-between items-center p-4 md:p-6 bg-white dark:bg-gray-800 shadow-md">
                <div class="flex items-center space-x-4">
                    <!-- Hamburger Menu Button -->
                    <button @click="isSidebarOpen = true" class="text-gray-600 dark:text-gray-300 md:hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <!-- Spacer to push controls to the right -->
                <div class="flex-grow"></div>

                <!-- Right-side Controls -->
                <div class="relative flex items-center space-x-4">
                    <button id="admin-theme-switcher" class="text-2xl text-gray-600 dark:text-gray-300"
                        title="Toggle dark mode"></button>

                    <!-- Profile Dropdown -->
                    <div @click.away="profileDropdownOpen = false" class="relative">
                        <button @click="profileDropdownOpen = !profileDropdownOpen"
                            class="flex items-center space-x-2">
                            <img class="h-8 w-8 rounded-full object-cover"
                                src="{{ $profile->photo_path ? asset('storage/' . $profile->photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                                alt="{{ Auth::user()->name }}">
                        </button>

                        <div x-show="profileDropdownOpen" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 rounded-md shadow-lg py-1 z-20">

                            <div class="px-4 py-2 text-xs text-gray-400">Manage Account</div>
                            <a href="{{ route('admin.profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">Profile</a>
                            <div class="border-t border-gray-100 dark:border-gray-600"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6 md:p-10 overflow-y-auto">
                <!-- Page Title -->
                <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 dark:text-gray-100 mb-8">
                    {{ $header }}</h2>

                <!-- Page Content -->
                <div>
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>


    <!-- Scripts for TinyMCE and Theme Switcher -->
    <script>
        // Function to determine the initial theme
        const getInitialTheme = () => {
            if (localStorage.getItem('theme')) {
                return localStorage.getItem('theme');
            }
            return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        };

        let currentTheme = getInitialTheme();

        // Function to apply the theme to the HTML element
        const applyTheme = (theme) => {
            const htmlEl = document.documentElement;
            if (theme === 'dark') {
                htmlEl.classList.add('dark');
            } else {
                htmlEl.classList.remove('dark');
            }
        };

        // Initialize TinyMCE with the correct theme
        const initTinyMCE = (theme) => {
            tinymce.init({
                selector: 'textarea.tinymce-editor',
                plugins: 'code table lists link image media',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | link image media',
                skin: theme === 'dark' ? 'oxide-dark' : 'oxide',
                content_css: theme === 'dark' ? 'dark' : 'default'
            });
        };

        // Apply the initial theme
        applyTheme(currentTheme);

        // Wait for the DOM to be ready to initialize scripts
        document.addEventListener('DOMContentLoaded', () => {
            initTinyMCE(currentTheme);

            const switcher = document.getElementById('admin-theme-switcher');
            if (switcher) {
                switcher.innerHTML = currentTheme === 'dark' ? '☀️' : '🌙';

                switcher.addEventListener('click', () => {
                    const newTheme = document.documentElement.classList.contains('dark') ? 'light' : 'dark';
                    applyTheme(newTheme);
                    localStorage.setItem('theme', newTheme);
                    switcher.innerHTML = newTheme === 'dark' ? '☀️' : '🌙';

                    // Reload TinyMCE to apply its theme
                    tinymce.remove();
                    initTinyMCE(newTheme);
                });
            }
        });
    </script>
</body>

</html>
