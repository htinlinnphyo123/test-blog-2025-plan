@props(['dropdownName', 'menuName', 'menuLists' => [], 'menuIcon' => 'fa-solid fa-gear'])
@php
    $hide = true;
    foreach ($menuLists as $menu) {
        $routeName = $menu . '.*';
        if (request()->routeIs($routeName)) {
            $hide = false;
        }
    }
    $managePermission = array_map(function ($string) {
        return 'manage ' . $string;
    }, $menuLists);
@endphp
@if (permissionCheck($managePermission))
    <li>
        <button type="button"
            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
            aria-controls="{{ $dropdownName }}" data-collapse-toggle="{{ $dropdownName }}">
            <i class="{{ $menuIcon }}"></i>
            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap menu-title">{{ __($menuName) }}</span>
            <svg class="w-3 h-3 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
            </svg>
        </button>
        <ul id="{{ $dropdownName }}" class="{{ $hide ? 'hidden' : '' }} py-2 space-y-2 multi-menu-container">
            {{ $slot }}
        </ul>
    </li>
@endif
