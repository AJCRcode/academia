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


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-2">
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
                            <x-button_basic href="{{route('docente.edit',$docente->id)}}">
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
        {{$docentes->links()}}
    </x-card>

</x-app-layout>
