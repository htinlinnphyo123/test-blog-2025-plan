<x-master-layout name="Sport" headerName="{{ __('sidebar.sport') }}">
   <main class="h-full overflow-y-auto">
        <div class="container px-1 md:px-6 mx-auto grid">
            <div class="container md:flex justify-start md:justify-between items-start mx-auto mt-5">
                <x-common.search keyword="{{ request()->keyword }}" />
                <x-common.create_button route="sports.create" permission="create sports" />
            </div>
            <x-table.wrapper>
                <x-table.header :fields="['name']" />
                <x-table.body :data="$data">
                    @foreach ($data['data'] as $record)
                        <x-table.body_row>
                            <x-table.body_column :field="$record['name']" limit="20" />
                            <x-table.action :id="$record['id']" field="sports" />
                        </x-table.body_row>
                    @endforeach
                </x-table.body>
            </x-table.wrapper>
            <x-pagination.index route="sports.index" :meta="$data['meta']" />
        </div>
    </main>
    @vite('resources/js/common/deleteConfirm.js') 
</x-master-layout>
