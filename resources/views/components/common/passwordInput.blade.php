@php
    $name = $attributes['name'];
@endphp
<input
    class="border-2 placeholder:font-mono text-gray-500 text-sm border-gray-400 shadow-md rounded-md pb-2 pt-2 px-3 py-2
                                focus:border-2 focus:border-gray-600
                                focus:outline-none placeholder-gray-600 focus:text-sm"
    type="password" name="password" value="{{ old('password') }}" id="password" required>
