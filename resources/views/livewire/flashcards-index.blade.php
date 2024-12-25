<div>
    {{dd($flashcards)}}
    <h1 class="text-2xl font-semibold text-gray-900">{{ __('Flashcards para: ') }} {{ $materia->nombre }}</h1>

    <div class="mt-6">
        @foreach ($flashcards as $flashcard)
            <div class="bg-white shadow rounded-lg p-6 mb-4">
                <h2 class="text-xl font-medium text-gray-800">{{ $flashcard->question }}</h2>
                <p class="mt-2 text-gray-600">{{ $flashcard->answer }}</p>
            </div>
        @endforeach
    </div>
</div>
