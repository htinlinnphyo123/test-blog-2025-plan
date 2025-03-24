@props(['id'=>null,'url'=>null])
@php
    if($id){
        $cancelUrl = route($url,$id);
    }else{
        $cancelUrl = route($url);
    }
@endphp
<div class="grid gap-0 md:grid-cols-2 xl:grid-cols-2 ml-10 mt-8">
    <div></div>
    <div class="flex flex-row justify-end gap-2 lg:gap-6">
        <button type="submit" class="{{ config('config.sampleForm.newButtonForm') }} btnSubmit" id="btn-submit">
            {{ $attributes['operate'] }}
        </button>
        <a href="{{ $cancelUrl }}" class="{{ config('config.sampleForm.newButtonForm') }}">
            <button type="button" class="">
                {{ $attributes['cancel'] }}
            </button>
        </a>
    </div>
</div>
