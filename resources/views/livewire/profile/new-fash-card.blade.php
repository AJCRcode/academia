<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Nuevo Flash Card ') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Aqui se podra publicar una nueva flashcard.') }}
        </p>
    </header>

    <form wire:submit="save" class="mt-6 space-y-6">
        <div>
            <x-input-label for="question" :value="__('Titulo')" />
            <x-text-input wire:model="question" id="question" name="question" type="text" class="mt-1 block w-full" autocomplete="question" />
            <x-input-error :messages="$errors->get('question')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="answer" :value="__('Respuesta')" />
            <x-text-tarea-input wire:model="answer" id="answer" name="answer" type="text" class="mt-1 block w-full" autocomplete="answer" />
            <x-input-error :messages="$errors->get('answer')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="materia" :value="__('Materia')" />
            <x-select-input wire:model="materia" id="materiaflash" name="materia" type="text" class="mt-1 block w-full" autocomplete="materia" >
                <option selected>-----------------</option>

                @foreach($materias as $materia)
                    <option value="{{$materia->id}}">{{$materia->nombre}}</option>
                    {{$materia->nombre}}
                @endforeach
            </x-select-input>
            <x-input-error :messages="$errors->get('materia')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Publicar') }}</x-primary-button>

            <x-action-message class="me-3" on="newFlashCard">
                {{ __('Publicando...') }}
            </x-action-message>
        </div>
    </form>
</section>
