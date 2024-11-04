<x-app-layout>
    <x-slot name="header">
        <div class="text-cyan-800">
            {{ __('Witaj!') }}
        </div>


</x-slot>

    <div class="py-8 h-full m-auto">
        <div class="max-w-7xl m-auto px-2 xl:px-0">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg border-2 border-lime-500">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
