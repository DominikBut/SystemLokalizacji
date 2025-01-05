<x-guest-layout>
    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-authentication-card-logo />
            </div>

            <div class="py-8 h-full mt-12 minh-4-[400px]">
                <div class="max-w-7xl my-auto px-2 xl:px-0">
                    <div class="bg-white py-8 pb-12 overflow-hidden shadow-xl rounded-lg border-2 border-lime-500">
                        <div class="p-6 lg:p-8 bg-white">
                            <h1 class="text-xl lg:text-4xl font-bold text-left text-sky-950 text-balance place-content-center tracking-wider">
                                Informacje o systemie
                            </h1>
                            <p class="mt-3 sm:mt-6 text-gray-500 leading-relaxed sm:max-w-4xl  sm:text-balance text-xs sm:text-sm lg:text-base">
                                Możesz tutaj przede wszystkim śledzić bieżące lokalizacje twoich pojazdów, zarządzać ich konfiguracją, a także zapoznawać się z trasami jakie twoje pojazdy pokonały do tej pory!
                            </p>
                            <p class="mt-3 sm:mt-6 text-gray-500 leading-relaxed sm:max-w-4xl  sm:text-balance text-xs sm:text-sm lg:text-base">
                                Możesz tutaj przede wszystkim śledzić bieżące lokalizacje twoich pojazdów, zarządzać ich konfiguracją, a także zapoznawać się z trasami jakie twoje pojazdy pokonały do tej pory!
                            </p>
                                                <a href="{{ URL::to('/') }}" class="mt-8 flex flex-row place-content-center justify-start place-items-center tracking-wide border-lime-600
                                                hover:text-sky-700 transition-all duration-300 truncate text-sky-950 cursor-pointer">


                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                                                      </svg>
                                                      Strona główna
                                                    </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
