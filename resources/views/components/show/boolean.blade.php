@props(['title','data'])
<x-show.control>
    <x-show.label :title="$title" />
    @if($data)
        <i class="fa-solid fa-check bg-green-700 text-md text-white p-1 rounded-md"></i>
    @else
        <i class="fa-solid fa-xmark bg-red-600 text-md text-white p-1 rounded-md"></i>
    @endif
</x-show.control>