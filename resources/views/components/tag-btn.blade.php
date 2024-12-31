@props(['color' => 1, 'ischeck' => true])
@php
    $colors = [
        1 => ['bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300','text-blue-400 hover:bg-blue-200 hover:text-blue-900 dark:hover:bg-blue-800 dark:hover:text-blue-300'],
        2 => ['bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300','text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-gray-300'],
        3 => ['bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300','text-red-400 hover:bg-red-200 hover:text-red-900 dark:hover:bg-red-800 dark:hover:text-red-300'],
        4 => ['bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-300','text-green-400 hover:bg-green-200 hover:text-green-900 dark:hover:bg-green-800 dark:hover:text-green-300'],
        5 => ['bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300','text-yellow-400 hover:bg-yellow-200 hover:text-yellow-900 dark:hover:bg-yellow-800 dark:hover:text-yellow-300'],
        6 => ['bg-indigo-100 text-indigo-800 dark:bg-indigo-700 dark:text-indigo-300','text-indigo-400 hover:bg-indigo-200 hover:text-indigo-900 dark:hover:bg-indigo-800 dark:hover:text-indigo-300'],
        7 => ['bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300','text-purple-400 hover:bg-purple-200 hover:text-purple-900 dark:hover:bg-purple-800 dark:hover:text-purple-300'],
        8 => ['bg-pink-100 text-pink-800 dark:bg-pink-700 dark:text-pink-300','text-pink-400 hover:bg-pink-200 hover:text-pink-900 dark:hover:bg-pink-800 dark:hover:text-pink-300'],
        9 => ['bg-lime-100 text-lime-800 dark:bg-lime-700 dark:text-lime-300','text-lime-400 hover:bg-lime-200 hover:text-lime-900 dark:hover:bg-lime-800 dark:hover:text-lime-300'],
        10 => ['bg-emerald-100 text-emerald-800 dark:bg-emerald-700 dark:text-emerald-300','text-emerald-400 hover:bg-emerald-200 hover:text-emerald-900 dark:hover:bg-emerald-800 dark:hover:text-emerald-300'],
        11 => ['bg-amber-100 text-amber-800 dark:bg-amber-700 dark:text-amber-300','text-amber-400 hover:bg-amber-200 hover:text-amber-900 dark:hover:bg-amber-800 dark:hover:text-amber-300'],
        12 => ['bg-orange-100 text-orange-800 dark:bg-orange-700 dark:text-orange-300','text-orange-400 hover:bg-orange-200 hover:text-orange-900 dark:hover:bg-orange-800 dark:hover:text-orange-300'],
    ];
    $selectedColor = $colors[$color] ?? $colors[rand(1,12)];
@endphp

<span class="inline-flex items-center px-2 py-1 me-2 text-s rounded-lg font-medium {{$selectedColor[0]}}">
    <button {{ $attributes->merge(['class' => 'inline-flex items-center p-1 text-sm bg-transparent rounded-sm '.$selectedColor[1]]) }}>

        @if($ischeck)
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
        @else
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
        @endif

        <span class="sr-only">Remove badge</span>
    </button>
    {{$slot}}
</span>
