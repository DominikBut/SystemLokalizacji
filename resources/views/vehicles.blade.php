<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zarządzanie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 h-full">

            <div class="overflow-hidden h-full">
                <div class="grid grid-cols-12 space-x-8">
                    <div class="col-span-2 justify-between shadow-sm border sm:rounded-lg bg-white">
                        <h2 class="font-semibold text-lg text-gray-800 leading-tight p-4">
                            {{ __('Nawigacja') }}
                        </h2>
                         <!-- Navigation Links -->
                        <div class="flex flex-col sm:-my-px mx-4 space-y-4 px-4">
                            <x-nav-link href="{{ route('management.vehicles') }}" :active="request()->routeIs('management.vehicles')">
                                {{ __('Pojazdy') }}
                            </x-nav-link>
                            <x-nav-link href="{{ route('management.history') }}" :active="request()->routeIs('management.history')">
                                {{ __('Historia lokacji') }}
                            </x-nav-link>
                            <x-nav-link href="{{ route('management.fence') }}" :active="request()->routeIs('management.fence')">
                                {{ __('Obszar domowy') }}
                            </x-nav-link>
                            <x-nav-link href="{{ route('management.oldmap') }}" :active="request()->routeIs('management.oldmap')">
                                {{ __('Mapa historyczna') }}
                            </x-nav-link>
                        </div>
                    </div>
                    <div class="col-span-10 h-full">
                        @livewire('list-vehicles')
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
