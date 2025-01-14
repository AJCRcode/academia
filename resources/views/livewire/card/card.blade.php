<div>
    <button class="bg-gray-100 hover:shadow-inner-custom max-w-lg w-full border-r-4 border-b-4 rounded-lg p-6 mb-4" wire:click="open">
        <p class="text-2xl font-bold capitalize  text-gray-800">{{$pregunta}}</p>
    </button>
    @if($isOpen)
        <div
            class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center h-full w-full md:inset-0  max-h-full flex bg-slate-500 bg-opacity-50 backdrop-blur-[20px] ">
            <div class="relative p-4 min-w-80 max-w-full w-auto max-h-full animate__animated animate__jackInTheBox ">
                <!-- Modal content -->
                <div
                    class="relative bg-white rounded-2xl shadow-[0px_0px_50px_20px] shadow-blue-700/50 dark:bg-gray-900 border-[2px] border-sky-300 px-4 pb-4">
                    <!-- Modal header -->
                    <div class="md:flex items-end justify-end p-4 md:p-5 border-b rounded-t dark:border-gray-600">
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
                    <div class="mr-40">
                        <p class="text-4xl font-bold capitalize  text-gray-800">{{$pregunta}}</p>
                        <p class="mt-2 text-3xl text-gray-600">{{$respuesta}}</p>
                    </div>
                    <div class="flex mt-5 space-x-80 items-center justify-center">

{{--                        <x-primary-button>--}}
{{--                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">--}}
{{--                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m17 16-4-4 4-4m-6 8-4-4 4-4"/>--}}
{{--                            </svg>--}}
{{--                        </x-primary-button>--}}
                        <x-primary-button wire:click="next">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m7 16 4-4-4-4m6 8 4-4-4-4"/>
                            </svg>
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
