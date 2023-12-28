@props(['target' => 'n/a'])

<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-3 py-1.5 bg-gray-800 border border-transparent rounded-md text-gray-100 text-xs tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}
    wire:target="{{ $target }}" wire:loading.class="pointer-events-none">
    <div class="flex items-center justify-center gap-2">
        <x-icon.loading class="w-3.5 h-3.5" fill="#FFF" wire:target="{{ $target }}" wire:loading />
        <span>{{ $slot }}</span>
    </div>
</button>