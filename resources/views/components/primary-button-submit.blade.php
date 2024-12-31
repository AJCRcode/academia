<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-auto h-auto inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900']) }}>
    {{ $slot }}
</button>
