<x-master-layout name="Sport" headerName="{{ __('sidebar.sport') }}">
    <x-form.layout>
        <x-common.url_back_button />
        <br><br>
        <x-show.grid :isBackground='true'>
            <x-show.text_group title="sport.id" :data="$data['id']" />
            <x-show.text_group title="sport.name" :data="$data['name']" />
            <x-show.text_group title="sport.slug" :data="$data['slug']" />
            
            <x-show.text_group title="sport.description" :data="$data['description']" />
            <x-show.text_group title="sport.date" :data="$data['date']" />
            <x-show.text_group title="sport.time" :data="$data['time']" />
            <x-show.text_group title="sport.status" :data="$data['status']" />
            <x-show.text_group title="sport.link" :data="$data['link']" />
            <x-show.thumbnail title="sport.image" :src="$data['image']"/>
        </x-show.grid>
    </x-form.layout>
</x-master-layout>
