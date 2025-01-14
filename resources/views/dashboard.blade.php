<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="mx-20">
        <x-card class="flex flex-row">

            <img class="h-80" src="https://static.vecteezy.com/system/resources/previews/024/585/326/original/3d-happy-cartoon-doctor-cartoon-doctor-on-transparent-background-generative-ai-png.png" alt="image description">

            <p class="text-gray-900 dark:text-white text-center text-3xl md:text-5xl my-auto font-extrabold ">
                Bienvenido {{Auth::user()->name}}
            </p>


            <img class="h-80" src="https://static.vecteezy.com/system/resources/previews/024/585/358/non_2x/3d-happy-cartoon-doctor-cartoon-doctor-on-transparent-background-generative-ai-png.png" alt="image description">

        </x-card>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 mx-20 pb-16">
        <x-card>
            <p class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold my-auto">
                Materias
            </p>
            <p class="text-lg mt-6 font-normal text-gray-500 dark:text-gray-400 ">
                {{\Illuminate\Support\Facades\Auth::user()->materias->count()}}
            </p>
        </x-card>
        <x-card>
            <p class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold my-auto">
                Examenes
            </p>
            <p class="text-lg mt-6 font-normal text-gray-500 dark:text-gray-400 ">
                {{\Illuminate\Support\Facades\Auth::user()->materias->count()}}
            </p>
        </x-card>
        <x-card>
            <p class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold my-auto">
                Estudiantes
            </p>
            <p class="text-lg mt-6 font-normal text-gray-500 dark:text-gray-400 ">
                {{\Illuminate\Support\Facades\Auth::user()->materias->count()}}
            </p>
        </x-card>
    </div>
</x-app-layout>
