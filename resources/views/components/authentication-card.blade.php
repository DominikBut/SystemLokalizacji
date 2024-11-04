<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-lg mt-12 px-8 py-6 bg-lime-50 overflow-hidden shadow-xl rounded-lg border-2 border-lime-500">
        {{ $slot }}
    </div>
</div>
