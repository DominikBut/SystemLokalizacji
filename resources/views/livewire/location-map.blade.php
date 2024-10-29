@php
    ($pojazdy->count() > 0) ? $label = $pojazdy[0]->Nazwa : $label = 'Brak pojazdów';
@endphp
<div x-data="{ mobileFiltersOpen: false, sortMenuOpen: false, filterSectionsOpen: {}, label: '{{ $label }}', }" class="p-6">


    <div class="h-full">
        {{-- used for maps --}}

        @if (($pojazdy->count() > 0))
        <input type="text" name="lat" id="lat" hidden value="{!! $this->lokacja->latitude !!} ">
        <input type="text" name="lng" id="lng" hidden value="{!! $this->lokacja->longitude !!} ">
        <input type="text" name="czas" id="czas" hidden value="{{$this->lokacja->created_at->timezone('Europe/Warsaw')  }} ">
        <input type="text" name="nazwa" id="nazwa" hidden value="{!! $this->pojazd->Nazwa !!} ">
        @endif

        <div class="mx-auto max-w-7xl">
            <div class="flex flex-row justify-between">
                <div class="flex flex-row">
                    <h2 class="text-2xl font-bold text-sky-950 max-w-xl md:text-3xl text-balance place-content-end"><span wire:loading.remove>{{ (!empty($this->pojazd)) ? 'Pojazd: '.$this->pojazd->Nazwa : 'Brak pojazdów do wyboru!' }} </span>
                </div>

                </h2>
                    {{-- Sortwanie --}}
                <div class="mb-1 w-full min-[360px]:w-auto flex flex-col min-[360px]:flex-row gap-y-4 min-[360px]:gap-y-0 items-center justify-end order-1 xl:order-2 self-end px-1 xl:px-0">

                        <div class="relative inline-block text-left self-end min-[360px]:self-none" x-data="{ sortMenuOpen: false }">
                            <div>
                                <button title="Wybierz pojazd" type="button" x-on:click="sortMenuOpen = !sortMenuOpen" class="relative group inline-flex flex-col justify-start font-semibold text-sky-950" id="menu-button" aria-expanded="true" aria-haspopup="true">
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
                                    <button wire.loading.attr="disabled" x-on:click="sortMenuOpen = false, label = 'Brak pojazdów'"
                                        :class="{'bg-amber-400 font-semibold': label == 'Brak pojazdów' }"
                                        class="truncate block w-full text-left rounded-md px-4 py-2 text-xs lg:text-sm text-sky-950 hover:bg-gray-200 hover:text-cyan-800 hover:font-semibold transition ease-out duration-300"
                                        role="menuitem" tabindex="-1" id="menu-item-0">Brak pojazdów</button>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            @if(!empty($this->lokacja))
            <div class="flex flex-row justify-between border-y-2 border-gray-300 mt-2 py-1" wire:loading.remove>
                <div class="text-sm lg:text-base lg:leading-8 text-cyan-800 text-balance">Tel: {{ (!empty($this->pojazd->Telefon)) ? $this->pojazd->Telefon : 'Brak pojazdu' }} | {{ (!empty($this->pojazd->Opis)) ? $this->pojazd->Opis : 'Brak pojazdu' }}</div>
                <div class="text-sm lg:text-base lg:leading-8 text-cyan-800 place-content-end">
                    Ostatnia aktywność {{ \Carbon\Carbon::setLocale('pl') }} {{ (!empty($this->lokacja)) ? $this->lokacja->created_at->timezone('Europe/Warsaw')->diffForHumans() : 'Brak pojazdu' }}
                </div>
            </div>
            <div class="py-4" wire:loading.remove>
                <div class="w-full">
                    <div class="flex flex-col lg:flex-row rounded-lg bg-stone-100 items-center w-full shrink-0 grow-0 basis-auto shadow-md outline outline-2 outline-lime-600">
                        <div class="flex justify-center items-center rounded-md bg-lime-600 w-full h-full p-1 lg:p-4 lg:w-auto ring-1 ring-sky-950/10">
                          <svg class="h-4 w-4 text-stone-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" >
                            <path strokeLinecap="round" strokeLinejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                          </svg>
                        </div>
                        <p id="lokacja"
                        class="font-semibold text-base text-center sm:text-left sm:text-lg text-sky-950 lg:px-4 mx-2 lg:mx-0 pt-1 lg:pt-0 w-auto text-wrap lg:text-nowrap">
                            Lokalizacja
                        </p>
                  </div>
                </div>
            </div>
            <div class="mx-auto lg:grid max-w-2xl grid-cols-1 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3 mb-2" wire:loading.remove>
                <div class="sm:col-span-2 items-center flex flex-row text-left w-full">
                    <dl class="space-y-4 text-sm lg:text-base leading-7 text-stone-700 w-[32rem]">
                      <div class="relative w-full">
                          <div class=" bg-blue-100 rounded flex p-2 h-full items-center">

                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-sky-950 w-6 h-6 flex-shrink-0 mr-4" stroke="currentColor" className="size-6">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                              </svg>

                              <div class="font-bold flex flex-row space-x-6"><p>{!! (!empty($this->lokacja)) ? App\Models\Coordinates::formatCoordinates($this->lokacja->latitude, $this->lokacja->longitude) : 'Brak pojazdu' !!}</p></div>
                              @if(!empty($this->lokacja) && $this->lokacja->route !=0)
                              <h3 class="text-base font-bold text-sky-80 text-balance truncate px-2" wire:loading.remove>| Trasa nr: {{ $this->lokacja->route }}</h3>
                              @endif
                            </div>
                      </div>
                      <div class="relative">
                          <div class="bg-blue-100 rounded flex p-2 h-full items-center font-bold">

                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linejoin="round" stroke-width="2" class="text-sky-950 w-6 h-6 flex-shrink-0 mr-4" stroke="currentColor" className="size-6">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                              </svg>

                                Sygnał:
                                <span class="@if($this->lokacja->strength < 20) text-red-500 @elseif($this->lokacja->strength < 50) text-yellow-500 @else text-green-500 @endif">
                                    {!! '&nbsp;'. $this->lokacja->strength !!}%
                                </span>
                                {!! '&nbsp;&nbsp;&nbsp;&nbsp;' !!}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linejoin="round" stroke-width="2" class="text-sky-950 w-6 h-6 flex-shrink-0 mr-4" stroke="currentColor" className="size-6">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M21 10.5h.375c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125H21M4.5 10.5H18V15H4.5v-4.5ZM3.75 18h15A2.25 2.25 0 0 0 21 15.75v-6a2.25 2.25 0 0 0-2.25-2.25h-15A2.25 2.25 0 0 0 1.5 9.75v6A2.25 2.25 0 0 0 3.75 18Z" />
                                </svg>
                                Bateria:
                                <span class="@if($this->lokacja->battery < 20) text-red-500 @elseif($this->lokacja->battery < 50) text-yellow-500 @else text-green-500 @endif">
                                    {!! '&nbsp;'. $this->lokacja->battery !!}%
                                </span>





                          </div>
                      </div>
                      <div class="relative">
                              <div class="bg-blue-100 rounded flex p-2 h-full items-center">

                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" stroke="currentColor" class="text-sky-950 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                  </svg>

                                  <p class="font-bold">{{ !empty($this->lokacja) ? App\Models\Coordinates::formatCreatedAt($this->lokacja->created_at) : 'Brak pojazdu' }} </p>

                              </div>
                      </div>

                  </dl>

                </div>
              <div class="flex invisible sm:visible" wire:loading.remove>

                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" stroke="currentColor"
                  class="w-[0rem] max-w-none lg:max-xl:w-[6rem] xl:w-[10rem] text-lime-600">
                    <path strokeLinecap="round" strokeLinejoin="round" d="m6.115 5.19.319 1.913A6 6 0 0 0 8.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 0 0 2.288-4.042 1.087 1.087 0 0 0-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 0 1-.98-.314l-.295-.295a1.125 1.125 0 0 1 0-1.591l.13-.132a1.125 1.125 0 0 1 1.3-.21l.603.302a.809.809 0 0 0 1.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 0 0 1.528-1.732l.146-.292M6.115 5.19A9 9 0 1 0 17.18 4.64M6.115 5.19A8.965 8.965 0 0 1 12 3c1.929 0 3.716.607 5.18 1.64" />
                  </svg>

              </div>
              @else

                                <div class="grid gap-4 w-full py-8 lg:py-[2.4rem] mt-2 border-t-2 border-gray-300">
                                    <div class="w-16 h-16 lg:w-20 lg:h-20 mx-auto bg-amber-100 p-2 rounded-full shadow-sm justify-center items-center inline-flex ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-amber-500" fill="none" viewBox="0 0 24 24" strokeWidth={1.8} stroke="currentColor" className="size-4 lg:size-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="m3 3 1.664 1.664M21 21l-1.5-1.5m-5.485-1.242L12 17.25 4.5 21V8.742m.164-4.078a2.15 2.15 0 0 1 1.743-1.342 48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185V19.5M4.664 4.664 19.5 19.5" />
                                          </svg>
                                    </div>
                                    <div class="flex flex-col items-center w-auto">
                                        <h2 class="text-center text-sky-950 text-lg lg:text-xl font-semibold pb-2">Najpierw dodaj nowy pojazd!</h2>
                                        <p class="text-center text-sky-950 text-sm lg:text-base font-normal pb-4">Zajrzyj sekcji zarządzanie.</p>

                                            <a type="button" href="{{ route('management.vehicles') }}" class="font-bold text-sky-950 text-center place-content-center w-auto py-2 px-5 text-sm 2xl:text-lg rounded-full bg-amber-100 flex flex-row place-content-center items-center justify-between ring-1 ring-amber-300 hover:ring hover:text-cyan-700 hover:bg-amber-50 transition ease-in-out duration-300">
                                                    Przejdź teraz
                                            </a>
                                    </div>
                                </div>
              @endif
            </div>

        </div>
        {{-- loading animation --}}
    <div class="w-full flex flex-row justify-center items-center pt-8 h-[19rem]" wire:loading>
        <div aria-label="Ładowanie..." role="status" class="flex flex-row justify-center pt-24 space-x-2 w-full h-auto xl:h-fit">
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
    </div>
</div>


