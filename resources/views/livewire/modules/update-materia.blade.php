<div>
    <p class="px-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Informacion de la Materia
    </p>
    <form wire:submit="register" class="p-3">
        <!-- Name -->
        <div>
            <x-input-label for="nombre" :value="__('Name')" />
            <x-text-input wire:model="nombre" id="nombre" class="block mt-1 w-full" type="text" name="nombre" required autofocus autocomplete="nombre" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="gap-5 grid grid-cols-3">
            <!-- Fecha de Inicio -->
            <div class="mt-4">
                <x-input-label for="fecha_inicio" :value="__('Fecha de Inicio')" />
                <x-text-input wire:model="fecha_inicio" id="fecha_inicio" class="block mt-1 w-full" type="date" name="fecha_inicio" required autocomplete="fecha_inicio" />
                <x-input-error :messages="$errors->get('fecha_inicio')" class="mt-2" />
            </div>

            <!-- Horaio -->
            <div class="mt-4">
                <x-input-label for="horario" :value="__('Horario')" />
                <x-text-input wire:model="horario" id="horario" class="block mt-1 w-full" type="time" name="horario" required autocomplete="horario" />
                <x-input-error :messages="$errors->get('horario')" class="mt-2" />
            </div>

            <!-- Fecha Fin -->
            <div class="mt-4">
                <x-input-label for="fecha_fin" :value="__('Fecha de Fin')" />
                <x-text-input wire:model="fecha_fin" id="fecha_fin" class="block mt-1 w-full" type="date" name="fecha_fin" required autocomplete="fecha_fin" />
                <x-input-error :messages="$errors->get('fecha_fin')" class="mt-2" />
            </div>
        </div>

        <!-- Gestion -->
        <div class="mt-4">
            <x-input-label for="ggestion" :value="__('Gestion')" />
            <x-select-input wire:model="gestion" id="ggestion" class="block mt-1 w-full" type="date" name="ggestion" required autocomplete="ggestion">
                <option selected>----Gestion de la Materia ---</option>
                <option value="Prefacultativo">Prefacultativo</option>
                <option value="1er año">1er año</option>
                <option value="2do año">2do año</option>
                <option value="3er año">3er año</option>
                <option value="4to año">4to año</option>
                <option value="5to año">5to año</option>
            </x-select-input>
            <x-input-error :messages="$errors->get('fecha_fin')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 mt-3">
            <x-primary-button>{{ __('Actualizar') }}</x-primary-button>

            <x-action-message class="me-3" on="updateMateria">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</div>
