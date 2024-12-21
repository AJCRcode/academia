
<div class="{{$isactive}}">
    <p class="px-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Asignacion de Materias
    </p>
    @if(isset($user))
        <p class="px-2 m-2 text-lg text-gray-800 dark:text-gray-200 leading-tight">
            Materias Asignadas
        </p>
        @if($materias_user->isEmpty())
            <span class="bg-red-100 my-4 flex flex-row text-red-800 w-4/5 text-lg ms-6 font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                <svg class="w-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                No hay Materias asignadas
            </span>
        @else
            <div class="grid grid-cols-3 gap-4 m-6">
                @foreach($materias_user as $materia)
                    <x-tag-btn :color="$materia->id" :ischeck="true" wire:click="removeMateria({{$materia->id}})">
                        {{$materia->nombre}}
                    </x-tag-btn>
                @endforeach
            </div>
        @endif
        <p class="px-2 m-2 text-lg text-gray-800 dark:text-gray-200 leading-tight">
            Materias Disponibles
        </p>
        <div class="grid grid-cols-3 gap-2 m-4">

            @foreach($materias_not as $materia)
                <x-tag-btn :color="$materia->id" :ischeck="false" wire:click="addMateria({{$materia->id}})">
                    {{$materia->nombre}}
                </x-tag-btn>
            @endforeach
        </div>
    @endif
</div>
