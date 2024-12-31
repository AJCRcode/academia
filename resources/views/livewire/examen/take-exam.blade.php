<div>
    @if($result)
        <div
            class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center h-full w-full md:inset-0  max-h-full flex bg-cyan-900 bg-opacity-50 backdrop-blur-[3px] ">
            <div class="relative p-4 min-w-80 max-w-full w-auto max-h-full animate__animated animate__jackInTheBox ">
                <!-- Modal content -->
                <div
                    class="relative bg-white rounded-2xl shadow-[0px_0px_50px_20px] shadow-blue-700/50 dark:bg-gray-900 border-[2px] border-sky-300 px-4 pb-4">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">


                        <div class="mr-40">
                            <p class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Resultado del Examen</p>
                            <p>Respuestas correctas: {{ $result['correct'] }} / {{ $result['total'] }}</p>
                            <p>Porcentaje: {{ $result['percentage'] }}%</p>
                        </div>


                        <button type="button" wire:click="close"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Mostrar preguntas -->
        <form wire:submit.prevent="submit">
            <p class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $form->title }}</p>
            <hr class="w-80 h-1 my-3 bg-gray-200 border-0 rounded dark:bg-gray-700">
            <p>{{ $form->description }}</p>

            <div class="grid grid-cols-2 gap-6">
                @foreach ($form->questions as $question)
                    <div class="bg-white dark:bg-gray-800 mb-4 shadow-xl border-2 sm:rounded-lg">
                        <div class="px-6 pt-6 text-gray-900 dark:text-gray-100">
                            <div class="question mb-4">
                                <h4 class="font-semibold text-lg">{{ $question->titulo }}</h4>

                                {{-- Manejo de opciones (radio y checkbox) --}}
                                @if ($question->tipo === 'radio')
                                    @foreach ($question->options as $option)
                                        <div class="flex items-center ps-4 border border-gray-300 rounded mt-2 dark:border-gray-700">
                                            <input
                                                type="radio"
                                                id="radio-{{ $question->id }}-{{ $option->id }}"
                                                wire:model="responses.{{ $question->id }}"
                                                value="{{ $option->id }}"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label
                                                for="radio-{{ $question->id }}-{{ $option->id }}"
                                                class="w-full py-2 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                {{ $option->opcion }}
                                            </label>
                                        </div>
                                    @endforeach

                                @elseif ($question->tipo === 'checkbox')
                                    @foreach ($question->options as $option)
                                        <div class="flex items-center ps-4 border border-gray-300 rounded mt-2 dark:border-gray-700">
                                            <input
                                                type="checkbox"
                                                id="checkbox-{{ $question->id }}-{{ $option->id }}"
                                                wire:model="responses.{{ $question->id }}.{{ $option->id }}"
                                                value="{{ $option->id }}"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label
                                                for="checkbox-{{ $question->id }}-{{ $option->id }}"
                                                class="w-full py-2 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                {{ $option->opcion }}
                                            </label>
                                        </div>
                                    @endforeach

                                    {{-- Campo de texto para preguntas abiertas --}}
                                @elseif ($question->tipo === 'text')
                                    <textarea
                                        wire:model="responses.{{ $question->id }}"
                                        class="w-full border-gray-300 rounded mt-2 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-blue-500"
                                        placeholder="Escribe tu respuesta aquí"></textarea>
                                @endif

                                {{-- Mensaje de error por validación --}}
                                @error("responses.$question->id")
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


            <x-primary-button type="submit" class="btn btn-primary">Enviar Respuestas</x-primary-button>
        </form>
    @endif
</div>
