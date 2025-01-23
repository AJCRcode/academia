<div>

    <div class="flex flex-row h-8">
        <p class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Lista de Exámenes</p>
        <x-button_basic class="ml-auto" href="{{route('examen.create')}}" wire:navigate>
            @slot('contenido')
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 17h6m-3 3v-6M4.857 4h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857H4.857A.857.857 0 0 1 4 9.143V4.857C4 4.384 4.384 4 4.857 4Zm10 0h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857h-4.286A.857.857 0 0 1 14 9.143V4.857c0-.473.384-.857.857-.857Zm-10 10h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857H4.857A.857.857 0 0 1 4 19.143v-4.286c0-.473.384-.857.857-.857Z"/>
                </svg>
            @endslot
        </x-button_basic>
    </div>


    <div class="relative overflow-x-auto shadow-2xl sm:rounded-lg p-4 mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-base text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 capitalize">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Título
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descripción
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Materia
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Acciones</span>
                    </th>
                </tr>
            </thead>
            <tbody class="capitalize">

                @foreach ($exams as $exam)
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $exam->title }}</td>
                        <td>{{ $exam->description }}</td>
                        <td>{{ isset($exam->materia)? $exam->materia->nombre :'usa Varias Materias' }}</td>
                        <td>{{$exam->created_at->diffForHumans()}}</td>

                        <td class="relative" wire:ignore>
                            <button data-popover-target="popover-left-{{$exam->id}}" data-popover-placement="left" type="button" class="text-white mb-3 me-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" wire:ignore>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                                    <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3q0-.405-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708M3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"/>
                                </svg>
                            </button>
                            <div data-popover id="popover-left-{{$exam->id}}" role="tooltip" class="absolute z-10 invisible inline-block w-auto text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Opciones</h3>
                                </div>
                                <div class="px-3 py-2 flex flex-row gap-1">
                                    <x-primary-button wire:click="selectExam({{ $exam->id }})" title="Asignar este examen" >
                                        <svg xmlns="http://www.w3.org/2000/svg"  class="w-6 h-6 " fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z"/>
                                            <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5"/>
                                        </svg>
                                    </x-primary-button>
                                    <x-primary-button href="{{route('examen.show',$exam->id)}}" title="Probar este examen" wire:navigate>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 " fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1"/>
                                        </svg>
                                    </x-primary-button>
                                    <x-primary-button href="{{route('examen.edit',$exam->id)}}" title="Editar este examen" wire:navigate>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 " fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                        </svg>
                                    </x-primary-button>
                                    <form action="{{ route('examen.destroy', $exam->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" title="Eliminar este examen" class="w-auto h-auto inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 " fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($selectedExam)
        <div
            class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center h-full w-full md:inset-0  max-h-full flex bg-cyan-900 bg-opacity-50 backdrop-blur-[3px] ">
            <div class="relative p-4 min-w-80 max-w-full w-auto max-h-full animate__animated animate__jackInTheBox ">
                <!-- Modal content -->
                <div
                    class="relative bg-white rounded-2xl shadow-[0px_0px_50px_20px] shadow-blue-700/50 dark:bg-gray-800 border-[2px] border-sky-300 px-4 pb-4">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">

                        <button type="button" wire:click="close"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="mt-6 p-4">
                        <p class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">Gestionar Examen: {{ $selectedExam->title }}</p>

                        <div class="grid grid-cols-2 pt-4">

                            <!-- Editar Examen -->
                            <div class="mb-4">
                                <h3>Preguntas</h3>
                                <br class="w-full h-1 mx-auto my-4 bg-slate-900 border-0 rounded md:my-10 dark:bg-gray-700">
                                @foreach ($selectedExam->questions as $question)
                                    <div class="mb-2">
                                        <strong>{{ $question->titulo }}</strong>
                                        <ul>
                                            @foreach ($question->options as $option)
                                                <li>{{ $option->opcion }} (Correcta: {{ $option->es_correcta ? 'Sí' : 'No' }})</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Asignar Examen -->
                            <div>
                                <h3>Asignar a Estudiantes</h3>
                                <div class="mb-4">
                                    <div class="grid grid-cols-2 gap-3">
                                        @foreach ($students as $student)
                                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                                <input type="checkbox" id="student-{{ $student->id }}" value="{{ $student->id }}" wire:model="assignedStudents" class="w-4 h-4 text-cyan-600 bg-gray-100 border-gray-300 rounded focus:ring-cyan-500 dark:focus:ring-cyan-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="student-{{ $student->id }}" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $student->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <x-primary-button wire:click="saveAssignments" class="btn btn-success">Guardar Asignaciones</x-primary-button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
