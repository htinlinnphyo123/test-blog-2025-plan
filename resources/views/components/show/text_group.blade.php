@props(['title','data','id'=>null])
<x-show.control>
    <x-show.label :title="$title" />
    <x-show.text :data="$data" :id="$id"/>
</x-show.control>