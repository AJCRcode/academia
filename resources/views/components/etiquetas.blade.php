@props(['color' => 1])
@php
$colors = [
    1 => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
    2 => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
    3 => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
    4 => 'bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-300',
    5 => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
    6 => 'bg-indigo-100 text-indigo-800 dark:bg-indigo-700 dark:text-indigo-300',
    7 => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300',
    8 => 'bg-pink-100 text-pink-800 dark:bg-pink-700 dark:text-pink-300',
    9 => 'bg-lime-100 text-lime-800 dark:bg-lime-700 dark:text-lime-300',
    10 => 'bg-emerald-100 text-emerald-800 dark:bg-emerald-700 dark:text-emerald-300',
    11 => 'bg-amber-100 text-amber-800 dark:bg-amber-700 dark:text-amber-300',
    12 => 'bg-orange-100 text-orange-800 dark:bg-orange-700 dark:text-orange-300',
];
$selectedColor = $colors[$color] ?? $colors[rand(1,12)];
@endphp

<span class="text-xs font-medium me-2 px-2.5 py-0.5 rounded {{$selectedColor}}">
    {{$slot}}
</span>
