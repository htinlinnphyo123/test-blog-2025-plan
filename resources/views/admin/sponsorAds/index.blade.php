<x-master-layout name="SponsorAd" headerName="{{ __('sidebar.sponsorAd') }}">
    <main class="h-full overflow-y-auto">
        <div class="container px-1 md:px-6 mx-auto grid">
            <div class="container md:flex justify-start md:justify-between items-start mx-auto mt-5">
                <x-common.search keyword="{{ request()->keyword }}" />
                <x-common.create_button route="sponsorAds.create" permission="create sponsorAds" />
            </div>
            <x-table.wrapper>
                <x-table.header :fields="['ad_name', 'photo', 'description', 'start_date', 'end_date', 'platform', 'status']" />
                <x-table.body :data="$data">
                    @foreach ($data['data'] as $record)
                        <x-table.body_row>
                            <x-table.body_column :field="$record['name']" limit="20" />
                            <x-table.body_column :field="$record['thumbnail_image']" limit="20" :image="true"
                                imageStyle="rounded w-12 h-12" />
                            <x-table.body_column :field="$record['description']" limit="20" />
                            <x-table.body_column :field="$record['start_date']" limit="20" />
                            <x-table.body_column :field="$record['end_date']" limit="20" />
                            <x-table.body_column :field="$record['platform']" limit="20" />
                            <x-table.status :status="$record['status']"></x-table.status>
                            <x-table.action :id="$record['id']" field="sponsorAds">
                                <li>
                                    <div
                                        class="w-full block text-sky hover:bg-sky-700 hover:text-white pl-4 lg:pr-4 transition-all py-1">
                                        <button value="{{ $record['id'] }}"
                                            class="w-full text-start btnSentSponsorAd">{{ __('messages.send') }}</button>
                                    </div>
                                </li>
                            </x-table.action>
                        </x-table.body_row>
                    @endforeach
                </x-table.body>
            </x-table.wrapper>
            <x-pagination.index route="sponsorAds.index" :meta="$data['meta']" />
        </div>
    </main>
    <script>
        const viewCountries = @json($viewCountries);
        const csrfToken = "{{ csrf_token() }}";
    </script>
    @vite(['resources/js/common/deleteConfirm.js', 'resources/js/admin/sendsponsorAd.js'])
</x-master-layout>
