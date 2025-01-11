<x-app-layout>
    <x-slot name="header">

            {{ __('Sprawdź historyczne dane pojazdów na mapie.') }}

    </x-slot>
    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto h-full">
            <div class="overflow-hidden h-full">
                <div class="grid grid-cols-1 md:grid-cols-12 space-y-4 md:space-y-0 md:space-x-4 xl:space-x-8 mx-2">
                    <div class="md:col-span-3 lg:col-span-2 justify-between shadow-sm border rounded-lg bg-white md:min-h-[50rem] p-3 ">

                        <x-management-nav/>
                    </div>
                    <div class="md:col-span-9 lg:col-span-10 min-h-[50rem] bg-white shadow-sm border rounded-lg">
                        @if(isset($lokacja))
                                @include('history-map')
                                @else
                                <h2 class="pl-6 p-4 text-xl lg:text-2xl font-bold text-sky-950 md:text-2xl place-content-end">Dane historyczne lokalizacji.</h2>
                                <div class="w-auto p-1 bg-lime-600"></div>
                                <div class="flex flex-col space-y-4 justify-center w-full h-[40rem]">
                                    <div class="w-16 h-16 lg:w-20 lg:h-20 mx-auto bg-lime-100 p-2 rounded-full shadow-sm justify-center items-center inline-flex ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-lime-500" fill="none" viewBox="0 0 24 24" strokeWidth={1.8} stroke="currentColor" className="size-4 lg:size-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="m3 3 1.664 1.664M21 21l-1.5-1.5m-5.485-1.242L12 17.25 4.5 21V8.742m.164-4.078a2.15 2.15 0 0 1 1.743-1.342 48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185V19.5M4.664 4.664 19.5 19.5" />
                                          </svg>
                                    </div>
                                    <div class="flex flex-col items-center w-auto">
                                        <h2 class="text-center text-sky-950 text-lg lg:text-xl font-semibold pb-2">Najpierw wybierz dane!</h2>
                                        <p class="text-center text-sky-950 text-sm lg:text-base font-normal pb-4">Zajrzyj do historii lokalizacji.</p>

                                            <a type="button" href="{{ route('management.history') }}" class="font-bold text-sky-950 text-center place-content-center w-auto py-2 px-5 text-sm 2xl:text-lg rounded-full bg-lime-100 flex flex-row place-content-center items-center justify-between ring-1 ring-lime-300 hover:ring hover:text-cyan-700 hover:bg-lime-100 transition ease-in-out duration-300">
                                                    Przejdź teraz
                                            </a>
                                    </div>
                                </div>
                                @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
