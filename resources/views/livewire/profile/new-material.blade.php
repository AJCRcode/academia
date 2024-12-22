<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Nuevo Material ') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Aqui se podra publicar undocumento para cada materia .') }}
        </p>
    </header>

    <form wire:submit="save" class="mt-6 space-y-6">
        <div>
            <x-input-label for="titulo" :value="__('Titulo')" />
            <x-text-input wire:model="titulo" id="titulo" name="titulo" type="text" class="mt-1 block w-full" autocomplete="titulo" />
            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="descripcion" :value="__('Descripcion')" />
            <x-text-tarea-input wire:model="descripcion" id="descripcion" name="descripcion" type="text" class="mt-1 block w-full" autocomplete="descripcion" />
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="materia" :value="__('Materia')" />
            <x-select-input wire:model="materia" id="materia" name="materia" type="text" class="mt-1 block w-full" autocomplete="materia" >
                <option selected>-----------------</option>

                @foreach(Auth::user()->materias as $materia)
                    <option value="{{$materia->id}}">{{$materia->nombre}}</option>
                    {{$materia->nombre}}
                @endforeach
            </x-select-input>
            <x-input-error :messages="$errors->get('materia')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="uri" :value="__('Archivo')" />

            <x-text-input wire:model="uri" id="uri" name="uri" type="file" class="mt-1 block w-full" autocomplete="uri" />
            <x-input-error :messages="$errors->get('uri')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Publicar') }}</x-primary-button>

            <x-action-message class="me-3" on="newMaterial">
                {{ __('Publicando...') }}
            </x-action-message>
        </div>
    </form>
</section>
