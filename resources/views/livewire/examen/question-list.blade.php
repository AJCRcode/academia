<div>
    @if($isView)
        <div class="flex flex-row mt-4 items-center">
            <p class="text-2xl h-auto">
                {{ $isAlone ? "Preguntas para: $materia" : 'Preguntas de Distintas Materias' }}
            </p>

            <!-- Botón para agregar preguntas -->
            <button
                class="inline-flex justify-center items-center p-3 text-base font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 ml-auto"
                wire:click="addContent"
            >
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 12h14m-7 7V5"/>
                </svg>
            </button>

            <!-- Botón para guardar preguntas -->
            <button
                class="inline-flex justify-center items-center p-3 text-base font-medium text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 ml-2"
                wire:click="submit"
            >
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m8.032 12 1.984 1.984 4.96-4.96"/>
                </svg>
            </button>
        </div>

        <!-- Lista de preguntas -->
        <div class="overflow-y-auto no-scrollbar h-96 mt-4">
            @foreach($preguntas as $preguntaId)
                <div class="bg-white dark:bg-gray-800 mb-1 shadow-xl border-2 sm:rounded-lg">
                    <div class="px-6 pt-6 text-gray-900 dark:text-gray-100">
                        <div class="form-group mb-3">
                            <x-input-label for="pregunta_{{ $preguntaId }}" :value="'Pregunta'" />
                            <x-text-input
                                id="pregunta_{{ $preguntaId }}"
                                wire:model.lazy="preguntasContent.{{ $preguntaId }}.titulo"
                                class="block mt-1 w-full"
                                type="text"
                                required
                                autofocus
                            />
                            <x-input-error :messages="$errors->get('preguntasContent.' . $preguntaId . '.titulo')" class="mt-2" />
                            <livewire:examen.options-list :key="$preguntaId" />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
