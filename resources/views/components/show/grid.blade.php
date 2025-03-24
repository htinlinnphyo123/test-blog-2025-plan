@props(['isBackground' => false,'class'=>null])
<div class="grid gap-2 md:grid-cols-2 {{ $isBackground ? 'shadow-inner rounded-lg border py-2 px-5' : '' }} {{ $class }}">
    {{ $slot }}
</div>
