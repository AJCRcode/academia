<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if(Auth::user()->hasRole('admin'))
                {{ __('Administración de Exámenes') }}
            @elseif(Auth::user()->hasRole('docente'))
                {{ __('Mis Exámenes') }}
            @else
                {{ __('Exámenes') }}
            @endif
        </h2>
    </x-slot>

    @if(Auth::user()->hasRole('estudiante'))
        <x-card>
            <livewire:examen.view-exams/>
        </x-card>
    @else
        <x-card>
            <livewire:examen.manage-exams/>
        </x-card>
    @endif

</x-app-layout>
