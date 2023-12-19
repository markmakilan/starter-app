@props(['stroke' => '#000'])

<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
    <g id="menu-{{ md5(rand()) }}-SVGRepo_bgCarrier" stroke-width="0"></g>
    <g id="menu-{{ md5(rand()) }}-SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
    <g id="menu-{{ md5(rand()) }}-SVGRepo_iconCarrier">
        <path d="M4 6H20M4 12H20M4 18H20" stroke="{{ $stroke }}" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round"></path>
    </g>
</svg>