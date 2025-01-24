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
    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Escucha el evento para cambiar de tarjeta
                window.addEventListener('change-card', (event) => {
                    const animation = event;
                    console.log(`Animación aplicada al cambiar de tarjeta: ${animation}`);
                    // Aquí puedes agregar lógica personalizada para manejar la animación si es necesario.
                });

                // Escucha el evento para cerrar el modal
                window.addEventListener('close-modal', (event) => {
                    const animation = event.detail;
                    console.log(`Animación aplicada al cerrar el modal: ${animation}`);
                    // Aquí puedes agregar lógica personalizada para manejar el cierre del modal.
                });
            });
        </script>
    @endpush

</x-app-layout>
