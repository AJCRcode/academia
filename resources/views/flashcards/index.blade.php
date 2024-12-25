<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Cards') }}
            </h2>
        </div>
    </x-slot>

    <x-card>
        <livewire:card.cards-view/>
    </x-card>

</x-app-layout>
