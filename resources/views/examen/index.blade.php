<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Exámenes') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <a href="{{ route('forms.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
            Crear Nuevo Examen
        </a>

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Título</th>
                    <th class="py-2 px-4 border-b">Descripción</th>
                    <th class="py-2 px-4 border-b">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($forms as $form)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $form->title }}</td>
                    <td class="py-2 px-4 border-b">{{ $form->description }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('forms.edit', $form->id) }}" class="text-blue-500 hover:underline">Editar</a> |
                        <a href="{{ route('forms.show', $form->id) }}" class="text-green-500 hover:underline">Ver</a> |
                        <form action="{{ route('forms.destroy', $form->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $forms->links() }} <!-- Paginación -->
    </div>
</x-app-layout>
