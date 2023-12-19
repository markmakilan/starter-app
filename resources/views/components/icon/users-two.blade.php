@props(['stroke' => '#000'])

<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
    <g id="users-two-{{ md5(rand()) }}-SVGRepo_bgCarrier" stroke-width="0"></g>
    <g id="users-two-{{ md5(rand()) }}-SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
    <g id="users-two-{{ md5(rand()) }}-SVGRepo_iconCarrier">
        <path opacity="0.1"
            d="M13 9.5C13 11.433 11.433 13 9.5 13C7.567 13 6 11.433 6 9.5C6 7.567 7.567 6 9.5 6C11.433 6 13 7.567 13 9.5Z"
            fill="{{ $stroke }}"></path>
        <path
            d="M15.6309 7.15517C15.9015 7.05482 16.1943 7 16.4999 7C17.8806 7 18.9999 8.11929 18.9999 9.5C18.9999 10.8807 17.8806 12 16.4999 12C16.1943 12 15.9015 11.9452 15.6309 11.8448"
            stroke="{{ $stroke }}" stroke-width="2" stroke-linecap="round"></path>
        <path d="M3 19C3.69137 16.6928 5.46998 16 9.5 16C13.53 16 15.3086 16.6928 16 19" stroke="{{ $stroke }}"
            stroke-width="2" stroke-linecap="round"></path>
        <path d="M17 15C19.403 15.095 20.5292 15.6383 21 17" stroke="{{ $stroke }}" stroke-width="2" stroke-linecap="round">
        </path>
        <path
            d="M13 9.5C13 11.433 11.433 13 9.5 13C7.567 13 6 11.433 6 9.5C6 7.567 7.567 6 9.5 6C11.433 6 13 7.567 13 9.5Z"
            stroke="{{ $stroke }}" stroke-width="2"></path>
    </g>
</svg>