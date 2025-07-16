<!DOCTYPE html class="h-full bg-gray-100">
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel | Training</title>
        @vite(['resources/js/app.js'])
    </head>

    <body class="h-100">

        <div class="min-h-full">
            <nav class="bg-gray-800">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 items-center justify-between">
                        <div class="flex items-center">
                            <div class="shrink-0">
                                <img class="size-8"
                                    src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                                    alt="Your Company" />
                            </div>
                            <div class="hidden md:block">
                                <div class="ml-10 flex items-baseline space-x-4">
                                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                                    <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                                    <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                                    <x-nav-link href="/job" :active="request()->is('job')">Jobs</x-nav-link>

                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-4 flex items-center md:ml-6">
                                <button
                                    class="focus:outline-hidden relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                    type="button">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">View notifications</span>
                                    <svg class="size-6" data-slot="icon" aria-hidden="true" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                    </svg>
                                </button>

                                <!-- Profile dropdown -->
                                <div class="group relative ml-3" id="profile-dropdown">
                                    @auth
                                        <div>
                                            <button
                                                class="focus:outline-hidden relative flex max-w-xs items-center rounded-full bg-gradient-to-r from-blue-600 to-purple-600 text-sm shadow-md ring-2 ring-white ring-opacity-20 transition-all duration-200 hover:scale-105 hover:shadow-lg focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-800"
                                                id="user-menu-button" type="button" aria-expanded="false"
                                                aria-haspopup="true">
                                                <span class="absolute -inset-1.5"></span>
                                                <span class="sr-only">Open user menu</span>
                                                <div
                                                    class="flex size-8 items-center justify-center rounded-full bg-white text-lg">
                                                    <span>
                                                        @php
                                                            $userEmojis = [
                                                                '👤',
                                                                '😊',
                                                                '🚀',
                                                                '💼',
                                                                '🌟',
                                                                '🎯',
                                                                '💡',
                                                                '🔥',
                                                                '⚡',
                                                                '🎨',
                                                                '🌈',
                                                                '🦄',
                                                                '🎭',
                                                                '🎪',
                                                                '🎮',
                                                                '🎲',
                                                                '🎯',
                                                                '🔮',
                                                                '🎊',
                                                                '🎉',
                                                            ];
                                                            $userEmail = Auth::user()->email ?? 'user@example.com';
                                                            $emojiIndex = abs(crc32($userEmail)) % count($userEmojis);
                                                            echo $userEmojis[$emojiIndex];
                                                        @endphp
                                                    </span>
                                                </div>
                                            </button>
                                        </div>
                                        <!-- Dropdown menu -->
                                        <div class="invisible absolute right-0 z-50 mt-3 w-64 origin-top-right scale-95 transform rounded-2xl bg-white py-1 opacity-0 shadow-2xl ring-1 ring-black ring-opacity-5 transition-all duration-200 ease-out group-hover:visible group-hover:scale-100 group-hover:opacity-100"
                                            id="user-menu" role="menu" aria-orientation="vertical"
                                            aria-labelledby="user-menu-button" tabindex="-1">
                                            <!-- User Info Header -->
                                            <div class="bg-gradient-to-r from-blue-50 to-purple-50 px-4 py-4">
                                                <div class="flex items-center">
                                                    <div
                                                        class="flex size-12 items-center justify-center rounded-full bg-gradient-to-r from-blue-600 to-purple-600 text-xl shadow-md">
                                                        <span class="text-white">
                                                            @php
                                                                $userEmojis = [
                                                                    '👤',
                                                                    '😊',
                                                                    '🚀',
                                                                    '💼',
                                                                    '🌟',
                                                                    '🎯',
                                                                    '💡',
                                                                    '🔥',
                                                                    '⚡',
                                                                    '🎨',
                                                                    '🌈',
                                                                    '🦄',
                                                                    '🎭',
                                                                    '🎪',
                                                                    '🎮',
                                                                    '🎲',
                                                                    '🎯',
                                                                    '🔮',
                                                                    '🎊',
                                                                    '🎉',
                                                                ];
                                                                $userEmail = Auth::user()->email ?? 'user@example.com';
                                                                $emojiIndex =
                                                                    abs(crc32($userEmail)) % count($userEmojis);
                                                                echo $userEmojis[$emojiIndex];
                                                            @endphp
                                                        </span>
                                                    </div>
                                                    <div class="ml-3">
                                                        <div class="text-sm font-semibold text-gray-900">
                                                            {{ Auth::user()->full_name ?? (Auth::user()->name ?? 'User') }}
                                                        </div>
                                                        <div class="text-xs text-gray-500">
                                                            {{ Auth::user()->email ?? 'user@example.com' }}
                                                        </div>
                                                        @if (Auth::user()->is_admin ?? false)
                                                            <div class="mt-1">
                                                                <span
                                                                    class="inline-flex items-center rounded-full bg-purple-100 px-2 py-0.5 text-xs font-medium text-purple-800">
                                                                    👑 Admin
                                                                </span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Menu Items -->
                                            <div class="py-1">
                                                <a class="group flex items-center px-4 py-3 text-sm text-gray-700 transition-colors duration-150 hover:bg-gray-50"
                                                    href="#" role="menuitem" tabindex="-1">
                                                    <span class="mr-3">👤</span>
                                                    <span>Your Profile</span>
                                                </a>
                                                <a class="group flex items-center px-4 py-3 text-sm text-gray-700 transition-colors duration-150 hover:bg-gray-50"
                                                    href="/messages" role="menuitem" tabindex="-1">
                                                    <span class="mr-3">💬</span>
                                                    <span>Messages</span>
                                                </a>
                                                <a class="group flex items-center px-4 py-3 text-sm text-gray-700 transition-colors duration-150 hover:bg-gray-50"
                                                    href="/profile" role="menuitem" tabindex="-1">
                                                    <span class="mr-3">⚙️</span>
                                                    <span>Settings</span>
                                                </a>
                                                @if (Auth::user()->is_admin ?? false)
                                                    <a class="group flex items-center px-4 py-3 text-sm text-gray-700 transition-colors duration-150 hover:bg-gray-50"
                                                        href="/admin" role="menuitem" tabindex="-1">
                                                        <span class="mr-3">🛡️</span>
                                                        <span>Admin Panel</span>
                                                    </a>
                                                @endif
                                                <div class="my-1 border-t border-gray-200"></div>
                                                <form class="block" method="POST" action="/logout">
                                                    @csrf
                                                    <button
                                                        class="group flex w-full items-center px-4 py-3 text-left text-sm text-red-600 transition-colors duration-150 hover:bg-red-50"
                                                        type="submit" role="menuitem" tabindex="-1">
                                                        <span class="mr-3">🚪</span>
                                                        <span>Sign out</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex items-center space-x-3">
                                            <a class="rounded-lg px-3 py-2 text-sm font-medium text-gray-300 transition-colors duration-150 hover:text-white"
                                                href="/login">Login</a>
                                            <a class="rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 px-4 py-2 text-sm font-medium text-white shadow-md transition-all duration-150 hover:scale-105 hover:shadow-lg"
                                                href="/register">Register</a>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class="-mr-2 flex md:hidden">
                            <!-- Mobile menu button -->
                            <button
                                class="focus:outline-hidden relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="mobile-menu-button" type="button" aria-controls="mobile-menu"
                                aria-expanded="false">
                                <span class="absolute -inset-0.5"></span>
                                <span class="sr-only">Open main menu</span>
                                <!-- Menu open: "hidden", Menu closed: "block" -->
                                <svg class="block size-6" id="menu-open-icon" data-slot="icon" aria-hidden="true"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                                <!-- Menu open: "block", Menu closed: "hidden" -->
                                <svg class="hidden size-6" id="menu-close-icon" data-slot="icon" aria-hidden="true"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu, show/hide based on menu state. -->
                <div class="hidden md:hidden" id="mobile-menu">
                    <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                        <a class="{{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium"
                            href="/">Home</a>
                        <a class="{{ request()->is('about') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium"
                            href="/about">About</a>
                        <a class="{{ request()->is('contact') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium"
                            href="/contact">Contact</a>
                        <a class="{{ request()->is('job*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium"
                            href="/job">Jobs</a>
                        @auth
                            <a class="{{ request()->is('messages*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium"
                                href="/messages">Messages</a>
                            @if (Auth::user()->is_admin ?? false)
                                <a class="{{ request()->is('admin*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium"
                                    href="/admin">Admin Panel</a>
                            @endif
                        @endauth
                    </div>
                    <div class="border-t border-gray-700 pb-3 pt-4">
                        @auth
                            <div class="flex items-center px-5">
                                <div class="shrink-0">
                                    <div
                                        class="flex size-10 items-center justify-center rounded-full bg-gradient-to-r from-blue-600 to-purple-600 text-xl shadow-md">
                                        <span class="text-white">
                                            @php
                                                $userEmojis = [
                                                    '👤',
                                                    '😊',
                                                    '🚀',
                                                    '💼',
                                                    '🌟',
                                                    '🎯',
                                                    '💡',
                                                    '🔥',
                                                    '⚡',
                                                    '🎨',
                                                    '🌈',
                                                    '🦄',
                                                    '🎭',
                                                    '🎪',
                                                    '🎮',
                                                    '🎲',
                                                    '🎯',
                                                    '🔮',
                                                    '🎊',
                                                    '🎉',
                                                ];
                                                $userEmail = Auth::user()->email ?? 'user@example.com';
                                                $emojiIndex = abs(crc32($userEmail)) % count($userEmojis);
                                                echo $userEmojis[$emojiIndex];
                                            @endphp
                                        </span>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <div class="text-base/5 font-medium text-white">
                                        {{ Auth::user()->full_name ?? (Auth::user()->name ?? 'User') }}
                                    </div>
                                    <div class="text-sm font-medium text-gray-400">
                                        {{ Auth::user()->email ?? 'user@example.com' }}
                                    </div>
                                    @if (Auth::user()->is_admin ?? false)
                                        <div class="mt-1">
                                            <span
                                                class="inline-flex items-center rounded-full bg-purple-100 px-2 py-0.5 text-xs font-medium text-purple-800">
                                                👑 Admin
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                <button
                                    class="focus:outline-hidden relative ml-auto shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                    type="button">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">View notifications</span>
                                    <svg class="size-6" data-slot="icon" aria-hidden="true" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-3 space-y-1 px-2">
                                <a class="flex items-center rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                                    href="#">
                                    <span class="mr-3">👤</span>
                                    <span>Your Profile</span>
                                </a>
                                <a class="flex items-center rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                                    href="/profile">
                                    <span class="mr-3">⚙️</span>
                                    <span>Settings</span>
                                </a>
                                <form class="inline" method="POST" action="/logout">
                                    @csrf
                                    <button
                                        class="flex w-full items-center rounded-md px-3 py-2 text-left text-base font-medium text-red-400 hover:bg-red-900 hover:text-red-300"
                                        type="submit">
                                        <span class="mr-3">🚪</span>
                                        <span>Sign out</span>
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="flex items-center px-5">
                                <div class="shrink-0">
                                    <div class="flex size-10 items-center justify-center rounded-full bg-gray-600 text-lg">
                                        <span>👤</span>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <div class="text-base/5 font-medium text-white">Guest User</div>
                                    <div class="text-sm font-medium text-gray-400">Not logged in</div>
                                </div>
                            </div>
                            <div class="mt-3 space-y-1 px-2">
                                <a class="flex items-center rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                                    href="/login">
                                    <span class="mr-3">🔐</span>
                                    <span>Login</span>
                                </a>
                                <a class="flex items-center rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                                    href="/register">
                                    <span class="mr-3">📝</span>
                                    <span>Register</span>
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>

            <header class="bg-white shadow-sm">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
                </div>
            </header>
            <main>
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>

        <script>
            // Profile dropdown functionality
            document.addEventListener('DOMContentLoaded', function() {
                const userMenuButton = document.getElementById('user-menu-button');
                const userMenu = document.getElementById('user-menu');
                const mobileMenuButton = document.getElementById('mobile-menu-button');
                const mobileMenu = document.getElementById('mobile-menu');
                const menuOpenIcon = document.getElementById('menu-open-icon');
                const menuCloseIcon = document.getElementById('menu-close-icon');

                // Profile dropdown functionality
                if (userMenuButton && userMenu) {
                    // Handle click events for accessibility
                    userMenuButton.addEventListener('click', function(e) {
                        e.stopPropagation();
                        toggleUserDropdown();
                    });

                    // Close dropdown when clicking outside
                    document.addEventListener('click', function(e) {
                        if (!userMenu.closest('.group').contains(e.target)) {
                            hideUserDropdown();
                        }
                    });

                    function toggleUserDropdown() {
                        const isVisible = !userMenu.classList.contains('opacity-0');
                        if (isVisible) {
                            hideUserDropdown();
                        } else {
                            showUserDropdown();
                        }
                    }

                    function showUserDropdown() {
                        userMenu.classList.remove('opacity-0', 'invisible');
                        userMenu.classList.add('opacity-100', 'visible');
                        userMenuButton.setAttribute('aria-expanded', 'true');
                    }

                    function hideUserDropdown() {
                        userMenu.classList.add('opacity-0', 'invisible');
                        userMenu.classList.remove('opacity-100', 'visible');
                        userMenuButton.setAttribute('aria-expanded', 'false');
                    }
                }

                // Mobile menu functionality
                if (mobileMenuButton && mobileMenu) {
                    mobileMenuButton.addEventListener('click', function(e) {
                        e.stopPropagation();
                        toggleMobileMenu();
                    });

                    function toggleMobileMenu() {
                        const isVisible = !mobileMenu.classList.contains('hidden');
                        if (isVisible) {
                            hideMobileMenu();
                        } else {
                            showMobileMenu();
                        }
                    }

                    function showMobileMenu() {
                        mobileMenu.classList.remove('hidden');
                        menuOpenIcon.classList.add('hidden');
                        menuCloseIcon.classList.remove('hidden');
                        mobileMenuButton.setAttribute('aria-expanded', 'true');
                    }

                    function hideMobileMenu() {
                        mobileMenu.classList.add('hidden');
                        menuOpenIcon.classList.remove('hidden');
                        menuCloseIcon.classList.add('hidden');
                        mobileMenuButton.setAttribute('aria-expanded', 'false');
                    }

                    // Close mobile menu when clicking outside
                    document.addEventListener('click', function(e) {
                        if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                            hideMobileMenu();
                        }
                    });

                    // Close mobile menu when window is resized to desktop
                    window.addEventListener('resize', function() {
                        if (window.innerWidth >= 768) { // md breakpoint
                            hideMobileMenu();
                        }
                    });
                }
            });
        </script>
    </body>

</html>
