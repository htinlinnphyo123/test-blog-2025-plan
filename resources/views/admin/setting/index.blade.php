<x-master-layout name="Setting" headerName="{{ __('sidebar.setting') }}">
   <main class="h-full overflow-y-auto">
        <div class="container px-1 md:px-6 mx-auto grid">
            <div class="container md:flex justify-start md:justify-between items-start mx-auto mt-5">
                <x-common.search keyword="{{ request()->keyword }}" />
                <x-common.create_button route="settings.create" permission="create settings" />
            </div>
            <x-table.wrapper>
                <x-table.header :fields="['key','value']" />
                <x-table.body :data="$data">
                    @foreach ($data['data'] as $record)
                        <x-table.body_row>
                            <x-table.body_column :field="$record['key']" limit="20" />
                            <x-table.body_column :field="$record['value']" limit="20" />
                            <x-table.action :id="$record['id']" field="settings" />
                        </x-table.body_row>
                    @endforeach
                </x-table.body>
            </x-table.wrapper>
            <x-pagination.index route="settings.index" :meta="$data['meta']" />
        </div>
    </main>
    @vite('resources/js/common/deleteConfirm.js') 
</x-master-layout>
