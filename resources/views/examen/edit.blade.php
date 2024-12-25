<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Examen') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <form action="{{ route('forms.update', $form->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700">Título</label>
                <input type="text" id="title" name="title" value="{{ $form->title }}" class="w-full border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700">Descripción</label>
                <textarea id="description" name="description" class="w-full border-gray-300 rounded">{{ $form->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="materia_id" class="block text-gray-700">Materia</label>
                <select id="materia_id" name="materia_id" class="w-full border-gray-300 rounded">
                    @foreach($materias as $materia)
                        <option value="{{ $materia->id }}" @if($materia->id == $form->materia_id) selected @endif>
                            {{ $materia->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Actualizar Examen
            </button>
        </form>
    </div>
</x-app-layout>
