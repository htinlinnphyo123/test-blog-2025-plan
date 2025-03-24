@props([
    'type' => 'text',
    'name',
    'id' => null, 
    'class' => '',
    'customAttributes' => [], 
    'value' => null,
    'placeholder'=>null,
    'disabled' => false
    ])
<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" value="{!! old($name) ? old($name) : $value !!}" @if($disabled) disabled @endif
    class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-md dark:bg-gray-100 dark:text-gray-900 tracking-wider rounded-lg block w-full px-2.5 py-2 {{ $class }}"
    placeholder="{{ $placeholder ? __('placeholder.placeholder_' . $placeholder) : __('placeholder.placeholder_' . $name) }}" {!! implode(
        ' ',
        array_map(
            function ($value, $key) {
                return $key . '="' . $value . '"';
            },
            $customAttributes,
            array_keys($customAttributes),
        ),
    ) !!} />
