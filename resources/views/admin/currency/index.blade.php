<x-master-layout name="Currency" headerName="{{ __('sidebar.currency') }}">
    <main class="h-full overflow-y-auto">
        <div class="container px-1 md:px-6 mx-auto grid">
            <div class="container md:flex justify-start md:justify-between items-start mx-auto mt-5">
                <x-common.search keyword="{{ request()->keyword }}" />
                <x-common.create_button route="currencies.create" permission="create currencies" />
            </div>
            <x-table.wrapper>
                <x-table.header :fields="['rate', 'country', 'date', 'time']" />
                <x-table.body :data="$data">
                    @foreach ($data['data'] as $record)
                        <x-table.body_row>
                            <x-table.body_column :field="$record['rate']" limit="20" />
                            <x-table.body_column :field="$record['country_id']" limit="20" />
                            <x-table.body_column :field="$record['date']" limit="20" />
                            <x-table.body_column :field="$record['time']" limit="20" />
                            <x-table.action :id="$record['id']" field="currencies" />
                        </x-table.body_row>
                    @endforeach
                </x-table.body>
            </x-table.wrapper>
            <x-pagination.index route="currencies.index" :meta="$data['meta']" />
        </div>
    </main>
    @vite('resources/js/common/deleteConfirm.js')
</x-master-layout>
