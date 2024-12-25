<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles del Examen') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <h3 class="text-lg font-bold mb-4">{{ $form->title }}</h3>
        <p class="mb-4">{{ $form->description }}</p>

        <h4 class="text-lg font-bold mb-2">Preguntas:</h4>
        <ul>
            @foreach($form->questions as $question)
                <li>{{ $question->question_text }}</li>
            @endforeach
        </ul>

        <a href="{{ route('questions.create', ['form_id' => $form->id]) }}" 
           class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">
            Añadir Pregunta
        </a>
    </div>
</x-app-layout>
