<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Docentes') }}
            </h2>
            <x-button_basic class="ml-auto" style="padding: 0.1rem 0.5rem; font-size: 1rem" href="{{route('docente.create')}}">
                @slot('contenido')
                    Nuevo Docente
                @endslot
            </x-button_basic>
        </div>
    </x-slot>
    <x-card>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Correo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de Inicio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Materias
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($docentes as $docente)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full" src="https://cdn.icon-icons.com/icons2/343/PNG/512/Teachers_35749.png" alt="Jese image">
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{$docente->name}}</div>
    {{--                            <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>--}}
                            </div>
                        </th>

                        <td class="px-6 py-4">
                            {{$docente->email}}
                        </td>
                        <td class="px-6 py-4">
                            {{$docente->created_at->toDateString()}}
                        </td>
                        <td class="px-6 py-4">
                            @foreach($docente->materias as $materia)
                                <x-etiquetas :color="$materia->id">{{$materia->nombre}}</x-etiquetas>
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{$docentes->links()}}
    </x-card>

</x-app-layout>
