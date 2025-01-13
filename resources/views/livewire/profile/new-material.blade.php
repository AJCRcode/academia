<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Nuevo Material') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Aquí puedes publicar un documento para cada materia.') }}
        </p>
    </header>

    <form wire:submit.prevent="save" class="mt-6 space-y-6">
        <div>
            <x-input-label for="titulo" :value="__('Título')" />
            <x-text-input wire:model="titulo" id="titulo" name="titulo" type="text" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="descripcion" :value="__('Descripción')" />
            <x-text-tarea-input wire:model="descripcion" id="descripcion" name="descripcion" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="materia" :value="__('Materia')" />
            <select wire:model="materia" id="materia" name="materia" class="mt-1 block w-full">
                <option value="" >{{ __('Selecciona una materia') }}</option>
                @foreach($materias as $materia)
                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('materia')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="uri" :value="__('Archivo')" />
            <x-text-input wire:model="uri" id="uri" name="uri" type="file" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('uri')" class="mt-2" />
        </div>

        <!-- Vista previa del archivo -->
        <div class="mt-4">
            @if ($uri)
                <x-input-label :value="__('Vista previa del archivo:')" />
                <div class="mt-2">
                    @if ($uri->getMimeType() && str_starts_with($uri->getMimeType(), 'image/'))
                        <!-- Si el archivo es una imagen, mostrar la vista previa -->
                        <img src="{{ $uri->temporaryUrl() }}" alt="Preview" class="w-32 h-32 object-cover rounded">
                    @else
                        <!-- Si no es una imagen, mostrar solo el nombre del archivo -->
                        <div class="flex items-center space-x-2">
                            <svg class="w-[48px] h-[48px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m14 9.006h-.335a1.647 1.647 0 0 1-1.647-1.647v-1.706a1.647 1.647 0 0 1 1.647-1.647L19 12M5 12v5h1.375A1.626 1.626 0 0 0 8 15.375v-1.75A1.626 1.626 0 0 0 6.375 12H5Zm9 1.5v2a1.5 1.5 0 0 1-1.5 1.5v0a1.5 1.5 0 0 1-1.5-1.5v-2a1.5 1.5 0 0 1 1.5-1.5v0a1.5 1.5 0 0 1 1.5 1.5Z"/>
                            </svg>
                            <span class="text-gray-600">{{ $uri->getClientOriginalName() }}</span>
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Publicar') }}</x-primary-button>
            <x-action-message class="me-3" on="newMaterial">
                {{ __('Publicado con éxito.') }}
            </x-action-message>
        </div>
    </form>
</section>
