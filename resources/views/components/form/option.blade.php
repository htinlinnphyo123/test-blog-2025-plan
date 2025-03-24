@props(['value','title','field'=>null,'editCheck'=>null])
<option value="{{$value}}" 
    @if (old($field)==$value) 
        selected
    @elseif ($editCheck==$value)
        selected
    @endif>
    {{ __('placeholder.placeholder_'.$title) }}
</option>