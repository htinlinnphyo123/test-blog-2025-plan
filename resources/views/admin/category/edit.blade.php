<x-master-layout name="Category" headerName="{{ __('sidebar.category') }}">
    <x-form.layout>
        <form action="{{ route('categories.update', $data['id']) }}" method="post">
            @csrf
            @method('PUT')
            <x-form.grid>
                <x-form.input_group title="category.categoty_name" name="name" id="name" :value="$data['name']" :required="true" placeholder="category_name"/>
                <x-form.input_group title="category.category_description" name="description" id="description" :value="$data['description']" placeholder="category_description" />
                <x-form.input_group title="category.category_description_other" name="description_other" id="description_other" :value="$data['description_other']" placeholder="category_description_other"/>
            </x-form.grid>
            <x-form.submit :operate="__('messages.update')" :cancel="__('messages.cancel')" url="categories.index" />
        </form>
    </x-form.layout>
</x-master-layout>
