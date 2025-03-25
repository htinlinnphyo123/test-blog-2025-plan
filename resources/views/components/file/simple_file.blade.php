@props([
    'title',
    'name', 
    'id'=>'',
    'photoId'=>'',
    'class'=>'', 
    'required'=>false,
    'helperText'=>null,
    'imageSrc'=>null
    ])
<x-form.control>
    <x-form.label :title="$title" :required="$required" />
    <input type="file"
        name="{{ $name }}[]" id="{{ $id }}"
        class="block w-full text-sm text-gray-900 border-2 border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none {{$class}}"  aria-label="file example"
    >
    <x-form.helper_text message="{{ $helperText }}" />
    <div id="preview"></div>
    <x-form.error :field="$name" />
</x-form.control>
