@props([
    'title', 
    'required' => false, 
    'name',
    'id'=>null,
    'ajaxError' => null,
    'disabled' => false,
    'helperText' => null,
    ])
<x-form.control>
    <x-form.label :title="$title" :required="$required" :helperText="$helperText" />
    <select @if($disabled) disabled @endif
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="{{ $name }}" id="{{ $id }}">
        <option value="">Choose</option>
        {{ $slot }}
    </select>
    <x-form.error :field="$name" />
    {{ $ajaxError }}
    <x-form.helper_text message="{{ $helperText }}" />
</x-form.control>
