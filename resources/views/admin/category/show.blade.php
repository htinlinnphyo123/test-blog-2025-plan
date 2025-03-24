<x-master-layout name="Category" headerName="{{ __('sidebar.category') }}">
    <x-form.layout>
        <x-common.url_back_button />
        <br><br>
        <x-show.grid :isBackground='true'>
            {{-- <x-show.text_group title="category.id" :data="$data['id']" /> --}}
            <x-show.text_group title="category.categoty_name" :data="$data['name']" />
            <x-show.text_group title="category.category_name_other" :data="$data['name_other']" />
            <x-show.text_group title="category.category_description" :data="$data['description']" />
            <x-show.text_group title="category.category_description_other" :data="$data['description_other']" />
        </x-show.grid>
    </x-form.layout>
</x-master-layout>
