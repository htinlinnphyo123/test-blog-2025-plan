<x-master-layout name="Article" headerName="{{ __('sidebar.article') }}">
   <main class="h-full overflow-y-auto">
        <div class="container px-1 md:px-6 mx-auto grid">
            <div class="container md:flex justify-start md:justify-between items-start mx-auto mt-5">
                <x-common.search keyword="{{ request()->keyword }}" />
                <x-common.create_button route="articles.create" permission="create articles" />
            </div>
            <div class="flex justify-start gap-4 mt-4 items-center">
                <p class="dark:text-white">Filter By</p>
                @include('admin.article.index_category')
                @include('admin.article.index_subcategory')
                @include('admin.article.index_publish')
            </div>
            <x-table.wrapper>
                <x-table.header :fields="['article_title','category','subcategory','type','posted_by','is_published','is_highlighed','is_banner','view','posted_date','created_date']" />
                <x-table.body :data="$data">
                    @foreach ($data['data'] as $record)
                        <x-table.body_row>
                            <x-table.body_column :field="$record['title']" limit="40" />
                            <x-table.body_column :field="$record['category']" />
                            <x-table.body_column :field="$record['subcategory']" />
                            <x-table.body_column :field="$record['type']" />
                            <x-table.body_column :field="$record['createdBy']" />
                            <x-table.status :status="$record['is_published']" true="Yes" false="No" />
                            <x-table.status :status="$record['is_highlighed']" true="Yes" false="No" />
                            <x-table.status :status="$record['is_banner']" true="Yes" false="No" />
                            <x-table.body_column :field="$record['total_view_count']" limit="20" />
                            <x-table.body_column :field="$record['date']" limit="20" />                
                            <x-table.body_column :field="$record['created_at']" limit="30"/>
                            <x-table.action :id="$record['id']" field="articles">
                                <li>
                                    <div
                                    class="w-full block text-sky hover:bg-sky-700 hover:text-white pl-4 lg:pr-4 transition-all py-1">
                                    <button value="{{ $record['id'] }}" class="w-full text-start btnSentArticleNoti">Send</button>
                                    </div>
                                </li>
                            </x-table.action>
                        </x-table.body_row>
                    @endforeach
                </x-table.body>
            </x-table.wrapper>
            <x-pagination.index route="articles.index" :meta="$data['meta']" />
        </div>
    </main>
    <script>
        const viewCountries = @json($viewCountries);
        const csrfToken = "{{ csrf_token() }}";
    </script>
    @vite(['resources/js/common/deleteConfirm.js','resources/js/admin/sendarticlenotification.js']) 
</x-master-layout>
