<div x-data="{ mobileFiltersOpen: false, sortMenuOpen: false, filterSectionsOpen: {}, label: '{{ $pojazdy[0]->Nazwa }}', }" class="p-4 pt-6">


    <div class="h-full">


        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col">

                    {{-- Sortwanie --}}
                <div class="mb-1 w-full min-[360px]:w-auto flex flex-col min-[360px]:flex-row gap-y-4 min-[360px]:gap-y-0 items-center px-1 xl:px-0">

                        <div class="relative inline-block text-left self-end min-[360px]:self-none" x-data="{ sortMenuOpen: false }">
                            <div>
                                <button title="Wybierz pojazd" type="button" x-on:click="sortMenuOpen = !sortMenuOpen" class="relative group inline-flex flex-col justify-start font-semibold text-sky-950" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                    <p class="absolute -top-4 text-sm ml-2 mr-4 bg-stone-50 p-1 pb-0 rounded-2xl">Wybierz pojazd:</p>
                                    <div class="min-w-48 bg-stone-50 flex flex-row place-content-center items-center justify-between text-xs lg:text-sm ring-2 ring-gray-300 rounded-2xl px-1 font-medium hover:ring-4 hover:text-cyan-700 hover:font-semibold transition ease-in-out duration-300">
                                            <div class="flex flex-row w-full justify-center">
                                                <p class="ml-3 p-1 pr-0 text-right lg:text-base" x-text="label"></p>

                                            </div>
                                            <svg class="mr-2 h-6 w-6 flex-shrink-0 pt-1" :class="{'rotate-180': sortMenuOpen, 'rotate-0': !sortMenuOpen}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0l-4.25-4.25a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                            </svg>
                                    </div>
                                </button>
                            </div>
                            {{-- Wybieranie pojazdu --}}
                            <div x-show="sortMenuOpen" x-on:click.away="sortMenuOpen = false" x-cloak x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md shadow-lg ring-2 ring-gray-200 focus:outline-none bg-stone-50" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="space-y-1 p-1" role="none" >
                                    @forelse ($pojazdy as $pojazd)
                                    <button wire.loading.attr="disabled" wire:click="tracking('{{ $pojazd->simID }}')" x-on:click="sortMenuOpen = false, label = '{{ $pojazd->Nazwa }}'"
                                        :class="{'bg-amber-400 font-semibold': label == '{{ $pojazd->Nazwa }}' }"
                                        class="truncate block w-full text-left rounded-md px-4 py-2 text-xs lg:text-sm text-sky-950 hover:bg-gray-200 hover:text-cyan-800 hover:font-semibold transition ease-out duration-300"
                                        role="menuitem" tabindex="-1" id="menu-item-0">{{ $pojazd->Nazwa }}</button>
                                    @empty
                                    <button wire.loading.attr="disabled" x-on:click="sortMenuOpen = false, label = 'Brak pojazdów'
                                        :class="{'bg-amber-400 font-semibold': label == 'Brak pojazdów' }"
                                        class="truncate block w-full text-left rounded-md px-4 py-2 text-xs lg:text-sm text-sky-950 hover:bg-gray-200 hover:text-cyan-800 hover:font-semibold transition ease-out duration-300"
                                        role="menuitem" tabindex="-1" id="menu-item-0">Brak pojazdów</button>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                </div>
                <h2 class="text-2xl font-bold text-sky-950 max-w-xl text-balance pt-2 truncate"><span wire:loading.remove>Pojazd: {{ $this->pojazd->Nazwa }}</span></h2>
                <h3 class="text-xl font-bold text-sky-80 max-w-xl text-balance truncate"><span wire:loading.remove>Trasa nr: {{ $this->pojazd->current_route }}</span></h3>

            </div>
            <div class="text-sm  text-cyan-800 " wire:loading.remove>
                Zapis trasy: {{ \Carbon\Carbon::setLocale('pl') }}{{ \Carbon\Carbon::parse(json_decode($this->dane)->points[count(json_decode($this->dane)->points) - 1]->created_at)->diffForHumans() }}
            </div>

            <div class="flex flex-col justify-between border-y-2 border-gray-300 py-2 mt-2 space-y-2 overflow-auto max-h-[500px]" wire:loading.remove>

                @foreach (json_decode($this->dane)->points as $index => $info)
                    <div class="rounded flex h-full flex-col p-1">
                        <div class="flex-col rounded-t-lg {{ $index == 0 ? 'bg-lime-300' : ($index == count(json_decode($this->dane)->points) - 1 ? 'bg-blue-300' : 'bg-gray-200') }} pb-2 p-1 h-full px-2">
                            <p class="font-bold">Punkt {{ $index == 0 ? 'startowy' : ($index == count(json_decode($this->dane)->points) - 1 ? 'końcowy' : $index + 1)  }}:</p>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                class="text-sky-950 w-4 h-4 flex-shrink-0 mr-1" stroke="currentColor" className="size-6">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                  </svg>
                                  <p class="self-center text-sm font-semibold">

                                    {!! App\Models\Coordinates::formatCoordinates($info->lat, $info->lng) !!}
                                </p>
                            </div>


                        </div>
                        <div class="rounded-bl-md text-xs text-gray-500 self-end place-content-end text-right p-1 bg-gray-100 w-full flex">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                class="text-gray-400 w-3 h-3 mr-1 self-center" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                  {{ \Carbon\Carbon::setLocale('pl') }}{!! \Carbon\Carbon::parse($info->created_at) !!}


                        </div>
                    </div>

                @endforeach

            </div>



        </div>
        {{-- loading animation --}}
    <div class="w-full flex flex-row justify-center items-center pt-8 h-[28rem]" wire:loading>
        <div aria-label="Ładowanie..." role="status" class="flex flex-row justify-center pt-36 space-x-2 w-full h-auto xl:h-fit">
            <div class="flex flex-row place-items-center">
                <svg class="w-12 h-12  animate-spin stroke-amber-400" viewBox="0 0 256 256">
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



