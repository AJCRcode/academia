<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Materias') }}
            </h2>
            <x-button_basic class="ml-auto" href="{{route('materia.create')}}">
                @slot('contenido')
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v14m-8-7h2m0 0h2m-2 0v2m0-2v-2m12 1h-6m6 4h-6M4 19h16c.5523 0 1-.4477 1-1V6c0-.55228-.4477-1-1-1H4c-.55228 0-1 .44772-1 1v12c0 .5523.44772 1 1 1Z"/>
                    </svg>

                @endslot
            </x-button_basic>
        </div>
    </x-slot>
    <x-card>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-2">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha de Inicio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Horario
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Fecha de Finalizacion
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Gestion
                        </th>
                        <th scope="col" class="px-6 py-3 w-96">
                            Docentes
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($materias as $materia)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.freepik.com/256/1819/1819411.png?semt=ais_hybrid" alt="Jese image">
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{$materia->nombre}}</div>
    {{--                            <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>--}}
                            </div>
                        </th>

                        <td class="px-6 py-4">
                            {{$materia->fecha_inicio}}
                        </td>
                        <td class="px-6 py-4">
                            {{$materia->horario}}
                        </td>

                        <td class="px-6 py-4">
                            {{$materia->fecha_fin}}
                        </td>
                        <td class="px-6 py-4">
                            {{$materia->gestion}}
                        </td>
                        <td class="px-6 py-4">
                            @foreach($materia->docentes as $docente)
                                <x-etiquetas :color="$docente->id">{{$docente->name}}</x-etiquetas>
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            <x-button_basic href="{{route('materia.edit',$materia->id)}}">
                                @slot('contenido')
                                    <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                                        <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                                    </svg>
                                @endslot
                            </x-button_basic>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{$materias->links()}}
    </x-card>

</x-app-layout>
