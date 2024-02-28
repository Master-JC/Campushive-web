<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img class="w-20 h-20 rounded-full mx-auto" src="/images/campushivelogo.png" alt="CampusHive Logo">
        </x-slot>

        <div class="text-center mb-4">
            <h1 class="text-2xl font-semibold text-gray-800">{{ __('CampusHive') }}</h1>
            <br>
            <h3 class="text-1xl font-semibold text-gray-800">{{ __('Forgot Your Password?') }}</h3>
            <br>
            <p class="text-sm text-gray-600">{{ __('No problem. Just provide your email address and we will send you a password reset link.') }}</p>
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full rounded-md border-gray-300" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
