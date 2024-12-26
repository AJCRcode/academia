<div>
    <div class="flex flex-row items-center">
        <h1 class="text-2xl font-semibold text-gray-900">
            {{ __('Flashcards para: ') }} {{ $materias->firstWhere('id', $materia_id)?->nombre ?? 'N/A' }}
        </h1>
        <select
            wire:model.live="materia_id"
            class="block w-auto ml-auto px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" disabled selected>Selecciona una materia</option>
            @foreach($materias as $materia)
                <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-6 grid grid-cols-4 gap-4">
        @if($flashcards && $flashcards->count())
            @foreach ($flashcards as $flashcard)
                <livewire:card.card :key="$flashcard->id" :pregunta="$flashcard->question" :respuesta="$flashcard->answer" />
            @endforeach
        @else
            <span class="bg-red-100 text-red-800 text-2xl col-span-4 py-4 font-medium px-10 rounded-full dark:bg-red-900 dark:text-red-300">
                No hay FlashCards Registradas
            </span>
        @endif
    </div>
</div>
