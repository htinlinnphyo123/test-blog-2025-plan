<x-master-layout name="Dashboard" headerName="{{ __('sidebar.dashboard') }}" class="">

    <main class="h-full overflow-y-auto">
        <div class="">
            <div class="bg-white rounded-lg shadow dark:bg-gray-800 p-2 md:p-4 border border-gray-200/50 mx-0.5 sm:mx-2 lg:mx-8 mt-4 lg:mt-10">
                <div class="dark:text-white flex justify-between items-center px-2 text-sm">
                    <p class="lg:text-md">Most Viewed Articles</p>
                    <a href="{{ route('articles.index') }}">See All Articles</a>
                </div>
                <x-table.wrapper>
                    <x-table.header :fields="['article_title','created_date','posted_date','category','subcategory','view']" />
                    <x-table.body :data="$mostViewArticles">
                        @foreach ($mostViewArticles['data'] as $article)
                            <x-table.body_row>
                                <x-table.body_column :field="$article['title']" limit="100" />
                                <x-table.body_column :field="$article['created_at']" />
                                <x-table.body_column :field="$article['date']" />
                                <x-table.body_column :field="$article['category']" />
                                <x-table.body_column :field="$article['subcategory']" />
                                <x-table.body_column :field="$article['total_view_count']" />
                                <x-table.action :id="$article['id']" field="articles" />
                            </x-table.body_row>
                        @endforeach
                    </x-table.body>
                </x-table.wrapper>
            </div>
            <div class="bg-white rounded-lg shadow dark:bg-gray-800 p-2 md:p-4 border border-gray-200/50 mx-0.5 sm:mx-2 lg:mx-8 mt-4 lg:mt-10">
                <div class="dark:text-white flex justify-between items-center px-2 text-sm">
                    <p>Last Online Users</p>
                    <a href="{{ route('users.index') }}">See All Users</a>
                </div>
                <x-table.wrapper>
                    <x-table.header :fields="['user_name','ip_address','user_agent','last_activity']" />
                    <x-table.body :data="$mostViewArticles">
                        @foreach ($onlineUsers as $user)
                            <x-table.body_row>
                                <x-table.body_column :field="$user->name" />
                                <x-table.body_column :field="$user->ip_address" />
                                <x-table.body_column :field="$user->user_agent" />
                                <x-table.body_column :field="$user->last_activity" />
                            </x-table.body_row>
                        @endforeach
                    </x-table.body>
                </x-table.wrapper>
            </div>
        </div>
    </main>
    @vite('resources/js/dashboard/chart.js')
</x-master-layout>
