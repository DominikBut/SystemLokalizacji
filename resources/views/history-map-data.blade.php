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
                                {{ __('Historia lokalizacji') }}
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
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-full">
                                @if(isset($lokacja))
                                @include('history-map')
                                @else
                                <div class="grid gap-4 w-full py-8 lg:py-24">
                                    <div class="w-16 h-16 lg:w-20 lg:h-20 mx-auto bg-amber-100 p-2 rounded-full shadow-sm justify-center items-center inline-flex ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-amber-500" fill="none" viewBox="0 0 24 24" strokeWidth={1.8} stroke="currentColor" className="size-4 lg:size-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="m3 3 1.664 1.664M21 21l-1.5-1.5m-5.485-1.242L12 17.25 4.5 21V8.742m.164-4.078a2.15 2.15 0 0 1 1.743-1.342 48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185V19.5M4.664 4.664 19.5 19.5" />
                                          </svg>
                                    </div>
                                    <div class="flex flex-col items-center w-auto">
                                        <h2 class="text-center text-sky-950 text-lg lg:text-xl font-semibold pb-2">Najpierw wybierz lokację!</h2>
                                        <p class="text-center text-sky-950 text-sm lg:text-base font-normal pb-4">Zajrzyj do historii lokacji.</p>

                                            <a type="button" href="{{ route('management.history') }}" class="font-bold text-sky-950 text-center place-content-center w-auto py-2 px-5 text-sm 2xl:text-lg rounded-full bg-amber-100 flex flex-row place-content-center items-center justify-between ring-1 ring-amber-300 hover:ring hover:text-cyan-700 hover:bg-amber-50 transition ease-in-out duration-300">
                                                    Wybierz lokację
                                            </a>
                                    </div>
                                </div>
                                @endif
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
