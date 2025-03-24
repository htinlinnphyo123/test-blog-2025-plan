@props(['id', 'field', 'isRole' => null])
<td class="px-3 py-0.5 me-2">
    <style>
        .my-svg {
            fill: rgb(95, 85, 85);
            /* Change to desired color */
        }
    </style>
    <div class="flex justify-end items-center ">
        <button id="action_dropdown_btn_{{ $id }}" data-dropdown-toggle="action_{{ $id }}"
            type="button" data-dropdown-placement="left">
            <i class="fa-solid fa-bars text-xl cursor-pointer"></i>
        </button>

        <!-- Dropdown menu -->
        <div id="action_{{ $id }}"
            class="{{ config('config.dropdown.wrapper') }} border border-gray-200 shadow-2xl">
            <ul class="{{ config('config.dropdown.ul') }} min-w-32" aria-labelledby="action_{{ $id }}">
                <x-table.show route="{{ $field }}.show" :id="$id" />
                @php
                    $editPermission = 'edit ' . $field;
                    $deletePermission = 'delete ' . $field;
                @endphp
                @if (permissionCheck([$editPermission]))
                    <x-table.edit route="{{ $field }}.edit" :id="$id" />
                @endif
                @if (permissionCheck([$deletePermission]))
                    <x-table.delete route="{{ $field }}.destroy" :id="$id" :isRole="$isRole" />
                @endif
                {{ $slot }}
            </ul>
        </div>
    </div>
</td>
