<x-app-layout>
    <x-slot name="header">

            {{ __('Ustaw obszary startowe pojazdów.') }}

    </x-slot>

    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto h-full">
            <div class="overflow-hidden h-full">
                <div class="grid grid-cols-1 md:grid-cols-12 space-y-4 md:space-y-0 md:space-x-4 xl:space-x-8 mx-2">
                    <div class="md:col-span-3 lg:col-span-2 justify-between shadow-sm border rounded-lg bg-white md:min-h-[50rem] p-3 ">

                        <x-management-nav/>
                    </div>
                    <div class="md:col-span-9 lg:col-span-10 min-h-[50rem] bg-white shadow-sm border rounded-lg">
                        @include('geofence-map')
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

