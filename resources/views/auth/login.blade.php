<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img class="w-20 h-20 rounded-full mx-auto" src="/images/campushivelogo.png" alt="CampusHive Logo">
        </x-slot>

        <x-validation-errors class="mb-4" />

        <div class="text-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">{{ __('CampusHive') }}</h2>
            <p class="text-sm text-gray-600">{{ __('Please sign in to your account') }}</p>
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full rounded-md border-gray-300" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mb-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full rounded-md border-gray-300" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mb-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mb-4">
                <x-button class="w-full flex items-center justify-center">
                    {{ __('Log in') }}
                </x-button>
            </div>

            <div class="text-center">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
