<div>

    <div class="flex flex-row">
        <h1 class="text-2xl font-semibold text-gray-900">{{ __('Flashcards para: ') }} {{ $materia->nombre }}</h1>
        <select class="block w-auto ml-auto px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose a country</option>
            @foreach($materias as $materia)
                <option value="{{$materia->id}}">{{$materia->nombre}}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-6 grid grid-cols-4 gap-4">
        @foreach ($flashcards as $flashcard)
            <livewire:card.card :key="$flashcard->id" :pregunta="$flashcard->question" :respuesta="$flashcard->answer"/>

        @endforeach
    </div>
</div>
