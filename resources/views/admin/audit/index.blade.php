<x-master-layout name="Audit" headerName="{{ __('sidebar.audit') }}">
    <main class="h-full overflow-y-auto">
        <div class="container px-1 md:px-6 mx-auto grid">
            <div class="container md:flex justify-start md:justify-between items-start mx-auto mt-5">
                <x-common.search keyword="{{ request()->keyword }}" />
                <x-common.create_button route="audits.create" />
            </div>
            <x-table.wrapper>
                <x-table.header :fields="['model', 'event', 'old_data', 'new_data', 'created_by', 'created_at']" />
                <x-table.body :data="$data">
                    @foreach ($data['data'] as $record)
                        <x-table.body_row>
                            <x-table.body_column :field="$record['model']" limit="50" />
                            <x-table.body_column :field="$record['event']" limit="20" />
                            <x-table.body_column :field="$record['old_data']" limit="20" />
                            <x-table.body_column :field="$record['new_data']" limit="20" />
                            <x-table.body_column :field="$record['created_by']" limit="20" />
                            <x-table.body_column :field="$record['created_at']" limit="20" />

                            <!-- Dropdown menu Show-->
                            <td class="px-3 py-0.5 me-2">
                                <div class="flex justify-end items-center ">
                                    <button id="action_dropdown_btn_{{ $record['id'] }}"
                                        data-dropdown-toggle="action_{{ $record['id'] }}" type="button"
                                        data-dropdown-placement="left">
                                        <svg viewBox="0 0 100 80" width="30" height="30">
                                            <rect width="90" height="10" rx="10"></rect>
                                            <rect y="20" width="90" height="10" rx="10"></rect>
                                            <rect y="40" width="90" height="10" rx="10"></rect>
                                        </svg>
                                    </button>

                                    <div id="action_{{ $record['id'] }}"
                                        class="{{ config('config.dropdown.wrapper') }} border border-gray-200 shadow-2xl">
                                        <ul class="{{ config('config.dropdown.ul') }} min-w-32"
                                            aria-labelledby="action_{{ $record['id'] }}">
                                            <x-table.show route="audits.show" id="{{ $record['id'] }}" />
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <!-- Dropdown menu Show-->
                        </x-table.body_row>
                    @endforeach
                </x-table.body>
            </x-table.wrapper>
            <x-pagination.index route="audits.index" :meta="$data['meta']" />
        </div>
    </main>
    @vite('resources/js/common/deleteConfirm.js')
</x-master-layout>
