<div>
    <div class="flex flex-row">
        <p class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Nuevo Examen</p>
        @if($isalone)
            <select
                wire:model.live="materia_id"
                class=" w-auto h-8 text-xs  ml-auto px-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" disabled selected>Selecciona una materia</option>
                @foreach($materias as $materia)
                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                @endforeach
            </select>
        @endif
    </div>

    <div class="flex flex-row mt-4">
        <x-primary-button wire:click="changealone">
            @if($isalone)
                Varias Materias
            @else
                Una Sola Materia
            @endif
        </x-primary-button>
        <span class="bg-indigo-100 ml-auto text-indigo-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-indigo-400 border border-indigo-400">
            @if($isalone)
                Este examen es para una sola materia
            @else
                Este examen es para varias materias
            @endif
        </span>
    </div>

    <form wire:submit.prevent="next" class="mt-4">
        <div class="form-group mb-3">
            <x-input-label for="title" :value="__('Titulo ')" />
            <x-text-input wire:model="title" class="block mt-1 w-full" type="text" required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('data.title')" class="mt-2" />
        </div>

        <div class="form-group mb-3">
            <x-input-label for="description" :value="__('Descripcion ')" />
            <x-text-tarea-input wire:model="description" class="block mt-1 w-full" style="height: 13rem"  required autofocus/>
            <x-input-error :messages="$errors->get('data.description')" class="mt-2" />
        </div>
        @if(!$issubmit)
            <div class="flex justify-center items-center mt-3">
                <x-primary-button-submit type="submit">
                    siguiente
                    <svg class="ml-4 w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                    </svg>
                </x-primary-button-submit>
            </div>
        @endif


    </form>
</div>
