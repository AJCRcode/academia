@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-s text-semibold text-gray-700 capitalize dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
