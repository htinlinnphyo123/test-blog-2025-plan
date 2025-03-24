@props(['data','id'=>null])
<p class="break-words" {{ $id ? "id=$id" : '' }}>
    {!! $data !!}
</p>
