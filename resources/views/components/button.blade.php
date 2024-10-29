<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-lime-600 border border-transparent rounded-md font-semibold text-xs
text-white uppercase tracking-widest hover:bg-lime-700 focus:bg-lime-400 active:bg-lime-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
