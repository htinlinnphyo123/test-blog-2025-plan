{{-- Published Status Filter --}}
<button id="publishedDropDownButton" data-dropdown-toggle="publishedDropDown" data-dropdown-trigger="hover" 
    class="font-medium rounded-lg text-sm px-3 py-1.5 text-md text-center inline-flex items-center bg-theme text-white dark:bg-white dark:text-theme" type="button">
    {{ request('is_published') ? (request('is_published') === 'yes' ? 'Published' : 'Unpublished') : 'Published Status' }}
    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg>  
</button>
<div id="publishedDropDown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="publishedDropDownButton">
        <li>
            <a href="{{ route('articles.index', array_merge(
                collect(request()->query())->except(['is_published'])->all()
            )) }}" 
               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                All
            </a>
        </li>
        <li>
            <a href="{{ route('articles.index', array_merge(request()->query(), ['is_published' => 'yes'])) }}" 
               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Published
            </a>
        </li>
        <li>
            <a href="{{ route('articles.index', array_merge(request()->query(), ['is_published' => 'no'])) }}" 
               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Unpublished
            </a>
        </li>
    </ul>
</div>

{{-- Highlighed Status Filter --}}
<button id="highlighedDropDownButton" data-dropdown-toggle="highlighedDropDown" data-dropdown-trigger="hover" 
    class="font-medium rounded-lg text-sm px-3 py-1.5 text-md text-center inline-flex items-center bg-theme text-white dark:bg-white dark:text-theme" type="button">
    {{ request('is_highlighed') ? (request('is_highlighed') === 'yes' ? 'Highlighed' : 'Not Highlighed') : 'Highlighed Status' }}
    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg>  
</button>
<div id="highlighedDropDown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="highlighedDropDownButton">
        <li>
            <a href="{{ route('articles.index', array_merge(
                collect(request()->query())->except(['is_highlighed'])->all()
            )) }}" 
               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                All
            </a>
        </li>
        <li>
            <a href="{{ route('articles.index', array_merge(request()->query(), ['is_highlighed' => 'yes'])) }}" 
               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Highlighed
            </a>
        </li>
        <li>
            <a href="{{ route('articles.index', array_merge(request()->query(), ['is_highlighed' => 'no'])) }}" 
               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Not Highlighed
            </a>
        </li>
    </ul>
</div>

{{-- Banner Status Filter --}}
<button id="bannerDropDownButton" data-dropdown-toggle="bannerDropDown" data-dropdown-trigger="hover" 
    class="font-medium rounded-lg text-sm px-3 py-1.5 text-md text-center inline-flex items-center bg-theme text-white dark:bg-white dark:text-theme" type="button">
    {{ request('is_banner') ? (request('is_banner') === 'yes' ? 'Banner' : 'Not Banner') : 'Banner Status' }}
    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg>  
</button>
<div id="bannerDropDown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="bannerDropDownButton">
        <li>
            <a href="{{ route('articles.index', array_merge(
                collect(request()->query())->except(['is_banner'])->all()
            )) }}" 
               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                All
            </a>
        </li>
        <li>
            <a href="{{ route('articles.index', array_merge(request()->query(), ['is_banner' => 'yes'])) }}" 
               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Banner
            </a>
        </li>
        <li>
            <a href="{{ route('articles.index', array_merge(request()->query(), ['is_banner' => 'no'])) }}" 
               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Not Banner
            </a>
        </li>
    </ul>
</div>