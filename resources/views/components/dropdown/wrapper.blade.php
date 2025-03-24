@props(['title','toggleDiv'])
<button id="{{$title}}_dropdown_btn" data-dropdown-toggle="{{ $toggleDiv }}" 
    class="{{ config('config.dropdown.button') }}" type="button" data-dropdown-placement="right">
    {{ $title }}
    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg>
</button>

<!-- Dropdown menu -->
<div id="{{ $toggleDiv }}" class="{{ config('config.dropdown.wrapper') }}">
    <ul class="{{ config('config.dropdown.ul') }}" aria-labelledby="{{ $toggleDiv }}">
        {{ $slot }}
    </ul>
</div>
