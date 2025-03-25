@props(['model','title','icon'=>null,'class'=>null])
@php 
    $routeName = $model . '.*';
    $indexRoute = $model . '.index';
    $managePermission = 'manage ' . $model;
@endphp
<li class="{{ request()->routeIs($routeName) ?
    'bg-theme text-white dark:bg-gray-200 dark:text-gray-900 hover:bg-theme hover:text-white' : 
    'bg-gray-200 text-theme dark:bg-gray-800 dark:text-gray-200 my-1'}} {{ $class }} ">
    <a href="{{ route($indexRoute) }}"
        class="flex items-center p-2 font-normal hover:bg-theme hover:text-white hover:dark:bg-gray-200 hover:dark:text-gray-500">
        <i class="{{ $icon }}"></i>
        <span class="ml-3 menu-title">{{ __($title) }}</span>
    </a>
</li>
