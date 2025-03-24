@props(['data'])
@if(count($data['data'])>0)
    <tbody>
        {{ $slot }}
    </tbody>
@else
    <tr>
        <td colspan="10" class="text-center text-sm md:text-md py-4 md:py-10 font-bold fond-gray-400">
            There is no data currently right now.
        </td>
    </tr>
@endif

