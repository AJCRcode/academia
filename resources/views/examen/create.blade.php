<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Exámenes') }}
        </h2>
    </x-slot>


    <x-card>
        <livewire:examen.new-form/>
    </x-card>

</x-app-layout>
