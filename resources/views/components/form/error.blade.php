@props(['field'])
@error($field)
    <p class="text-sm text-red-700">
        {{ $message }}
    </p>
@enderror
