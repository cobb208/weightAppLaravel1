<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Weight It</title>
    <base href="{{ url('/') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
@php
    // Ensures if max is not set it gives it a default value to ignore null errors
    if(!isset($active)) {
        $active = 'none';
    }

    $activeUrlClass = 'bg-gray-900 text-white';
    $inactiveUrlClass = 'text-gray-300 hover:bg-gray-700 hover:text-white';
@endphp
<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                      Icon when menu is closed.

                      Heroicon name: outline/menu

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                      Icon when menu is open.

                      Heroicon name: outline/x

                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <svg class="block lg:hidden h-8 w-auto" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 385.56 211"><defs><style>.cls-1{fill:#27aae1;}.cls-1,.cls-2{stroke:#231f20;stroke-miterlimit:10;}.cls-2{fill:#00aeef;}</style></defs><rect class="cls-1" x="0.5" y="0.5" width="70" height="210" rx="11"/><rect class="cls-1" x="315.06" y="0.5" width="70" height="210" rx="11"/><rect class="cls-2" x="70.5" y="75.61" width="244.56" height="70"/></svg>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a
                            href="/"
                            class="@if($active === 'home'){{ $activeUrlClass }} @else {{ $inactiveUrlClass }} @endif px-3 py-2 rounded-md text-sm font-medium"
                            @if($active === 'home') aria-current="page" @endif
                        >
                            Home
                        </a>

                        <a
                            href="{{ route('barbellCalculator.index') }}"
                            class="@if($active === 'barbellCalculator'){{ $activeUrlClass }} @else {{ $inactiveUrlClass }} @endif px-3 py-2 rounded-md text-sm font-medium"
                            @if($active === 'barbellCalculator') aria-current="page" @endif
                        >
                            Barbell Calculator</a>

                        <a
                            href="{{ route('calculateMax.index') }}"
                            class="@if($active === 'calculateMax'){{ $activeUrlClass }} @else {{ $inactiveUrlClass }} @endif px-3 py-2 rounded-md text-sm font-medium"
                            @if($active === 'calculateMax') aria-current="page" @endif
                        >
                            Run your Max
                        </a>

                        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Calendar</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                @guest
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-white">Login</a>
                @endguest
                @auth
                    <button id="" type="button" class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">View notifications</span>
                        <!-- Heroicon name: outline/bell -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="ml-3 relative">
                        <div>
                            <button id="user-menu-button" type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </button>
                        </div>

                        <!--
                          Dropdown menu, show/hide based on menu state.

                          Entering: "transition ease-out duration-100"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div id="user-menu" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</button>
                            </form>

                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            @php
                $activeMobileMenu = 'bg-gray-900 text-white';
                $inactiveMobileMenu = 'text-gray-300 hover:bg-gray-700 hover:text-white';
            @endphp
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a
                href="/"
                class="@if($active === 'home') {{ $activeMobileMenu }} @else {{ $inactiveMobileMenu }} @endif block px-3 py-2 rounded-md text-base font-medium"
                @if($active === 'home') aria-current="page" @endif
            >
                Home
            </a>

            <a
                href="{{ route('barbellCalculator.index') }}"
                class="@if($active === 'barbellCalculator') {{ $activeMobileMenu }} @else {{ $inactiveMobileMenu }} @endif block px-3 py-2 rounded-md text-base font-medium"
                @if($active === 'barbellCalculator') aria-current="page" @endif
            >
                Barbell Calculator
            </a>

            <a
                href="{{ route('calculateMax.index') }}"
                class="@if($active === 'calculateMax') {{ $activeMobileMenu }} @else {{ $inactiveMobileMenu }} @endif block px-3 py-2 rounded-md text-base font-medium"
                @if($active === 'calculateMax') aria-current="page" @endif
            >
                Run Your Max
            </a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
        </div>
    </div>
</nav>
@yield('body')
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
