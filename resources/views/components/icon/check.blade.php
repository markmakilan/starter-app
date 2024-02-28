@props(['stroke' => '#000'])

<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
    <g id="check-{{ md5(rand()) }}-SVGRepo_bgCarrier" stroke-width="0"></g>
    <g id="check-{{ md5(rand()) }}-SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
    <g id="check-{{ md5(rand()) }}-SVGRepo_iconCarrier">
        <g id="check-{{ md5(rand()) }}-Interface / Check">
            <path id="check-{{ md5(rand()) }}-Vector" d="M6 12L10.2426 16.2426L18.727 7.75732" stroke="{{ $stroke }}" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round"></path>
        </g>
    </g>
</svg>