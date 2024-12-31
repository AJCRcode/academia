<div>
    <div class="flex flex-row h-8">
        <p class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Nuevo Examen</p>
    </div>

    <div class="flex flex-row my-4 ">
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

    <form wire:submit.prevent="save">
        <div class="grid grid-cols-2 gap-6">

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach

            @endif

            <div class="bg-white dark:bg-gray-800 mb-1 shadow-xl border-2 sm:rounded-lg">
                <div class="px-6 pt-6 text-gray-900 dark:text-gray-100">

                    <div class="form-group mb-3">
                        <x-input-label for="title" :value="__('Título del formulario: ')" />
                        <x-text-input id="title" wire:model="form.title" class="block mt-1 w-full" type="text"  autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('form.title')" class="mt-2" />
                    </div>

                    @if($isalone)

                        <div class="form-group mb-3">
                            <x-input-label for="materia_id" :value="__('Materia : ')" />
                            <x-select-input class="w-full"
                                wire:model="form.materia_id">
                                <option disabled selected>Selecciona una materia</option>
                                @foreach($materias as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('form.materia_id')" class="mt-2" />
                        </div>
                    @endif

                    <div class="form-group mb-3">
                        <x-input-label for="description" :value="__('Descripción ')" />
                        <x-text-tarea-input wire:model="form.description" class="block mt-1 w-full"  autofocus/>
                        <x-input-error :messages="$errors->get('form.description')" class="mt-2" />
                    </div>
                </div>
            </div>


            <!-- Preguntas dinámicas -->

            @foreach ($questions as $index => $question)
            <div class="bg-white dark:bg-gray-800 mb-1 shadow-xl border-2 sm:rounded-lg">
                <div class="px-6 pt-6 text-gray-900 dark:text-gray-100">
                    <div class="form-group mb-3">
                        <div class="flex flex-row">
                            <x-input-label for="pregunta_" value="Pregunta Nro  {{ $index + 1 }}" />

                            @if(!$isalone)
                                <select
                                    wire:model="questions.{{ $index }}.materia_id"
                                    class=" w-auto h-8 text-xs  ml-auto px-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" disabled selected>Selecciona una materia</option>
                                    @foreach($materias as $materia)
                                        <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            @endif

                            <select
                                wire:model="questions.{{ $index }}.tipo"
                                class=" w-auto h-8 text-xs  ml-auto px-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="radio">Opción Unitaria</option>
                                <option value="checkbox">Selección múltiple</option>
                                <option value="text">Respuesta corta</option>

                            </select>
                            <x-input-error :messages="$errors->get('questions'.$index.'tipo')" class="mt-2" />

                        </div>
                        <x-text-input
                            type="text"
                            wire:model="questions.{{ $index }}.titulo"
                            class="block mt-1 w-full"

                            autofocus
                            placeholder="¿Que es la Anatomia?"
                        />
                        <x-input-error :messages="$errors->get('questions'.$index.'titulo')" class="mt-2" />

                        <!-- Opciones de la pregunta -->
                            @foreach ($question['options'] as $optionIndex => $option)
                                <div class="flex items-center my-2">
                                    <x-text-input type="text" wire:model="questions.{{ $index }}.options.{{ $optionIndex }}.opcion"
                                                  placeholder="Respuesta {{$optionIndex + 1}}" class="block mt-1 w-full"/>
                                    <input type="checkbox" wire:model="questions.{{ $index }}.options.{{ $optionIndex }}.es_correcta" class="w-8 h-8 mx-6 my-auto text-sky-600 bg-gray-100 border-gray-300 rounded focus:ring-sky-500 dark:focus:ring-sky-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <button type="button" wire:click="removeOption({{ $index }}, {{ $optionIndex }})" class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                            <button type="button" wire:click="addOption({{ $index }})" class="my-3 inline-flex items-center px-4 py-2 bg-teal-600 dark:bg-teal-200 border border-transparent rounded-md font-semibold text-xs text-white w-full dark:text-teal-800 uppercase tracking-widest hover:bg-teal-700 dark:hover:bg-white focus:bg-teal-700 dark:focus:bg-white active:bg-teal-900 dark:active:bg-teal-300 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 dark:focus:ring-offset-teal-800 transition ease-in-out duration-150">
                                <svg class="w-6 h-6 m-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 12h14m-7 7V5"/>
                                </svg>
                            </button>


                        <button type="button" wire:click="removeQuestion({{ $index }})" class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">Eliminar Pregunta</button>
                    </div>
                </div>
            </div>
            @endforeach

            <button type="button" wire:click="addQuestion()" class="w-full text-slate-500 bg-gray-100 p-5 dark:bg-gray-800 mb-1 shadow-xl border-2 sm:rounded-lg">
                <svg class="w-6 h-6 m-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 12h14m-7 7V5"/>
                </svg>
            </button>

            <button type="submit" class="w-full text-teal-600 bg-teal-100 p-5 dark:bg-gray-800 mb-1 shadow-xl border-2 sm:rounded-lg">
                <svg class="w-6 h-6 m-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6"/>
                </svg>
            </button>
        </div>
    </form>
</div>
