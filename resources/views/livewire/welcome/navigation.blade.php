<nav class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
    @auth
        <x-button_basic href="{{ url('/dashboard') }}">
            @slot('contenido')
                Dashboard
            @endslot
        </x-button_basic>
    @else
        <x-button_basic href="{{ route('login') }}">
            @slot('contenido')
                iniciar sesion
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            @endslot
        </x-button_basic>
        @if (Route::has('register'))
            <x-button_basic_line href="{{ route('register') }}">
                @slot('contenido')
                    Register
                @endslot
            </x-button_basic_line>
        @endif
    @endauth
</nav>
