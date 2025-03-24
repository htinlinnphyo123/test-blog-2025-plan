<x-master-layout name="page" headerName="{{ __('sidebar.page') }}">
    <x-form.layout>
        <x-common.url_back_button />
        <br><br>
        <x-show.grid :isBackground='true'>
            <!-- <x-show.text_group title="page.id" :data="$data['id']" /> -->
            <x-show.text_group title="page.title" :data="$data['title']" />
            <x-show.text_group title="page.title_other" :data="$data['title_other']" />
            <x-show.text_group title="page.createdBy" :data="$data['createdBy']" />
            <x-show.text_group title="page.slug" :data="$data['slug']" />
            <x-show.text_group title="page.writtenBy" :data="$data['writtenBy']" />
            {{-- <x-show.text_group title="page.publish_date" :data="$data['date']" /> --}}
            {{-- <x-show.text_group title="page.type_status" :data="$data['type']" /> --}}
            {{-- <x-show.boolean title="page.publish_status" :data="$data['is_published']" /> --}}
            {{-- <x-show.boolean title="page.banner_status" :data="$data['is_banner']" /> --}}
            {{-- <x-show.boolean title="page.highlighed_status" :data="$data['is_highlighed']" /> --}}
            <x-show.thumbnail
                title="page.thumbnail_status" 
                :src="$data['thumbnail']" 
                width="w-40" 
                height="h-32" 
                />
        </x-show.grid>
        <x-show.grid :isBackground='true' class="mt-4 lg:mt-8">
            <x-show.text_group title="page.description" :data="$data['description']" />
            <x-show.text_group title="page.description_other" :data="$data['description_other']" />
            <x-show.media title="page.media" :type="$data['type']" :links="$data['link']" />
        </x-show.grid>
    </x-form.layout>
</x-master-layout>
