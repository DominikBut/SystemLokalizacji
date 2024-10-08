
<div x-data="{ mobileFiltersOpen: false, sortMenuOpen: false, filterSectionsOpen: {}, label: '{{ $pojazdy[0]->Nazwa }}', }" class="p-4">

    {{-- Sortwanie --}}
    <div class="w-full min-[360px]:w-auto flex flex-col min-[360px]:flex-row gap-y-4 min-[360px]:gap-y-0 items-center order-1 xl:order-2 self-end px-1 xl:px-0 ">
        <div class="flex flex-row items-center self-end min-[360px]:self-none">
            {{-- Sortowanie button mobilne --}}
            <button type="button" wire.loading.attr="disabled" class=" rounded-full xl:hidden text-sky-950 hover:text-cyan-700 transition ease-out duration-300" x-on:click="mobileFiltersOpen = true">
                <svg  class="size-6" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path fillRule="evenodd" d="M3.792 2.938A49.069 49.069 0 0 1 12 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 0 1 1.541 1.836v1.044a3 3 0 0 1-.879 2.121l-6.182 6.182a1.5 1.5 0 0 0-.439 1.061v2.927a3 3 0 0 1-1.658 2.684l-1.757.878A.75.75 0 0 1 9.75 21v-5.818a1.5 1.5 0 0 0-.44-1.06L3.13 7.938a3 3 0 0 1-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836Z" clipRule="evenodd" />
                </svg>
            </button>
            {{-- Spinner --}}
            <div class="size-5 xl:size-6 mx-1">
                <span wire:loading.delay disabled>
                    <svg class="animate-spin size-5 xl:size-6" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle opacity="0.5"cx="10" cy="10"  r="9" stroke="orange" stroke-width="2"/>
                    <mask id="path-2-inside-1_2527_20936" fill="white">
                        <path d="M18.4713 13.0345C18.9921 13.221 19.5707 12.9508 19.7043 12.414C20.0052 11.2042 20.078 9.94582 19.9156 8.70384C19.7099 7.12996 19.1325 5.62766 18.2311 4.32117C17.3297 3.01467 16.1303 1.94151 14.7319 1.19042C13.6285 0.597723 12.4262 0.219019 11.1884 0.0708647C10.6392 0.00512742 10.1811 0.450137 10.1706 1.00319C10.1601 1.55625 10.6018 2.00666 11.1492 2.08616C12.0689 2.21971 12.9609 2.51295 13.7841 2.95511C14.9023 3.55575 15.8615 4.41394 16.5823 5.45872C17.3031 6.50351 17.7649 7.70487 17.9294 8.96348C18.0505 9.89002 18.008 10.828 17.8063 11.7352C17.6863 12.2751 17.9506 12.848 18.4713 13.0345Z"/>
                    </mask>
                    <path d="M18.4713 13.0345C18.9921 13.221 19.5707 12.9508 19.7043 12.414C20.0052 11.2042 20.078 9.94582 19.9156 8.70384C19.7099 7.12996 19.1325 5.62766 18.2311 4.32117C17.3297 3.01467 16.1303 1.94151 14.7319 1.19042C13.6285 0.597723 12.4262 0.219019 11.1884 0.0708647C10.6392 0.00512742 10.1811 0.450137 10.1706 1.00319C10.1601 1.55625 10.6018 2.00666 11.1492 2.08616C12.0689 2.21971 12.9609 2.51295 13.7841 2.95511C14.9023 3.55575 15.8615 4.41394 16.5823 5.45872C17.3031 6.50351 17.7649 7.70487 17.9294 8.96348C18.0505 9.89002 18.008 10.828 17.8063 11.7352C17.6863 12.2751 17.9506 12.848 18.4713 13.0345Z" stroke="white" stroke-width="4" mask="url(#path-2-inside-1_2527_20936)" />
                    </svg>
                </span>
            </div>

        </div>
        <div class="relative inline-block text-left self-end min-[360px]:self-none" x-data="{ sortMenuOpen: false }">
            <div>
                <button title="Wybierz pojazd" type="button" x-on:click="sortMenuOpen = !sortMenuOpen" class="relative group inline-flex flex-col justify-start font-semibold text-sky-950" id="menu-button" aria-expanded="true" aria-haspopup="true">
                    <p class="absolute -top-4 text-xs ml-2 mr-4 bg-stone-50 p-1 pb-0 rounded-2xl">Wybierz pojazd:</p>
                    <div class="min-w-48 bg-stone-50 flex flex-row place-content-center items-center justify-between text-xs lg:text-sm ring-2 ring-gray-300 rounded-2xl px-1 font-medium hover:ring-4 hover:text-cyan-700 hover:font-semibold transition ease-in-out duration-300">
                            <div class="flex flex-row w-full justify-center">
                                <p class="ml-3 p-1 pr-0 text-right" x-text="label"></p>

                            </div>
                            <svg class="mr-2 h-6 w-6 flex-shrink-0 pt-1" :class="{'rotate-180': sortMenuOpen, 'rotate-0': !sortMenuOpen}" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0l-4.25-4.25a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                    </div>
                </button>
            </div>
            {{-- Sortowanie typy --}}
            <div x-show="sortMenuOpen" x-on:click.away="sortMenuOpen = false" x-cloak x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md shadow-lg ring-2 ring-gray-200 focus:outline-none bg-stone-50" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                <div class="p-1" role="none" >
                    @forelse ($pojazdy as $pojazd)
                    <button wire.loading.attr="disabled" wire:click="tracking('{{ $pojazd->simID }}')" x-on:click="sortMenuOpen = false, label = '{{ $pojazd->Nazwa }}'" :class="{'bg-amber-400 font-semibold': label == '{{ $pojazd->Nazwa }}' }" class="block w-full text-left rounded-md px-4 py-2 text-xs lg:text-sm text-sky-950 hover:bg-gray-200 hover:text-cyan-800 hover:font-semibold transition ease-out duration-300" role="menuitem" tabindex="-1" id="menu-item-0">{{ $pojazd->Nazwa }}</button>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
</div>
{{-- loading animation --}}
<div class="h-full w-full flex flex-row justify-center items-center xl:items-top pt-8 h-lvh" wire:loading>
    <div aria-label="Ładowanie..." role="status" class="flex flex-row justify-center pt-36 space-x-2 w-full h-auto xl:h-fit">
        <div class="flex flex-row place-items-center">
            <svg class="w-12 h-12 xl:w-20 xl:h-20 animate-spin stroke-amber-400" viewBox="0 0 256 256">
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
<div class="h-full" wire:loading.remove>
    {{ $this->pojazd->Nazwa }}<br>
    {{ $this->pojazd->simID }}<br>
    {{ $this->pojazd->Telefon }}<br>
    {{ $this->pojazd->Opis }}<br>
    Odbieranie:{{ $this->pojazd->Status }}<br>
    Aktywność:{{ $this->pojazd->Odbieranie }}<br>
    {{ $this->lokacja->strength }}% <br>
    {{ $this->lokacja->battery }}% <br>
    {{ $this->lokacja->latitude }} <br>
    {{ $this->lokacja->longitude }} <br>
    {{ $this->lokacja->created_at->timezone('Europe/Warsaw') }}
</div>

