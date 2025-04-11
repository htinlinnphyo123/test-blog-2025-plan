<x-master-layout name="Article" headerName="{{ __('sidebar.article') }}">
    <x-form.layout>
        <x-common.url_back_button />
        <br><br>
        <x-show.grid :isBackground='true'>
            <!-- <x-show.text_group title="article.id" :data="$data['id']" /> -->
            <x-show.text_group title="article.title" :data="$data['title']" />
            <x-show.text_group title="article.keywords" :data="$data['keywords']" />
            <x-show.text_group title="article.category_show" :data="$data['category']" />
            <x-show.text_group title="article.subcategory_show" :data="$data['subcategory']" />
            <x-show.thumbnail
                title="article.thumbnail_status" 
                :src="$data['thumbnail']" 
                width="w-40" 
                height="h-32" 
                />
        </x-show.grid>
        <x-show.grid :isBackground='true' class="mt-4 lg:mt-8">
            <x-show.text_group title="article.description" :data="$data['description']" />
            <x-show.media title="article.media" :type="$data['type']" :links="$data['link']" />
        </x-show.grid>
    </x-form.layout>
    @vite('resources/js/tag/showPreview.js')
</x-master-layout>
