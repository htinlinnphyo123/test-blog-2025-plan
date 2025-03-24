@props(['status','true'=>'Active','false'=>'Inactive'])
<td class="px-3 py-0.5 mx-auto">
    <div class="flex items-center">
        @if ($status===true)
            <div class="text-white p-1 text-xs rounded-md bg-green-500 ms-4">{{ $true }}</div>
        @else
            <div class="text-white p-1 text-xs rounded-md bg-red-500 ms-4">{{ $false }}</div>
        @endif
    </div>
</td>
