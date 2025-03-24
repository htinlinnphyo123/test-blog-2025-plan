@props(['name','link'])
<li>
    <a href="{{ str_replace('&amp;','&',$link) }}" class="{{ config('config.dropdown.li') }}">{{ __($name) }}</a>
</li>