@props(['name' => false])

<div 
    class="relative z-50" 
    aria-labelledby="modal-title" 
    role="dialog" 
    aria-modal="true" 
    x-show="{{ $name }}">
    <div 
        class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"
        x-transition:enter="ease-out duration-300" 
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" 
        x-transition:leave="ease-in-out duration-200"
        x-transition:leave-start="opacity-100" 
        x-transition:leave-end="opacity-0" 
        x-show="{{ $name }}"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                x-transition:enter="ease-out duration-300" 
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                x-transition:leave="ease-in-out duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                x-show="{{ $name }}"
                x-on:click.away="{{ $name }} = false">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    {{ $content }}
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:px-6 gap-3 justify-end">
                    {{ $action }}
                </div>
            </div>
        </div>
    </div>
</div>