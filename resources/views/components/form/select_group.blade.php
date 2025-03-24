@props(['title','required'=>false,'name'])
<x-form.control>
    <x-form.label :title="$title" :required="$required"/>
    <select class="{{ config('config.sampleForm.selectBox') }}" name="{{$name}}">
        {{ $slot }}
    </select>
</x-form.control>