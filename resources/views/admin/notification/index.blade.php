<x-master-layout name="Notification" headerName="{{ __('sidebar.notification') }}">
    <main class="h-full overflow-y-auto">
        <div class="container px-1 md:px-6 mx-auto grid">
            <div class="container md:flex justify-start md:justify-between items-start mx-auto mt-5">
                <x-common.search keyword="{{ request()->keyword }}" />
                <x-common.create_button route="notifications.create" permission="create notifications" />
            </div>
            <x-table.wrapper>
                <x-table.header :fields="['noti_title', 'noti_body', 'uploaded_photo', 'sending_method']" />
                <x-table.body :data="$data">
                    @foreach ($data['data'] as $record)
                        <x-table.body_row>
                            <x-table.body_column :field="$record['title']" limit="20" :required="true" />
                            <x-table.body_column :field="$record['body']" limit="20" :required="true" />
                            <x-table.body_column :field="$record['uploaded_photo']" limit="20" :image="true"
                                imageStyle="rounded w-12 h-12" />
                            <x-table.body_column :field="$record['sending_method']" limit="20" />
                            <x-table.action :id="$record['id']" field="notifications">
                                <li>
                                    <div
                                        class="w-full block text-sky hover:bg-sky-700 hover:text-white pl-4 lg:pr-4 transition-all py-1">
                                        <button value="{{ $record['id'] }}" class="w-full text-start btnSentNotification">{{__('messages.send');}}</button>
                                    </div>
                                </li>
                            </x-table.action>
                        </x-table.body_row>
                    @endforeach
                </x-table.body>
            </x-table.wrapper>
            <x-pagination.index route="notifications.index" :meta="$data['meta']" />
        </div>
    </main>
    <script>
        const viewCountries = @json($viewCountries);
        const csrfToken = "{{ csrf_token() }}";
    </script>
    @vite(['resources/js/common/deleteConfirm.js', 'resources/js/admin/sendnotification.js'])
</x-master-layout>
