<!DOCTYPE html class="h-full bg-gray-100">
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <title>Laravel | Training</title>
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
                                                class="focus:outline-hidden relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-800"
                                                id="user-menu-button" type="button" aria-expanded="false"
                                                aria-haspopup="true">
                                                <span class="absolute -inset-1.5"></span>
                                                <span class="sr-only">Open user menu</span>
                                                <img class="size-8 rounded-full"
                                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                    alt="" />
                                            </button>
                                        </div>
                                        <!-- Dropdown menu -->
                                        <div class="invisible absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 opacity-0 shadow-lg ring-1 ring-black ring-opacity-5 transition-all duration-200 ease-in-out focus:outline-none group-hover:visible group-hover:opacity-100"
                                            id="user-menu" role="menu" aria-orientation="vertical"
                                            aria-labelledby="user-menu-button" tabindex="-1">
                                            <div class="flex items-center border-b border-gray-200 px-4 py-3">
                                                <img class="size-10 rounded-full"
                                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                    alt="" />
                                                <div class="ml-3">
                                                    <div class="text-base font-medium text-gray-900">
                                                        {{ Auth::user()->name ?? 'User' }}</div>
                                                    <div class="text-sm font-medium text-gray-500">
                                                        {{ Auth::user()->email ?? 'user@example.com' }}</div>
                                                </div>
                                            </div>
                                            <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                href="#" role="menuitem" tabindex="-1">Your Profile</a>
                                            <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                href="/profile" role="menuitem" tabindex="-1">Settings</a>
                                            <form class="block" method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button
                                                    class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100"
                                                    type="submit" role="menuitem" tabindex="-1">Sign out</button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="flex items-center space-x-4">
                                            <a class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-white"
                                                href="/login">Login</a>
                                            <a class="rounded-md bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-700"
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
                                type="button" aria-controls="mobile-menu" aria-expanded="false">
                                <span class="absolute -inset-0.5"></span>
                                <span class="sr-only">Open main menu</span>
                                <!-- Menu open: "hidden", Menu closed: "block" -->
                                <svg class="block size-6" data-slot="icon" aria-hidden="true" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                                <!-- Menu open: "block", Menu closed: "hidden" -->
                                <svg class="hidden size-6" data-slot="icon" aria-hidden="true" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu, show/hide based on menu state. -->
                <div class="md:hidden" id="mobile-menu">
                    <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                            href="/" aria-current="page">Home</a>
                        <a class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                            href="/about">About</a>
                        <a class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                            href="/contact">Contact</a>
                    </div>
                    <div class="border-t border-gray-700 pb-3 pt-4">
                        @auth
                            <div class="flex items-center px-5">
                                <div class="shrink-0">
                                    <img class="size-10 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="" />
                                </div>
                                <div class="ml-3">
                                    <div class="text-base/5 font-medium text-white">{{ Auth::user()->name ?? 'User' }}
                                    </div>
                                    <div class="text-sm font-medium text-gray-400">
                                        {{ Auth::user()->email ?? 'user@example.com' }}</div>
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
                                <a class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                                    href="#">Your Profile</a>
                                <a class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                                    href="/profile">Settings</a>
                                <form class="inline" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button
                                        class="block w-full rounded-md px-3 py-2 text-left text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                                        type="submit">Sign out</button>
                                </form>
                            </div>
                        @else
                            <div class="flex items-center px-5">
                                <div class="shrink-0">
                                    <div class="flex size-10 items-center justify-center rounded-full bg-gray-600">
                                        <svg class="size-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <div class="text-base/5 font-medium text-white">Guest User</div>
                                    <div class="text-sm font-medium text-gray-400">Not logged in</div>
                                </div>
                            </div>
                            <div class="mt-3 space-y-1 px-2">
                                <a class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                                    href="/login">Login</a>
                                <a class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                                    href="/register">Register</a>
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
            // Profile dropdown functionality - simplified for CSS hover
            document.addEventListener('DOMContentLoaded', function() {
                const userMenuButton = document.getElementById('user-menu-button');
                const userMenu = document.getElementById('user-menu');

                if (userMenuButton && userMenu) {
                    // Only handle click events for accessibility
                    userMenuButton.addEventListener('click', function(e) {
                        e.stopPropagation();
                        toggleDropdown();
                    });

                    // Close dropdown when clicking outside
                    document.addEventListener('click', function(e) {
                        if (!userMenu.closest('.group').contains(e.target)) {
                            hideDropdown();
                        }
                    });

                    function toggleDropdown() {
                        const isVisible = !userMenu.classList.contains('opacity-0');
                        if (isVisible) {
                            hideDropdown();
                        } else {
                            showDropdown();
                        }
                    }

                    function showDropdown() {
                        userMenu.classList.remove('opacity-0', 'invisible');
                        userMenu.classList.add('opacity-100', 'visible');
                        userMenuButton.setAttribute('aria-expanded', 'true');
                    }

                    function hideDropdown() {
                        userMenu.classList.add('opacity-0', 'invisible');
                        userMenu.classList.remove('opacity-100', 'visible');
                        userMenuButton.setAttribute('aria-expanded', 'false');
                    }
                }
            });
        </script>
    </body>

</html>
