<button id="categoryDropDownButton" data-dropdown-toggle="categoryDropDown" data-dropdown-trigger="hover" 
    class="font-medium rounded-lg text-sm px-3 py-1.5 text-md text-center inline-flex items-center bg-theme text-white dark:bg-white dark:text-theme" type="button">
    {{ request('category') ?? 'Filter By Category' }}
    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg>  
</button>
<!-- Dropdown menu -->
<div id="categoryDropDown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="categoryDropDownButton">
        @foreach ($viewCategories as $category)
            <li>
                <a href="{{ route('articles.index',array_merge(request()->query(),['category'=>$category->name])) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>