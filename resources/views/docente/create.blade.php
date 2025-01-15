<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Nuevo Docente') }}
            </h2>
        </div>
    </x-slot>
    <x-card>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="relative overflow-x-auto shadow-2xl p-2 sm:rounded-lg">
                <livewire:pages.auth.new-user />
            </div>
            <div class="relative overflow-x-auto shadow-2xl p-2 sm:rounded-lg">
                <livewire:users.asigment-materia :user_id="0"/>
            </div>
        </div>
    </x-card>

</x-app-layout>
