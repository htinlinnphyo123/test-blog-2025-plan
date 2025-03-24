<x-master-layout name="Subcategory" headerName="{{ __('sidebar.subcategory') }}">
    <x-form.layout>
        <x-common.url_back_button />
        <br><br>
        <x-show.grid :isBackground='true'>
            {{-- <x-show.text_group title="subcategory.id" :data="$data['id']" /> --}}
            <x-show.text_group title="subcategory.subcategory_name" :data="$data['name']" />
            <x-show.text_group title="subcategory.subcategory_name_other" :data="$data['name_other']" />
            <x-show.text_group title="subcategory.subcategory_description" :data="$data['description']" />
            <x-show.text_group title="subcategory.subcategory_description_other" :data="$data['description_other']" />
            <x-show.text_group title="subcategory.category" :data="$data['category']" />
        </x-show.grid>
    </x-form.layout>
</x-master-layout>
