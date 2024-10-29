<div x-data="{ mobileFiltersOpen: false, sortMenuOpen: false, filterSectionsOpen: {}, label: '{{ $pojazdy[0]->Nazwa }}', }" class="p-4">


    <div class="h-full" >
        {{-- used for maps --}}
        <input type="text" name="nazwa" id="nazwa" hidden value="{!! $this->pojazd->Nazwa !!} ">

        <div class="mx-auto max-w-7xl">
            <div class="flex flex-row justify-between">
                <div class="flex space-x-4">
                <button wire.loading.attr="disabled" wire:loading.class="cursor-not-allowed opacity-70"  type="button" title="Usuń obszar" id="clearMapButton" class="px-4 py-2 text-sm font-medium text-white inline-flex items-center bg-red-700 hover:bg-red-800/80 ring-2 ring-red-600 rounded-2xl px-1 font-medium hover:ring-4 hover:font-semibold transition ease-in-out duration-300">
                        <svg class="w-6 h-6 text-white me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                      Usuń obszar
                  </button>
                  <button wire.loading.attr="disabled" wire:loading.class="cursor-not-allowed opacity-70" type="button" title="Zapisz obszar" id="sendData" class="px-4 py-2 text-sm font-medium text-white inline-flex items-center bg-lime-600 hover:bg-lime-700/80 ring-2 ring-lime-400 rounded-2xl px-1 font-medium hover:ring-4 hover:font-semibold transition ease-in-out duration-300">
                      <svg class="w-6 h-6 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                        </svg>
                      Zapisz obszar
                  </button>
                  @if (session()->has('success'))
                    <div class="text-lime-700 font-medium mt-2 ml-4">
                        {{ session('success') }}
                    </div>
                    @elseif (session()->has('error'))
                        <div class="text-red-600 font-medium  mt-2 ml-4">
                            {{ session('error') }}
                        </div>
                    @endif

                </div>
                {{-- Sortwanie --}}
                <div class="mb-1 w-full min-[360px]:w-auto flex flex-col min-[360px]:flex-row gap-y-4 min-[360px]:gap-y-0 items-center justify-end order-1 xl:order-2 self-end px-1 xl:px-0">

                        <div class="relative inline-block text-left self-end min-[360px]:self-none" x-data="{ sortMenuOpen: false }">
                            <div>
                                <button wire.loading.attr="disabled" title="Wybierz pojazd" type="button" x-on:click="sortMenuOpen = !sortMenuOpen" class="relative group inline-flex flex-col justify-start font-semibold text-sky-950" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                    <p class="absolute -top-4 text-xs ml-2 mr-4 bg-stone-50 p-1 pb-0 rounded-2xl">Wybierz pojazd:</p>
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
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md shadow-lg ring-2 ring-gray-200 focus:outline-none bg-stone-50" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="space-y-1 p-1 overflow-auto max-h-[300px]" role="none" >
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
            </div>
            <div class="flex flex-row justify-between border-y-2 border-gray-300 mt-4 py-1 px-2">
                {{-- loading animation --}}
                <div class="w-full flex flex-row justify-center items-center h-auto" wire:loading>
                    <div aria-label="Ładowanie..." role="status" class="flex flex-row justify-center space-x-2 w-full h-auto">
                        <div class="flex flex-row place-items-center">
                            <svg class="w-12 h-12 animate-spin stroke-amber-400" viewBox="0 0 256 256">
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
                            <span class="text-lg lg:text-3xl font-medium text-gray-500 ">Wczytywanie...</span>
                        </div>

                    </div>
                </div>
                <h2 wire:loading.remove class="text-2xl font-bold text-sky-950 max-w-xl text-balance place-content-center truncate">Edytowanie: <span class="text-gray-500">{{ $this->pojazd->Nazwa }}</span></h2>
                <label wire:loading.remove class="relative inline-flex items-center cursor-pointer space-x-2 text-gray-900 hover:text-cyan-800">
                    <svg class="w-12 h-12 {{ $this->pojazd->subscribe ? 'text-lime-600' : 'text-gray-500' }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                        <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                      </svg>
                      <span class="font-medium ">
                        {{ $this->pojazd->subscribe ? 'Włączone powiadamianie e-mail' : 'Wyłączone powiadamianie e-mail' }}
                    </span>
                    <button title="Przełącz powiadamianie e-mail" wire.loading.attr="disabled"
                        wire:click="toggleSubscribe"
                        class="relative inline-flex items-center justify-center w-16 h-8 transition-colors duration-300 rounded-full
                             hover:bg-gray-300/80 ring-2 ring-lime-400 hover:ring-4
                            {{ $this->pojazd->subscribe ? 'bg-lime-600' : 'bg-gray-200' }}">
                        <span
                            class="absolute top-0.5 left-0.5 w-7 h-7 rounded-full bg-white transition-transform duration-300
                                {{ $this->pojazd->subscribe ? 'translate-x-8' : 'translate-x-0' }}">
                        </span>
                    </button>
                </label>
            </div>

            <div class="mx-auto lg:grid max-w-2xl lg:mx-0 lg:max-w-none  mt-2">
                <div class="items-center flex flex-row text-left w-full justify-between">
                    <dl class="text-sm lg:text-base leading-7 text-stone-700 flex flex-row w-full justify-between">
                        <div class="place-content-center">Zaznacz obszar z uwzględnieniem 2,5m marginesu.</div>
                      <div class="bg-blue-100 ">

                        @if (!is_null($obszar))
                        <div class="px-2 p-1 font-medium" wire:loading.remove>Aktualnie poza obszarem: {{ $this->pojazd->notified ==1 ? 'Tak' : 'Nie' }}</div>
                        @endif

                          {{-- <div class=" rounded flex p-2 h-full items-center font-bold">

                            @if(isset($obszar))
                            <textarea placeholder="" cols="240" rows="10">{{ $obszar }}</textarea>

                            @endif


                          </div> --}}
                      </div>

                  </dl>

                </div>

            </div>

        </div>
    </div>

</div>


