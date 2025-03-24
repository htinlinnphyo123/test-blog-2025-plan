@props(['status'])
<td class="px-3 py-0.5 mx-auto">
    <div class="flex items-center">
        @if ($status == 1)
            <div class="text-white p-1 text-xs rounded-md bg-green-500 ms-4">Publish</div>
        @else
            <div class="text-white p-1 text-xs rounded-md bg-red-500 ms-4">Unpublish</div>
        @endif
    </div>
</td>
