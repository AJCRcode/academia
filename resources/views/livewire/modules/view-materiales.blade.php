<div>
    @foreach(Auth::user()->materias as $materia)
        <x-button_basic wire:click="changeMateria({{$materia->id}})">
            @slot('contenido')
                {{$materia->nombre}}
            @endslot
        </x-button_basic>
    @endforeach

    <div class="grid grid-cols-4 gap-6 mt-6">
        @foreach($materiaMain->materiales as $material)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-[0px_0px_34px_10px_rgba(0,0,0,0.5)] dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="https://img.freepik.com/vetores-premium/pasta-de-arquivo-de-documento-baixar-formato-de-cor-vetorial-pdf-doc-xls-jpg-zip-txt-png-json-ppt-csv-xml-ai-mp_211928-221.jpg?w=1380" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$material->titulo}}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$material->descripcion}}</p>
                    <button wire:click="descargarMateriales({{$material->id}})" class=" m-auto inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-lime-700 rounded-lg hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-300 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-800">
                        Desacargar
                        <svg class="ms-3 w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z" clip-rule="evenodd"/>
                        </svg>

                    </button>
                </div>
            </div>

        @endforeach
    </div>
</div>
