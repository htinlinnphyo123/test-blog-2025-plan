@props(['title'])
<div class="relative border border-gray-300 rounded-lg p-4 my-4 lg:my-8">
    <legend class="absolute -top-3 bg-gray-50 dark:bg-gray-600 dark:text-white left-3 px-2 text-sm select-none">{{ __($title) }}</legend>
    {{ $slot }}
</div>