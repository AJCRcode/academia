<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-3 mx-20">
        <x-card>
            <p class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">
                Tareas
            </p>
            <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">
                total : 10
            </p>
        </x-card>
        <x-card>

        </x-card>
        <x-card>

        </x-card>
    </div>
</x-app-layout>
