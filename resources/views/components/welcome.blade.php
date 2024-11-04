<div class="p-6 lg:p-8 bg-white border-b-4 border-gray-200">
    <x-application-logo class="block h-12 w-auto" />



    <p class="mt-3 sm:mt-6 text-gray-500 leading-relaxed sm:max-w-4xl  sm:text-balance text-xs sm:text-sm lg:text-base">
        Możesz tutaj przede wszystkim śledzić bieżące lokalizacje twoich pojazdów, zarządzać ich konfiguracją, a także zapoznawać się z trasami jakie twoje pojazdy pokonały do tej pory!
    </p>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-16 p-6 lg:p-12">
    <div>
        <div class="flex items-center">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-8 text-lime-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
              </svg>

            <h2 class="ms-3 lg:text-xl font-bold text-gray-900">
                <a href="{{ route('location') }}" class="tracking-wide flex flex-col border-lime-600
                        hover:text-sky-700 group transition-all duration-300 truncate text-sky-950">
                        <div class="flex flex-row place-content-center justify-center place-items-center">
                            Lokalizuj pojazdy

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                              </svg>

                        </div>

                        <div class=" bg-sky-700 h-[0.10rem] w-0 group-hover:w-full transition-all duration-300 "></div>
                </a>
            </h2>
        </div>

        <p class="mt-2 sm:mt-4 text-gray-500 text-xs sm:text-sm leading-relaxed">
            Zobacz najnowsze lokalizacje twoich pojazdów za pomocą map Google.
        </p>

    </div>

    <div>
        <div class="flex items-center">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-8 text-lime-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
              </svg>

            <h2 class="ms-3 lg:text-xl font-bold text-gray-900">
                <a href="{{ route('routes') }}" class="tracking-wide flex flex-col border-lime-600
                        hover:text-sky-700 group transition-all duration-300 truncate text-sky-950">
                        <div class="flex flex-row place-content-center justify-center place-items-center">
                            Sprawdź trasy

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                              </svg>

                        </div>

                        <div class=" bg-sky-700 h-[0.10rem] w-0 group-hover:w-full transition-all duration-300 "></div>
                </a>
            </h2>
        </div>

        <p class="mt-2 sm:mt-4 text-gray-500 text-xs sm:text-sm leading-relaxed">
            Sprawdź aktualne trasy pokonane przez twoje pojazdy za pomocą map Google.
        </p>

    </div>

    <div>
        <div class="flex items-center">

              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-8 text-lime-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
              </svg>

            <h2 class="ms-3 lg:text-xl font-bold text-gray-900">
                <a href="{{ route('management.vehicles') }}" class="tracking-wide flex flex-col border-lime-600
                        hover:text-sky-700 group transition-all duration-300 truncate text-sky-950">
                        <div class="flex flex-row place-content-center justify-center place-items-center">
                            Zarządzaj pojazdami

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                              </svg>

                        </div>

                        <div class=" bg-sky-700 h-[0.10rem] w-0 group-hover:w-full transition-all duration-300 "></div>
                </a>
            </h2>
        </div>

        <p class="mt-2 sm:mt-4 text-gray-500 text-xs sm:text-sm leading-relaxed">
            Dodawaj nowe pojazdy lub zmień konfigurację dostępnych, sprawdź także historyczne dane odbierane przez system.
        </p>

    </div>

    <div>
        <div class="flex items-center">

              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-8 text-lime-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
              </svg>

            <h2 class="ms-3 lg:text-xl font-bold text-gray-900">
                <a href="{{ route('management.fence') }}" class="tracking-wide flex flex-col border-lime-600
                        hover:text-sky-700 group transition-all duration-300 truncate text-sky-950">
                        <div class="flex flex-row place-content-center justify-center place-items-center">
                            Obszar startowy

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                              </svg>

                        </div>

                        <div class=" bg-sky-700 h-[0.10rem] w-0 group-hover:w-full transition-all duration-300 "></div>
                </a>
            </h2>
        </div>

        <p class="mt-2 sm:mt-4 text-gray-500 text-xs sm:text-sm leading-relaxed">
            Zaznacz i skonfiguruj obszar startowy dla wybranych pojazdów za pomocą map Google.
        </p>

    </div>
</div>
<div class="p-8 sm:p-16 bg-white border-t-4 border-gray-200 w-full">
    <div class="w-full text-gray-300 text-center text-sm">By Dominik But</div>
</div>
