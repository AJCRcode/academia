<div>
    <div class="flex flex-row mx-4 my-2 justify-center items-center">
        <button wire:click="addOption" class="inline-flex m-auto justify-center items-center p-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 12h14m-7 7V5"/>
            </svg>
        </button>
        @if(!$isalone)
            <select
                wire:model.live="materia_id"
                class=" w-auto h-8 text-xs  ml-auto px-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" disabled selected>Selecciona una materia</option>
                @foreach($materias as $materia)
                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                @endforeach
            </select>
        @endif

    </div>
    <div class="overflow-y-auto no-scrollbar max-h-24">

        @foreach($options as $option)
            <x-question-form name="dos"/>
        @endforeach
    </div>
</div>
