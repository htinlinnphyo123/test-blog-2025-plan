@props([
    'title',
    'helperText'=>null,
    'name'=>null,
    'required'=>false,
    'checked'=>false,
    'disabled'=>false,
    'id' => null,
    'value' => 0
    ])
<x-form.control>
    <input
        @if($checked) checked @endif
        @if($disabled) checked @endif
        type="checkbox" 
        name="{{ $name }}" 
        id="{{ $id }}" 
        value="{{ $value }}"
        class="w-4 h-4 me-2 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <x-form.label :title="$title" :required="$required" :for="$id" />
    <x-form.helper_text message="{{ $helperText }}" />
    <x-form.error :field="$name" />
</x-form.control>