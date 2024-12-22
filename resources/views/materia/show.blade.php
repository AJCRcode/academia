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

        <livewire:modules.view-materiales/>
    </x-card>
</x-app-layout>
