@props(['route','id'])
<li>
    <a href="{{ route($route, $id) }}"
        class="w-full block text-blue-700 hover:bg-blue-700 hover:text-white pl-4 lg:pr-4 transition-all py-1">
        <button type="button">
            {{ __('messages.edit') }}
        </button>
    </a>
</li>