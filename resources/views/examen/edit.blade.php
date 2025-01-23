<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edicion Examen') }}
        </h2>
    </x-slot>

    <x-card>
        {{$examen}}

        <livewire:examen.edit-form :formId="$examen"/>
    </x-card>

</x-app-layout>
