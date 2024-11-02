@php
    ($pojazdy->count() > 0) ? $label = $pojazdy[0]->Nazwa : $label = 'Brak pojazdów';
@endphp
<div x-data="{ mobileFiltersOpen: false, sortMenuOpen: false, filterSectionsOpen: {}, label: '{{ $label }}', }" class="p-4 pt-6 h-full">


    <div class="h-full">


        <div class="mx-auto max-w-7xl flex flex-col h-full">
            <div class="flex flex-col">

                    {{-- Sortwanie --}}
                <div class="mb-1 w-full min-[360px]:w-auto flex flex-col min-[360px]:flex-row gap-y-4 min-[360px]:gap-y-0 items-center px-1 xl:px-0">

                        <div class="relative inline-block text-left self-end min-[360px]:self-none w-full" x-data="{ sortMenuOpen: false }">
                            <div class="w-full">
                                <button title="Wybierz pojazd" type="button" x-on:click="sortMenuOpen = !sortMenuOpen" class="w-full relative group inline-flex flex-col justify-start font-semibold text-sky-950" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                    <p class="absolute -top-4 text-sm ml-2 mr-4 bg-stone-50 p-1 pb-0 rounded-2xl">Wybierz pojazd:</p>
                                    <div class="min-w-48 w-full bg-stone-50 flex flex-row place-content-center items-center justify-between text-xs lg:text-sm ring-2 ring-gray-300 rounded-2xl px-1 font-medium hover:ring-4 hover:text-cyan-700 hover:font-semibold transition ease-in-out duration-300">
                                            <div class="flex flex-row w-full justify-center">
                                                <p class="ml-3 p-1 pr-0 text-right text-base truncate" x-text="label"></p>

                                            </div>
                                            <svg class="mr-2 h-6 w-6 flex-shrink-0 pt-1" :class="{'rotate-180': sortMenuOpen, 'rotate-0': !sortMenuOpen}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0l-4.25-4.25a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                            </svg>
                                    </div>
                                </button>
                            </div>
                            {{-- Wybieranie pojazdu --}}
                            <div x-show="sortMenuOpen" x-on:click.away="sortMenuOpen = false" x-cloak x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 z-10 mt-2 min-w-48 w-full origin-top-right rounded-md shadow-lg ring-2 ring-gray-200 focus:outline-none bg-stone-50" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="space-y-1 p-1 overflow-auto max-h-[300px]" role="none" >
                                    @forelse ($pojazdy as $pojazd)
                                    <button wire.loading.attr="disabled" wire:click="tracking('{{ $pojazd->simID }}')" x-on:click="sortMenuOpen = false, label = '{{ $pojazd->Nazwa }}'"
                                        :class="{'bg-lime-400 font-semibold': label == '{{ $pojazd->Nazwa }}' }"
                                        class="truncate block w-full text-left rounded-md px-4 py-2 text-sm text-sky-950 hover:bg-gray-200 hover:text-cyan-800 hover:font-semibold transition ease-out duration-300"
                                        role="menuitem" tabindex="-1" id="menu-item-0">{{ $pojazd->Nazwa }}</button>
                                    @empty
                                    <button wire.loading.attr="disabled" x-on:click="sortMenuOpen = false, label = 'Brak pojazdów'"
                                        :class="{'bg-lime-400 font-semibold': label == 'Brak pojazdów' }"
                                        class="truncate block w-full text-left rounded-md px-4 py-2 text-sm text-sky-950 hover:bg-gray-200 hover:text-cyan-800 hover:font-semibold transition ease-out duration-300"
                                        role="menuitem" tabindex="-1" id="menu-item-0">Brak pojazdów</button>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                </div>
                <h2 class="text-sm font-semibold text-sky-700 text-balance  truncate "><span wire:loading.remove wire:target.except="previousPage, nextPage, selectRoute">{{ (!empty($this->pojazd)) ? 'Wyświetlanie dla: '.$this->pojazd->Nazwa : 'Brak pojazdów do wyboru!' }}</span></h2>

                <h3 class="text-2xl mt-1 font-bold text-sky-80 text-balance truncate border-t-2 border-gray-300 {{ empty($selectedRoute) ? 'py-2': '' }}"><span wire:loading.remove wire:target.except="previousPage, nextPage, selectRoute">{{ (!empty($selectedRoute)) ? 'Trasa nr: '.$selectedRoute : 'Brak dostępnych tras' }} </span></h3>

            </div>
            @if (!empty($this->dane))
            <div class="ml-2 mb-1 text-sm text-cyan-800 " wire:loading.remove wire:target.except="previousPage, nextPage, selectRoute">
                Zapis: {{ \Carbon\Carbon::setLocale('pl') }}{{ \Carbon\Carbon::parse(json_decode($this->dane)->points[count(json_decode($this->dane)->points) - 1]->created_at)->timezone('Europe/Warsaw')->diffForHumans() }}
            </div>
            <div class="ml-2 text-sm font-bold text-sky-80 truncate" wire:loading.remove wire:target.except="previousPage, nextPage, selectRoute">
                Szacowana długość: {{ $this->totalDistance }}km
            </div>

            @endif


            <div class="flex flex-col border-y-2 border-gray-300 py-2 mt-2 space-y-2 overflow-auto h-[500px] xd-container" id="lista" wire:loading.remove wire:target.except="previousPage, nextPage, selectRoute">
                @if (!empty($this->pojazd))
                @if (!empty($this->dane))
                @foreach (json_decode($this->dane)->points as $index => $info)
                    <div class="rounded flex h-fit flex-col p-1" >
                        <div class="flex-col rounded-t-lg {{ $index == 0 ? 'bg-lime-300' : ($index == count(json_decode($this->dane)->points) - 1 ? 'bg-blue-300' : 'bg-gray-200') }} pb-2 p-1 h-full px-2">
                            <p class="font-bold xd cursor-pointer hover:underline" data-index="{{ $index }}">Punkt {{ $index == 0 ? 'startowy' : ($index == count(json_decode($this->dane)->points) - 1 ? 'końcowy' : $index + 1)  }}:</p>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                class="text-sky-950 w-4 h-4 flex-shrink-0 mr-1" stroke="currentColor" className="size-6">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                  </svg>
                                  <p class="self-center text-sm font-semibold text-wrap">

                                    {!! App\Models\Coordinates::formatCoordinates($info->lat, $info->lng) !!}
                                </p>
                            </div>
                        </div>
                        <div class="rounded-bl-md text-xs text-gray-500 self-end place-content-end text-right p-1 bg-gray-100 w-full flex">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                class="text-gray-400 w-3 h-3 mr-1 self-center" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                  {{ \Carbon\Carbon::setLocale('pl') }}{!! \Carbon\Carbon::parse($info->created_at)->timezone('Europe/Warsaw')->translatedFormat('j F Y H:i:s') !!}
                        </div>
                    </div>
                @endforeach
                @else
                <div class="font-bold text-xl text-sky-950 w-full text-center pt-36 text-balance">{{ !empty($this->pojazd->base_area) ? 'Brak odebranych danych' : 'Spróbuj najpierw utworzyć obszar startowy' }}</div>
                @endif
                @else
                <div class="grid gap-4 w-full pt-32">
                    <div class="w-16 h-16  mx-auto bg-lime-100 p-2 rounded-full shadow-sm justify-center items-center inline-flex ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-lime-500" fill="none" viewBox="0 0 24 24" strokeWidth={1.8} stroke="currentColor" className="size-4 lg:size-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="m3 3 1.664 1.664M21 21l-1.5-1.5m-5.485-1.242L12 17.25 4.5 21V8.742m.164-4.078a2.15 2.15 0 0 1 1.743-1.342 48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185V19.5M4.664 4.664 19.5 19.5" />
                          </svg>
                    </div>
                    <div class="flex flex-col items-center w-auto">
                        <h2 class="text-center text-sky-950 text-lg font-semibold pb-1">Najpierw dodaj nowy pojazd!</h2>
                        <p class="text-center text-sky-950 text-sm lg:text-base font-normal pb-3">Zajrzyj sekcji zarządzanie.</p>

                            <a type="button" href="{{ route('management.vehicles') }}" class="font-bold text-sky-950 text-center place-content-center w-auto py-2 px-5 text-sm 2xl:text-lg rounded-full bg-lime-100 flex flex-row place-content-center items-center justify-between ring-1 ring-lime-300 hover:ring hover:text-cyan-700 hover:bg-lime-50 transition ease-in-out duration-300">
                                    Przejdź teraz
                            </a>
                    </div>
                </div>

                @endif
            </div>
            <div class="flex flex-col mt-auto">
                @if (!empty($this->pojazd))
                    @if (!empty($this->dane))
                <div class="text-sm my-3 font-semibold text-cyan-800 " wire:loading.remove wire:target.except="previousPage, nextPage, selectRoute">
                    Wybierz zapisaną trasę: 1 - {{ $this->pojazd->current_route }}
                </div>
                <div class="flex justify-center space-x-2  items-center" wire:loading.remove wire:target.except="previousPage, nextPage, selectRoute">
                    <!-- Left Arrow Button -->
                    <button title="Cofnij"
                        wire:click="previousPage"
                        class="bg-gray-100 hover:bg-gray-200 py-1 px-3 border-2 border-gray-300 rounded-md font-bold hover:border-gray-400 hover:text-cyan-700  transition ease-in-out duration-300"
                        {{ $startIndex <= 0 ? 'disabled' : '' }}
                    >
                        &lt;
                    </button>
                    <!-- Route Button at Current startIndex -->
                    @if (!empty($this->pojazd->current_route))
                    @for ($i = $startIndex; $i < min($totalRoutes, $startIndex + $buttonsPerPage); $i++)
                        <button title="Trasa {{ $i + 1 }}"
                            wire:click="selectRoute({{ $i+1 }})"

                        class=" py-1 px-3 border-2 rounded-md font-bold transition ease-in-out duration-300
                            {{ $i+1 == $selectedRoute  ? 'bg-lime-500 text-white hover:bg-lime-400 border-gray-400 hover:text-cyan-900 hover:border-gray-600' : 'bg-gray-100 border-gray-400 hover:bg-gray-300 hover:border-gray-600 hover:text-cyan-700' }}"
                        >
                            {{ $i + 1 }} <!-- Display as 1-indexed -->
                        </button>
                    @endfor

                    @endif

                    <!-- Right Arrow Button -->
                    <button title="Dalej"
                        wire:click="nextPage"
                        class="bg-gray-100 hover:bg-gray-200 py-1 px-3 border-2 border-gray-300 rounded-md font-bold hover:border-gray-400 hover:text-cyan-700  transition ease-in-out duration-300"
                        {{ $startIndex + $buttonsPerPage >= $totalRoutes ? 'disabled' : '' }}
                        >
                        &gt;
                    </button>
                </div>
                @endif
                @endif
            </div>
            {{-- loading animation --}}
            <div class="w-full flex flex-row justify-center items-center pt-32 h-[660px]" wire:loading wire:target.except="previousPage, nextPage, selectRoute">
                <div aria-label="Ładowanie..." role="status" class="flex flex-row justify-center pt-36 space-x-2 w-full ">
                    <div class="flex flex-row place-items-center">
                        <svg class="w-12 h-12  animate-spin stroke-lime-400" viewBox="0 0 256 256">
                            <line x1="128" y1="32" x2="128" y2="64" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                            <line x1="195.9" y1="60.1" x2="173.3" y2="82.7" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="24"></line>
                            <line x1="224" y1="128" x2="192" y2="128" stroke-linecap="round" stroke-linejoin="round" stroke-width="24">
                            </line>
                            <line x1="195.9" y1="195.9" x2="173.3" y2="173.3" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="24"></line>
                            <line x1="128" y1="224" x2="128" y2="192" stroke-linecap="round" stroke-linejoin="round" stroke-width="24">
                            </line>
                            <line x1="60.1" y1="195.9" x2="82.7" y2="173.3" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="24"></line>
                            <line x1="32" y1="128" x2="64" y2="128" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                            <line x1="60.1" y1="60.1" x2="82.7" y2="82.7" stroke-linecap="round" stroke-linejoin="round" stroke-width="24">
                            </line>
                        </svg>
                        <span class="text-lg lg:text-xl font-medium text-gray-500 ">Wczytywanie...</span>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>



