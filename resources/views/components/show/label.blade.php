@props(['title','required'=>false])
<h2 class="pb-2 pt-2 font-bold text-sm text-gray-900 dark:text-white font-mono" for="{{ $title }}">
    {{ __($title) }}
    @if($required)
        <sup class="text-red-600">*</sup>
    @endif
</h2>
