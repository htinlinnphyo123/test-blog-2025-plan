<x-master-layout name="Category" headerName="{{ __('sidebar.category') }}">
    <x-form.layout>
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <x-form.grid>
                <x-form.input_group title="category.categoty_name" name="name" id="name" :required="true" placeholder="category_name"/>
                <x-form.input_group title="category.category_name_other" name="name_other" id="name_other" :required="true" placeholder="category_name_other"/>
                <x-form.input_group title="category.category_description" name="description" id="description" placeholder="category_description" />
                <x-form.input_group title="category.category_description_other" name="description_other" id="description_other" placeholder="category_description_other" />
            </x-form.grid>
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="categories.index" />
        </form>
    </x-form.layout>
</x-master-layout>
