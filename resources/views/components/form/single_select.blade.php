@props(['title', 'required' => false, 'name','id'=>null])
<x-form.control>
    <x-form.label :title="$title" :required="$required" />
    <select
        data-hs-select='{
    "hasSearch": true,
    "searchPlaceholder": "Search...",
    "searchClasses": "py-2 px-4 w-full text-md text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg bg-gray-50 border-2 border-gray-300 text-gray-900 text-md dark:bg-gray-100 dark:text-gray-900 tracking-wider",
    "searchWrapperClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg bg-gray-50 border-2 border-gray-300 text-gray-900 text-md dark:bg-gray-100 dark:text-gray-900 tracking-wider",
    "placeholder": "Select ...",
    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-900 \" data-title></span></button>",
    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-gray-50 border border-gray-200 rounded-lg text-start text-md focus:outline-none focus:ring-0 rounded-lg bg-gray-50 border-2 border-gray-300 text-gray-200 text-md dark:bg-gray-100 dark:text-gray-300 tracking-wider",
    "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-gray-50 border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-gray-100 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-gray-100 dark:border-gray-100",
    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg bg-gray-50 border-2 border-gray-300 text-gray-900 text-md dark:bg-gray-100 dark:text-gray-900 tracking-wider",
    "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 \" data-title></div></div></div>",
    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-900 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
  }'
        class="" name="{{ $name }}" id="{{ $id }}">
        <option value="">Choose</option>
        {{ $slot }}
    </select>
    <x-form.error :field="$name" />

</x-form.control>
