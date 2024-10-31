<button {{ $attributes->merge(['type' => 'submit', 'class' =>
'px-4 py-2 text-sm font-semibold text-white inline-flex items-center bg-lime-600 hover:bg-lime-700/80 ring-2 ring-lime-400 rounded-2xl px-1 hover:ring-4 hover:font-semibold transition ease-in-out duration-300
']) }}>
    {{ $slot }}
</button>
