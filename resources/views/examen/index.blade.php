<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Exámenes') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-2 mx-32">
        <x-card>
            <livewire:examen.question-form/>
        </x-card>

        <x-card>
            <livewire:examen.answer-questions/>
        </x-card>

        <x-card>
            <livewire:examen.results/>
        </x-card>

        <x-card>
            <livewire:examen.question-list/>
        </x-card>
    </div>

</x-app-layout>
