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
                        <td>
                            <x-primary-button wire:click="selectExam({{ $exam->id }})" class="btn btn-primary">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.248 19C3.22 15.77 5.275 8.232 12.466 8.232V6.079a1.025 1.025 0 0 1 1.644-.862l5.479 4.307a1.108 1.108 0 0 1 0 1.723l-5.48 4.307a1.026 1.026 0 0 1-1.643-.861v-2.154C5.275 13.616 4.248 19 4.248 19Z"/>
                                </svg>
                            </x-primary-button>
                            <x-primary-button href="{{route('examen.show',$exam->id)}}" wire:navigate>
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="1" d="m20.9532 11.7634-2.0523-2.05225-2.0523 2.05225 2.0523 2.0523 2.0523-2.0523Zm-1.3681-2.73651-4.1046-4.10457L12.06 8.3428l4.1046 4.1046 3.4205-3.42051Zm-4.1047 2.73651-2.7363-2.73638-8.20919 8.20918 2.73639 2.7364 8.2091-8.2092Z"/>
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="1" d="m12.9306 3.74083 1.8658 1.86571-2.0523 2.05229-1.5548-1.55476c-.995-.99505-3.23389-.49753-3.91799.18657l2.73639-2.73639c.6841-.68409 1.9901-.74628 2.9229.18658Z"/>
                                </svg>
                            </x-primary-button>
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
