<div>
    <div class="flex flex-row">
        <h1>Nuevo Examen</h1>
        <select
            wire:model.live="materia_id"
            class=" w-auto ml-auto px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" disabled selected>Selecciona una materia</option>
            @foreach($materias as $materia)
                <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
            @endforeach
        </select>
    </div>

    <form wire:submit.prevent="save">
        <div class="form-group mb-3">
            <x-input-label for="titulo" :value="__('Titulo ')" />
            <x-text-input wire:model="titulo" class="block mt-1 w-full" type="text" required autofocus autocomplete="titulo" />
            <x-input-error :messages="$errors->get('data.titulo')" class="mt-2" />
        </div>

        <div class="form-group mb-3">
            <x-input-label for="descripcion" :value="__('Descripcion ')" />
            <x-text-tarea-input wire:model="titulo" class="block mt-1 w-full" required autofocus/>
            <x-input-error :messages="$errors->get('data.descripcion')" class="mt-2" />
        </div>

        <hr class="h-px mt-8 mb-4 bg-gray-300 border-0 dark:bg-gray-700">

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl border-2 sm:rounded-lg">
            <div class = 'p-6 text-gray-900 dark:text-gray-100'>

                <div class="form-group mb-3">
                    <x-input-label for="pregunta" :value="__('Pregunta ')" />
                    <x-text-input wire:model="pregunta" class="block mt-1 w-full" type="text" required autofocus autocomplete="pregunta" />
                    <x-input-error :messages="$errors->get('data.pregunta')" class="mt-2" />
                    <hr class="h-px mt-8 mb-4 bg-gray-300 border-0 dark:bg-gray-700">
                    <div class="flex flex-row">
                        <x-input-label for="pregunta" :value="__('Respuesta')" class=" my-auto mr-5 "/>
                        <x-text-input wire:model="pregunta" class="block mt-1 w-full" type="text" required autofocus autocomplete="pregunta" />
                        <x-input-error :messages="$errors->get('data.pregunta')" class="mt-2" />
                        <input type="checkbox" value="" class="w-10 h-10 my-auto ml-5 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </div>
                    <x-button_basic>
                        @slot('contenido')
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 12h14m-7 7V5"/>
                            </svg>
                        @endslot
                    </x-button_basic>

                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">{{ $question ? 'Actualizar' : 'Guardar' }}</button>
    </form>
</div>
