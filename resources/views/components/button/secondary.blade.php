<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-3 py-1.5 bg-white border border-gray-300 rounded-md text-gray-900 text-xs tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>