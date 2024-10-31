<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zarządzanie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto h-full">
            <div class="overflow-hidden h-full">
                <div class="grid grid-cols-12 space-x-8">
                    <div class="col-span-2 justify-between shadow-sm border rounded-lg bg-white min-h-[50rem] p-3">

                        <x-management-nav/>
                    </div>
                    <div class="col-span-10 min-h-[50rem] bg-white shadow-sm border rounded-lg">
                        @livewire('list-vehicles')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
