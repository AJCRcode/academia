<div class="flex">
    @foreach(auth()->user()->formulariosAsignados as $exam)
        <x-card>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $exam->title }}</h2>
            </div>
            <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $exam->description }}</p>
            <a href="{{ route('examen.show', $exam->id) }}" class="text-blue-500 hover:text-blue-700">Ver</a>
        </x-card>
    @endforeach
</div>
