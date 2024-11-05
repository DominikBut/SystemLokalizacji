<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-base text-gray-600 pb-4">
            {{ __('Zanim przejdziesz dalej, zweryfikuj swój adres e-mail, klikając na link, który do Ciebie wysłaliśmy. Jeśli nie otrzymałeś wiadomości e-mail, wyślij nową kilkając ponniżej.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Nowy link weryfikacyjny został wysłany na adres e-mail podany w ustawieniach profilu.') }}
            </div>
        @endif

        <div class="mt-4 flex flex-col sm:flex-row items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button type="submit">
                        {{ __('Wyślij ponownie e-mail weryfikacyjny') }}
                    </x-button>
                </div>
            </form>

            <div>
                <a
                    href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 font-bold hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    {{ __('Edytuj profil') }}</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline font-bold text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-2">
                        {{ __('Wyloguj') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
