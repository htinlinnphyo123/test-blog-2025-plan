<x-master-layout name="Article" headerName="{{ __('sidebar.article') }}">
   <main class="h-full overflow-y-auto">
        <div class="container px-1 md:px-6 mx-auto grid">
            <div class="container md:flex justify-start md:justify-between items-start mx-auto mt-5">
                <x-common.search keyword="{{ request()->keyword }}" />
                <x-common.create_button route="articles.create" permission="create articles" />
            </div>
            <x-table.wrapper>
                <x-table.header :fields="['article_title','category','subcategory','type','is_published']" />
                <x-table.body :data="$data">
                    @foreach ($data['data'] as $record)
                        <x-table.body_row>
                            <x-table.body_column :field="$record['title']" limit="40" />
                            <x-table.body_column :field="$record['category']" />
                            <x-table.body_column :field="$record['subcategory']" />
                            <x-table.body_column :field="$record['type']" />
                            <x-table.status :status="$record['is_published']" true="Yes" false="No" />
                            <x-table.action :id="$record['id']" field="articles" />
                        </x-table.body_row>
                    @endforeach
                </x-table.body>
            </x-table.wrapper>
            <x-pagination.index route="articles.index" :meta="$data['meta']" />
        </div>
    </main>
    @vite(['resources/js/common/deleteConfirm.js']) 
</x-master-layout>
