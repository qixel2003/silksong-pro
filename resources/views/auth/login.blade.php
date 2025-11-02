{{--<x-guest-layout>--}}
<x-alayout>
    <x-slot:heading>
        Login
    </x-slot:heading>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="text-white">
            <x-input-label for="email" :value="__('Email')"/>
            <x-form-input-label name="email" id="email" autocomplete="email" value="{{old('email')}}" required autofocus autocomplete="username"></x-form-input-label>
{{--            <x-text-input id="email" class="block flex-1 border-white bg-transparent py-1.5 px-3 pl-1 text-white  focus:ring-0 sm:text-sm/6" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 text-white">
            <x-input-label for="password" :value="__('Password')" />
            <x-form-input-label name="password" id="password" autocomplete="password" type="password" value="{{old('password')}}" required autofocus autocomplete="current-password"></x-form-input-label>

{{--            <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="current-password" />--}}

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-white dark:border-white text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-white dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-anav-link href="{{route('register')}}">Register</x-anav-link>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-white dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-alayout>
{{--</x-guest-layout>--}}
