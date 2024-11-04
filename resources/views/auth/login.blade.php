<x-guest-layout>
    <x-authentication-card >
        <x-slot name="logo" >
            <x-authentication-card-logo />
        </x-slot>
        <h2 class="py-6 font-bold text-xl lg:text-2xl text-sky-950">Logowanie</h2>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession
            <div x-data="{ submitButtonDisabled: false }">
        <form method="POST" action="{{ route('login') }}" x-on:submit="submitButtonDisabled = true">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Hasło') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4 font-semibold">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Zapamiętaj mnie') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-8">
                @if (Route::has('password.request'))
                    <a class="font-semibold underline me-4 text-sm text-gray-600 px-2 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500" href="{{ route('password.request') }}">
                        {{ __('Zapomniałeś hasła?') }}
                    </a>
                @endif

                <x-button  x-bind:disabled="submitButtonDisabled">
                    {{ __('Zaloguj') }}
                </x-button>
            </div>
        </form>
    </div>
    </x-authentication-card>
</x-guest-layout>
