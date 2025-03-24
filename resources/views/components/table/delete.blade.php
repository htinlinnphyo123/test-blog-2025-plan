@props(['route', 'id', 'isRole' => null])
<li>
    <form action="{{ route($route, $id) }}" method="post" class="formActionDelete">
        @csrf
        @method('DELETE')
        <input type="hidden" value="{{ $id }}" name="id">
        @if ($isRole)
            <input type="hidden" value="{{ $isRole }}" name="role_name">
        @endif
        <button type="submit"
            class="text-red-600 hover:bg-red-600 hover:text-white transition-all w-full py-1 text-start pl-4 lg:pr-4 mt-1">
            {{ __('messages.delete') }}
        </button>
    </form>
</li>
