@props([
    'title',
    'name', 
    'id' => null, 
    'required' => false,
    'value'=>null,
    'helperText'=>null
])
<x-form.control>
    <x-form.label :title="$title" :required="$required" />
    <div id="{{ 'quill_' . $id }}"></div>
    
    <input type="hidden" name="{{ $name }}" id="{{ $id }}" value="{{ $value ?? old($name) }}" />
    <x-form.helper_text message="{{ $helperText }}" />
    <x-form.error :field="$name" />
</x-form.control>