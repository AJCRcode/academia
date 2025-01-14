<div class="{{$isactive}}">
    <p class="px-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Asignacion de Docentes
    </p>
    @if(isset($materia))
        <p class="px-2 m-2 text-lg text-gray-800 dark:text-gray-200 leading-tight">
            Docentes Asignados
        </p>
        @if($docentes_list->isEmpty())
            <span class="bg-red-100 my-4 flex flex-row text-red-800 w-4/5 text-lg ms-6 font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                <svg class="w-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                No hay Docentes asignados
            </span>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 m-6">
                @foreach($docentes_list as $docente)
                    <x-tag-btn :color="$docente->id" :ischeck="true" wire:click="removeDocente({{$docente->id}})">
                        {{$docente->name}}
                    </x-tag-btn>
                @endforeach
            </div>
        @endif
        <p class="px-2 m-2 text-lg text-gray-800 dark:text-gray-200 leading-tight">
            Docentes Disponibles
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 m-4">

            @foreach($docentes_not as $docente)
                <x-tag-btn :color="$docente->id" :ischeck="false" wire:click="addDocente({{$docente->id}})">
                    {{$docente->name}}
                </x-tag-btn>
            @endforeach
        </div>
    @endif
</div>
