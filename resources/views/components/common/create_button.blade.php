@if(permissionCheck([$attributes['permission']]))
    <a href="{{ route($attributes['route']) }}">
        <button type="button" class="{{ config('config.sampleForm.buttonCreate') }} bg-theme">+
            {{ __('messages.create') }}</button>
    </a>
@endif 