<!doctype html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">

<div class="min-h-full">
    <nav class="bg-gray-800/50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <x-anav-link href="{{route('welcome')}}" :active="request()->is('/')">Welcome</x-anav-link>
                            <x-anav-link href="{{route('items.index')}}" :active="request()->is('items')">Items</x-anav-link>
                            <x-anav-link href="{{route('items.create')}}" :active="request()->is('items.create')">Create Items</x-anav-link>
                            <x-anav-link href="{{route('builds.index')}}" :active="request()->is('builds')">Builds</x-anav-link>
                            <x-anav-link href="{{route('builds.create')}}" :active="request()->is('builds.create')">Create Builds</x-anav-link>
                            @auth
                                @if (Auth::user()->isAdmin())
                                    <x-anav-link href="{{route('admin.index')}}" :active="request()->is('admin.index')">Admin</x-anav-link>
                                @endif
                            @endauth
{{--                            <x-anav-link href="{{route('build')}}" :active="request()->is('build')">Build</x-anav-link>--}}
{{--                            <x-anav-link href="{{route('about')}}" :active="request()->is('about')">About</x-anav-link>--}}
{{--                            <x-anav-link href="{{route('login')}}" :active="request()->is('login')">Login</x-anav-link>--}}
{{--                            <x-anav-link href="{{route('register')}}" :active="request()->is('register')">Register</x-anav-link>--}}
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                            @guest
                                <x-anav-link href="{{route('login')}}" :active="request()->is('login')">Login</x-anav-link>
                                <x-anav-link href="{{route('register')}}" :active="request()->is('register')">Register</x-anav-link>
                            @endguest
                            @auth
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="text-white hover:bg-gray-950/50 rounded-md px-3 py-2 text-sm font-medium">
                                            Logout
                                        </button>
                                    </form>
                            @endauth
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" command="--toggle" command for="mobile-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <el-disclosure id="mobile-menu" hidden class="block md:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                <x-anav-link href="{{route('welcome')}}" :active="request()->is('/')">Welcome</x-anav-link>
                <x-anav-link href="{{route('items.index')}}" :active="request()->is('items')">Items</x-anav-link>
                <x-anav-link href="{{route('items.create')}}" :active="request()->is('items.index')">Create Items</x-anav-link>
                <x-anav-link href="{{route('builds.index')}}" :active="request()->is('builds')">Builds</x-anav-link>
                <x-anav-link href="{{route('builds.create')}}" :active="request()->is('builds.create')">Create Builds</x-anav-link>
                @auth
                    @if (Auth::user()->isAdmin())
                        <x-anav-link href="{{route('admin.index')}}" :active="request()->is('admin.index')">Admin</x-anav-link>
                    @endif
                @endauth
                @guest
                    <x-anav-link href="{{route('login')}}" :active="request()->is('login')">Login</x-anav-link>
                    <x-anav-link href="{{route('register')}}" :active="request()->is('register')">Register</x-anav-link>
                @endguest
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:bg-gray-950/50 text-white rounded-md px-3 py-2 text-sm font-medium">
                            Logout
                        </button>
                    </form>
                @endauth


                {{--                <x-anav-link href="{{route('build')}}" :active="request()->is('build')">Build</x-anav-link>--}}
{{--                <x-anav-link href="{{route('about')}}" :active="request()->is('about')">About</x-anav-link>--}}
{{--                <x-anav-link href="{{route('login')}}" :active="request()->is('login')">Login</x-anav-link>--}}
{{--                <x-anav-link href="{{route('register')}}" :active="request()->is('register')">Register</x-anav-link>--}}
            </div>
            <div class="border-t border-white/10 pt-4 pb-3">
                <div class="flex items-center px-5">
                    <div class="shrink-0">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-10 rounded-full outline -outline-offset-1 outline-white/10" />
                    </div>
                    <div class="ml-3">
                        <div class="text-base/5 font-medium text-white">Tom Cook</div>
                        <div class="text-sm font-medium text-gray-400">tom@example.com</div>
                    </div>
                    <button type="button" class="relative ml-auto shrink-0 rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                            <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </el-disclosure>
    </nav>

    <header class="relative bg-gray-800 after:pointer-events-none after:absolute after:inset-x-0 after:inset-y-0 after:border-y after:border-white/10">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-white">{{ $heading }}</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</div>

</body>
</html>
