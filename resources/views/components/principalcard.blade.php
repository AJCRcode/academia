@props(['isbutton' => false,'iscategory' => false, 'isbuttonline'=>false, 'imgvertical'=>true])

<div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8 shadow-[0px_0px_34px_10px_rgba(0,0,0,0.5)] hover:blur animate__animated animate__bounce ">

    @if($iscategory)
        {{$category}}
    @endif

    <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">
        {{$titulo}}
    </h1>
    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">
        {{$contenido}}
    </p>
    @if($isbutton)
        <a href="#" class="inline-flex justify-center items-center py-2.5 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
            {{$button}}
        </a>
    @endif

     @if($isbuttonline)
        <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">
            {{$buttonline}}
        </a>
    @endif

</div>
