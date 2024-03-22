<div class="absolute flex  left-[87%] ml-15 w-20 gap-2 h-12 m-5 items-center">

    {{-- Anterior Page Link --}}
    @if ($paginator->onFirstPage())
        <div class="w-10">
            <svg url='{{ $paginator->nextPageUrl() }}' viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                xmlns="http://www.w3.org/2000/svg" transform="matrix(-1, 0, 0, 1, 0, 0)">
                <g id="SVGRepo_bgCarrier" stroke-width="0">
                    <rect x="-2.4" y="-2.4" width="28.80" height="28.80" rx="14.4" fill="#aaaaaaaa" strokewidth="0">
                    </rect>
                </g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M6 12H18M18 12L13 7M18 12L13 17" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </g>
            </svg>

        </div>
    @else
        <a class="w-10 " href="{{ $paginator->previousPageUrl() }}" rel="prev">

            <svg url='{{ $paginator->nextPageUrl() }}' viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                xmlns="http://www.w3.org/2000/svg" transform="matrix(-1, 0, 0, 1, 0, 0)">
                <g id="SVGRepo_bgCarrier" stroke-width="0">
                    <rect x="-2.4" y="-2.4" width="28.80" height="28.80" rx="14.4" fill="#828282" strokewidth="0">
                    </rect>
                </g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M6 12H18M18 12L13 7M18 12L13 17" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </g>
            </svg>

        </a>
    @endif

    {{-- Siguente Page Link --}}
    @if ($paginator->hasMorePages())
        <a class="w-10 " href="{{ $paginator->nextPageUrl() }}" rel="next">
            <svg viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0">
                    <rect x="-2.4" y="-2.4" width="28.80" height="28.80" rx="14.4" fill="#828282" strokewidth="0">
                    </rect>
                </g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M6 12H18M18 12L13 7M18 12L13 17" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </g>
            </svg>

        </a>
    @else
        <div class="w-10">
            <svg url='{{ $paginator->nextPageUrl() }}' viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0">
                    <rect x="-2.4" y="-2.4" width="28.80" height="28.80" rx="14.4" fill="#aaaaaa" strokewidth="0">
                    </rect>
                </g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M6 12H18M18 12L13 7M18 12L13 17" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </g>
            </svg>

        </div>
    @endif
</div>
