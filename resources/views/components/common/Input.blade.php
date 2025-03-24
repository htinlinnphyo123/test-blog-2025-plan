@php
    $name = $attributes['name'];
@endphp
<input id="{{ $attributes['id'] }}"
    class="border-2 text-sm border-gray-400 shadow-md rounded-md pb-2 pt-2 px-3 py-2 focus:border-2 focus:border-gray-600
focus:outline-none placeholder-gray-600 focus:text-sm focus:font-mono font-mono text-gray-500"
    type="{{ $attributes['type'] }}" name="{{ $name }}" value="{{ old($name) }}" required>
