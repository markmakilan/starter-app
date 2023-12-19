@props(['disabled' => false])

<input {!! $attributes->merge(['class' => 'w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm py-1.5 text-xs text-gray-700 disabled:bg-gray-100 disabled:cursor-not-allowed']) !!} {{ $disabled ? 'disabled' : '' }}>
