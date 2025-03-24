<x-master-layout name="Article" headerName="{{ __('sidebar.article') }}">
    <x-form.layout>
        <x-common.url_back_button />
        <form action="{{ route('articles.sendTelegramNotification',['id'=>$data['id']]) }}" method="POST" class="inline-block">
            @csrf  
            <button class="{{ config('config.sampleForm.buttonCreate') }} mt-2 bg-theme">
                Send In Telegram
            </button>        
        </form>
        <br><br>
        <x-show.grid :isBackground='true'>
            <!-- <x-show.text_group title="article.id" :data="$data['id']" /> -->
            <x-show.text_group title="article.title" :data="$data['title']" />
            <x-show.text_group title="article.title_other" :data="$data['title_other']" />
            <x-show.text_group title="article.category_show" :data="$data['category']" />
            <x-show.text_group title="article.subcategory_show" :data="$data['subcategory']" />
            <x-show.text_group title="article.createdBy" :data="$data['createdBy']" />
            <x-show.text_group title="article.writtenBy" :data="$data['writtenBy']" />
            <x-show.text_group title="article.site_url" :data="$data['site_url']"/>
            <x-show.text_group title="article.tags" :data="$data['tags']" id="tags"/>
            <x-show.text_group title="article.publish_date" :data="$data['date']" />
            <x-show.text_group title="article.type_status" :data="$data['type']" />
            <x-show.boolean title="article.publish_status" :data="$data['is_published']" />
            <x-show.boolean title="article.banner_status" :data="$data['is_banner']" />
            <x-show.boolean title="article.highlighed_status" :data="$data['is_highlighed']" />
            <x-show.thumbnail
                title="article.thumbnail_status" 
                :src="$data['thumbnail']" 
                width="w-40" 
                height="h-32" 
                />
        </x-show.grid>
        <x-show.grid :isBackground='true' class="mt-4 lg:mt-8">
            <x-show.text_group title="article.description" :data="$data['description']" />
            <x-show.text_group title="article.description_other" :data="$data['description_other']" />
            <x-show.media title="article.media" :type="$data['type']" :links="$data['link']" />
        </x-show.grid>
    </x-form.layout>
    @vite('resources/js/tag/showPreview.js')
</x-master-layout>
