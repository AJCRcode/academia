<div>
    <div class="flex flex-row items-center">
        <h1 class="text-2xl font-semibold text-gray-900">
            {{ __('Flashcards para: ') }} {{ $materias->firstWhere('id', $materia_id)?->nombre ?? 'N/A' }}
        </h1>
        <select
            wire:model.live="materia_id"
            class="block me-4 w-auto ml-auto px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" disabled selected>Selecciona una materia</option>
            @foreach($materias as $materia)
                <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
            @endforeach
        </select>
        @if(!Auth::user()->hasRole('estudiante'))
            <x-primary-button wire:click="change">
                <x-phosphor-grid-nine class="h-6 w-6"/>
            </x-primary-button>
        @endif
    </div>

    @if($isChange)
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @if($flashcards && $flashcards->count())
                @foreach ($flashcards as $flashcard)
                    <livewire:card.card
                        :key="$flashcard->id"
                        :flashcard="$flashcard" />
                @endforeach
            @else
                <span class="bg-red-100 text-red-800 text-2xl col-span-4 py-4 font-medium px-10 rounded-full dark:bg-red-900 dark:text-red-300">
                    No hay FlashCards Registradas
                </span>
            @endif
        </div>
    @else
        <div class="relative overflow-x-auto">
            @if($flashcards && $flashcards->count())
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Pregunta
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Respuesta
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Modificacion
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Materia
                            </th>
                            <th scope="col" class="px-6 py-3">
                                accion
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($flashcards as $flashcard)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $flashcard->question }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $flashcard->answer }}
                                </td>
                                <td class="px-6 py-4">
                                    {{$flashcard->updated_at->diffForHumans()}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$flashcard->materia->nombre}}
                                </td>
                                <td>
                                    <button wire:click="delete({{$flashcard->id}})" class="w-auto h-auto inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 " fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                        </svg>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <span class="bg-red-100 text-red-800 w-full text-2xl col-span-4 py-4 font-medium px-10 rounded-full dark:bg-red-900 dark:text-red-300">
                    No hay FlashCards Registradas
                </span>
            @endif
        </div>
    @endif
</div>
