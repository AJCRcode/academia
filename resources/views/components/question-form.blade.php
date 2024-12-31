@props(['name'])
<div class="flex flex-row">
    <x-input-label for="{{$name}}" value="Respuesta" class=" my-auto mr-5 "/>
    <x-text-input wire:model="{{$name}}" class="block mt-1 w-full" type="text" required autofocus autocomplete="{{$name}}" />
    <x-input-error :messages="$errors->get('data.{{$name}}')" class="mt-2" />
    <input type="checkbox" value="" class="w-8 h-8 mx-6 my-auto text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
</div>
