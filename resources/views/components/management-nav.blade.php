<div>
    <h2 class="text-balance font-bold tracking-wider p-4 xl:p-6 text-lg lg:text-xl 2xl:text-2xl text-capitalize text-sky-950 rounded-md bg-lime-100 border-x-4 border-lime-600 mb-4 ">
        Opcje zarządzania
    </h2>
     <!-- Navigation Links -->
    <div class="flex flex-col space-y-2 p-2 border-t-2 border-gray-300 md:pt-4 text-sm xl:text-base">

        <a href="{{ route('management.vehicles') }}" class="tracking-wide font-semibold  border-gray-300 px-3 py-2 md:py-3 xl:px-4  flex flex-col rounded-r-lg rounded-l-lg text-wrap text-sky-950 border-x-2 border-lime-600
        hover:text-sky-700 group transition-all duration-300 hover:bg-lime-100  {{ request()->routeIs('management.vehicles') ? 'text-sky-700 bg-lime-100' : 'bg-stone-50' }}">
            Lista pojazdów
            <div class="border-b border-gray-300 bg-sky-700 h-[0.15rem] w-0 group-hover:w-full transition-all duration-300 {{ request()->routeIs('management.vehicles') ? 'w-full' : '' }}"></div>
        </a>
        <div class="border-b-2 border-gray-200 bg-gray-300 w-full"></div>
        <a href="{{ route('management.history') }}" class="tracking-wide font-semibold  border-gray-300 px-3 py-2 md:py-3 xl:px-4  flex flex-col rounded-r-lg rounded-l-lg text-wrap text-sky-950 border-x-2 border-lime-600
        hover:text-sky-700 group transition-all duration-300 hover:bg-lime-100  {{ request()->routeIs('management.history') ? 'text-sky-700 bg-lime-100' : 'bg-stone-50' }}">
        Dane lokalizacji
            <div class="border-b border-gray-300 bg-sky-700 h-[0.15rem] w-0 group-hover:w-full transition-all duration-300 {{ request()->routeIs('management.history') ? 'w-full' : '' }}"></div>
        </a>
        <div class="border-b-2 border-gray-200 bg-gray-300 w-full"></div>
        <a href="{{ route('management.fence') }}" class="tracking-wide font-semibold  border-gray-300 px-3 py-2 md:py-3 xl:px-4  flex flex-col rounded-r-lg rounded-l-lg text-wrap text-sky-950 border-x-2 border-lime-600
        hover:text-sky-700 group transition-all duration-300 hover:bg-lime-100  {{ request()->routeIs('management.fence') ? 'text-sky-700 bg-lime-100' : 'bg-stone-50' }}">
            Obszar startowy
            <div class="border-b border-gray-300 bg-sky-700 h-[0.15rem] w-0 group-hover:w-full transition-all duration-300 {{ request()->routeIs('management.fence') ? 'w-full' : '' }}"></div>
        </a>
        <div class="border-b-2 border-gray-200 bg-gray-300 w-full"></div>
        <a href="{{ route('management.oldmap') }}" class=" tracking-wide font-semibold  border-gray-300 px-3 py-2 md:py-3 xl:px-4  flex flex-col rounded-r-lg rounded-l-lg text-wrap text-sky-950 border-x-2 border-lime-600
        hover:text-sky-700 group transition-all duration-300 hover:bg-lime-100  {{ request()->routeIs('management.oldmap') ? 'text-sky-700 bg-lime-100' : 'bg-stone-50' }}">
            Mapa lokalizacji
            <div class="border-b border-gray-300 bg-sky-700 h-[0.15rem] w-0 group-hover:w-full transition-all duration-300 {{ request()->routeIs('management.oldmap') ? 'w-full' : '' }}"></div>
        </a>
        <div class="border-b-2 border-gray-200 bg-gray-300 w-full"></div>

    </div>
</div>
