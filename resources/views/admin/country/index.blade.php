<x-master-layout name="Country" headerName="{{ __('sidebar.country') }}">
    <main class="h-full overflow-y-auto">
        <main class="h-full overflow-y-auto">
            <div class="container px-1 md:px-6 mx-auto grid">
                <div class="container flex flex-wrap justify-between mx-auto mt-5">
                    <x-common.search keyword="{{ request()->keyword }}" />
                    <x-common.create_button route="countries.create" permission="create countries" />
                    <x-common.index_toast field="id" />
                </div>
                <x-table.wrapper>
                    <x-table.header :fields="[
                        'country_name',
                        'zip_code',
                        'country_code',
                        'measure',
                        'currency_code',
                        'currency_status',
                    ]" />
                    <x-table.body :data="$data">

                        @foreach ($data['data'] as $record)
                            <x-table.body_row>
                                <x-table.body_column :field="$record['name']" limit="20" />
                                <x-table.body_column :field="$record['zip_code']" limit="20" />
                                <x-table.body_column :field="$record['country_code']" limit="20" />
                                {{-- <x-table.body_column :field="$record['image']" limit="20" :image="true"
                                    imageStyle="rounded w-12 h-12" /> --}}
                                <x-table.body_column :field="$record['measure'] . ' ' . $record['measure_unit']" limit="20" />
                                <x-table.body_column :field="$record['currency_code']" limit="20" />
                                <x-table.status :status="$record['currency_status']"></x-table.status>
                                <x-table.action :id="$record['id']" field="countries" />
                            </x-table.body_row>
                        @endforeach

                    </x-table.body>
                </x-table.wrapper>
                <x-pagination.index route="countries.index" :meta="$data['meta']" />
            </div>
        </main>
        @vite('resources/js/common/deleteConfirm.js')
        {{-- @vite('resources/js/common/deleteConfirm.js') --}}
</x-master-layout>
