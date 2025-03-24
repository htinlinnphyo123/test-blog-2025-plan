<x-master-layout name="Address" headerName="{{ __('sidebar.address') }}">
    <main class="h-full overflow-y-auto">
        <div class="container px-1 md:px-6 mx-auto grid">
            <div class="container md:flex justify-start md:justify-between items-start mx-auto mt-5">
                <x-common.search keyword="{{ request()->keyword }}" />
                <x-common.create_button route="addresses.create" permission="create addresses" />
            </div>
            <x-table.wrapper>
                <x-table.header :fields="[
                    'country',
                    'level1_name',
                    'level2_name',
                    'level3_name',
                    'level4_name',
                ]" />
                <x-table.body :data="$data">
                    @foreach ($data['data'] as $record)
                        <x-table.body_row>
                            <x-table.body_column :field="$record['country']" />
                            <x-table.body_column :field="$record['level1_name']" limit="20" />
                            <x-table.body_column :field="$record['level2_name']" limit="20" />
                            <x-table.body_column :field="$record['level3_name']" limit="20" />
                            <x-table.body_column :field="$record['level4_name']" limit="20" />
                            <x-table.action :id="$record['id']" field="addresses" />
                        </x-table.body_row>
                    @endforeach
                </x-table.body>
            </x-table.wrapper>
            <x-pagination.index route="addresses.index" :meta="$data['meta']" />
        </div>
    </main>
    @vite('resources/js/common/deleteConfirm.js')
</x-master-layout>
