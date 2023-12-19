<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-3 py-1.5 bg-red-600 border border-transparent rounded-md text-gray-100 text-xs tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>