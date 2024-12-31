@props(['pt'=>'pt-10'])

<div class="{{$pt}}">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl h-full sm:rounded-lg">
            <div {{ $attributes->merge(['class' => 'p-6 text-gray-900 dark:text-gray-100']) }}>
                {{$slot}}
            </div>
        </div>
    </div>
</div>
