<nav x-data="{ open: false }" class="bg-lime-200 bg-gradient-to-t from-lime-200/90 to-lime-500/90
            backdrop-blur-lg shadow-md  ease-out transition-all duration-300 border-b-6 border-lime-600 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ URL::to('/') }}">
                        <x-application-mark class="h-14 w-14 py-2" />
                    </a>
                </div>

                <!-- Navigation Links -->

                    {{-- <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('location') }}" :active="request()->routeIs('location')">
                        {{ __('Lokalizuj') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('routes') }}" :active="request()->routeIs('routes')">
                        {{ __('Trasy') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('management.vehicles') }}" :active="request()->routeIs('management.*')">
                        {{ __('Zarządzanie') }}
                    </x-nav-link> --}}
                    <div class="hidden sm:-my-px md:ms-4 lg:ms-10 sm:flex flex-row text-sm lg:text-base xl:text-lg font-bold items-center ">

                        <a href="{{ route('dashboard') }}" class=" tracking-wide px-2 py-3 xl:px-5 xl:py-4 hidden lg:flex flex-col  border-lime-600
                        hover:text-sky-700 group transition-all duration-300 hover:bg-lime-100 truncate {{ request()->routeIs('dashboard') ? 'text-sky-700 bg-lime-100' : 'text-sky-950' }}">
                        Strona główna
                            <div class=" bg-sky-700 h-[0.10rem] w-0 group-hover:w-full transition-all duration-300 {{ request()->routeIs('dashboard') ? 'w-full' : '' }}"></div>
                        </a>
                        <a href="{{ route('location') }}" class="tracking-wide  px-2 py-3 xl:px-5 xl:py-4 flex flex-col    border-lime-600
                        hover:text-sky-700 group transition-all duration-300 hover:bg-lime-100  truncate {{ request()->routeIs('location') ? 'text-sky-700 bg-lime-100' : 'text-sky-950' }}">
                        Lokalizuj pojazdy
                            <div class=" bg-sky-700 h-[0.10rem] w-0 group-hover:w-full transition-all duration-300 {{ request()->routeIs('location') ? 'w-full' : '' }}"></div>
                        </a>
                        <a href="{{ route('routes') }}" class="tracking-wide px-2 py-3 xl:px-5 xl:py-4  flex flex-col   border-lime-600
                        hover:text-sky-700 group transition-all duration-300 hover:bg-lime-100 truncate {{ request()->routeIs('routes') ? 'text-sky-700 bg-lime-100' : 'text-sky-950' }}">
                        Sprawdź trasy
                            <div class=" bg-sky-700 h-[0.10rem] w-0 group-hover:w-full transition-all duration-300 {{ request()->routeIs('routes') ? 'w-full' : '' }}"></div>
                        </a>
                        <a href="{{ route('management.vehicles') }}" class=" tracking-wide  px-2 py-3 xl:px-5 xl:py-4  flex flex-col  border-lime-600
                        hover:text-sky-700 group transition-all duration-300 hover:bg-lime-100  truncate {{ request()->routeIs('management.*') ? 'text-sky-700 bg-lime-100' : 'text-sky-950' }}">
                        Zarządzaj pojazdami
                            <div class=" bg-sky-700 h-[0.10rem] w-0 group-hover:w-full transition-all duration-300 {{ request()->routeIs('management.*') ? 'w-full' : '' }}"></div>
                        </a>

                    </div>

            </div>

            <div class="hidden sm:flex sm:items-center md:ms-2 lg:ms-6">


                <!-- Settings Dropdown -->
                <div class="lg:ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <div x-data="{showMegaMenu: false,}" class="relative " x-on:click.outside="showMegaMenu = false">
                                        <button x-on:click="showMegaMenu = !showMegaMenu" class="text-sm lg:text-base xl:text-lg font-bold flex flex-col items-center tracking-wide px-3 py-3 xl:px-5 xl:py-4 text-wrap border-lime-600
                                            hover:text-sky-700 group transition-all duration-300 hover:bg-lime-100" :class="showMegaMenu ? 'bg-lime-100 text-sky-700' : 'text-sky-950' ">
                                            <div class="flex w-full flex-row items-center justify-center place-content-center gap-1">
                                                <div class="flex w-auto flex-col  max-w-24">
                                                    <span class="truncate">{{ Auth::user()->name }}</span>
                                                    <div class=" bg-sky-700 h-[0.10rem] group-hover:w-full transition-all duration-300" :class="showMegaMenu ? 'w-full' : 'w-0' "></div>
                                                </div>

                                                <span :class="showMegaMenu ? 'rotate-180' : 'rotate-0' " class="duration-300 self-center rotate-0">
                                                <svg class="size-3 font-bold" viewBox="0 0 20 20" fill="none" stroke-width="1.5" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 14.25C9.8125 14.25 9.65625 14.1875 9.5 14.0625L2.3125 7C2.03125 6.71875 2.03125 6.28125 2.3125 6C2.59375 5.71875 3.03125 5.71875 3.3125 6L10 12.5312L16.6875 5.9375C16.9688 5.65625 17.4062 5.65625 17.6875 5.9375C17.9688 6.21875 17.9688 6.65625 17.6875 6.9375L10.5 14C10.3437 14.1562 10.1875 14.25 10 14.25Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            </div>

                                        </button>


                                    </div>

                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content" class="!z-50">
                            <!-- Account Management -->

                            <x-dropdown-link href="{{ route('profile.show') }}" class="bg-lime-500 hover:bg-lime-600/80 !z-50 !text-nowrap !h-fit">
                                <svg class="w-6 h-6 text-white me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                  </svg>
                                {{ __('Mój profil') }}
                            </x-dropdown-link>




                                <div class="border-t-4 border-lime-600"></div>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" class="flex flex-col justify-end !z-50" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" class="bg-gray-400 hover:bg-gray-700/80"
                                         @click.prevent="$root.submit();">
                                         <svg class="w-6 h-6 text-white me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                                        </svg>
                                    {{ __('Wyloguj') }}

                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-sky-950 hover:text-sky-500 hover:bg-sky-100 focus:outline-none focus:bg-sky-100 focus:text-sky-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden ">
        <div class="pt-2 pb-3 space-y-1  border-y-4 border-lime-600">

            <div class="sm:-my-px md:ms-4 lg:ms-10 sm:flex flex-row text-sm lg:text-base xl:text-lg font-bold items-center ">

                <a href="{{ route('dashboard') }}" class="pl-4 tracking-wide px-2 py-3 xl:px-5 xl:py-4 flex flex-col  border-lime-600
                hover:text-sky-700 group transition-all duration-300 hover:bg-lime-100 truncate {{ request()->routeIs('dashboard') ? 'text-sky-700 bg-lime-100 border-l-4 border-sky-700' : 'text-sky-950' }}">
                Strona główna
                </a>
                <a href="{{ route('location') }}" class="pl-4 tracking-wide  px-2 py-3 xl:px-5 xl:py-4 flex flex-col    border-lime-600
                hover:text-sky-700 group transition-all duration-300 hover:bg-lime-100  truncate {{ request()->routeIs('location') ? 'text-sky-700 bg-lime-100 border-l-4 border-sky-700' : 'text-sky-950' }}">
                Lokalizuj pojazdy
                </a>
                <a href="{{ route('routes') }}" class="pl-4 tracking-wide px-2 py-3 xl:px-5 xl:py-4  flex flex-col   border-lime-600
                hover:text-sky-700 group transition-all duration-300 hover:bg-lime-100 truncate {{ request()->routeIs('routes') ? 'text-sky-700 bg-lime-100 border-l-4 border-sky-700' : 'text-sky-950' }}">
                Sprawdź trasy
                </a>
                <a href="{{ route('management.vehicles') }}" class="pl-4 tracking-wide  px-2 py-3 xl:px-5 xl:py-4  flex flex-col  border-lime-600
                hover:text-sky-700 group transition-all duration-300 hover:bg-lime-100  truncate {{ request()->routeIs('management.*') ? 'text-sky-700 bg-lime-100 border-l-4 border-sky-700' : 'text-sky-950' }}">
                Zarządzaj pojazdami
                </a>

            </div>

        </div>

        <!-- Responsive Settings Options -->



            <div class=" space-y-1 bg-lime-200">
                <!-- Account Management -->

                <div class="sm:-my-px md:ms-4 lg:ms-10 sm:flex flex-row text-base lg:text-base xl:text-lg font-bold items-center ">

                    <a href="{{ route('profile.show') }}" class="pl-4 tracking-wide px-2 py-2 xl:px-5 flex flex-col
                    hover:text-sky-700 group transition-all duration-300 hover:bg-lime-100 truncate">
                    {{ Auth::user()->name }}
                    </a>

                </div>
                <div class="space-x-2 flex flex-row justify-end p-2 border-t-4 border-lime-600">
                    <x-dropdown-link href="{{ route('profile.show') }}" class="bg-lime-500 hover:bg-lime-600/80 w-fit h-fit">
                        <svg class="w-6 h-6 text-white me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                          </svg>
                        {{ __('Mój profil') }}
                    </x-dropdown-link>





                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" class="flex flex-col justify-end" x-data>
                        @csrf

                        <x-dropdown-link href="{{ route('logout') }}" class="bg-gray-400 hover:bg-gray-700/80 w-fit"
                                 @click.prevent="$root.submit();">
                                 <svg class="w-6 h-6 text-white me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                                </svg>
                            {{ __('Wyloguj') }}

                        </x-dropdown-link>
                    </form>
                </div>



            </div>

    </div>
</nav>
