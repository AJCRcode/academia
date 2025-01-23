<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Materias') }}
            </h2>
            <x-button_basic class="ml-auto" href="{{route('materia.create')}}">
                @slot('contenido')
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v14m-8-7h2m0 0h2m-2 0v2m0-2v-2m12 1h-6m6 4h-6M4 19h16c.5523 0 1-.4477 1-1V6c0-.55228-.4477-1-1-1H4c-.55228 0-1 .44772-1 1v12c0 .5523.44772 1 1 1Z"/>
                    </svg>
                @endslot
            </x-button_basic>
        </div>
    </x-slot>

    <x-card>
        <p class="text-gray-900 dark:text-white text-xl md:text-3xl font-extrabold mb-2">
            Lista de Publicaciones
        </p>

        @if(Auth::user()->materias->isNotEmpty())
            <livewire:modules.view-materiales/>
        @else
            <span class="bg-red-100 col-span-4 my-4 flex flex-row text-red-800 w-4/5 text-lg ms-6 font-medium me-2 px-2.5 py-0.5 rounded-xl py-4 dark:bg-red-900 dark:text-red-300">
                <svg class="w-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                No hay Materias disponibles
            </span>
        @endif
    </x-card>
</x-app-layout>
