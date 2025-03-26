<x-master-layout name="Subcategory" headerName="{{ __('sidebar.subcategory') }}">
    <x-form.layout>
        <form action="{{ route('subcategories.store') }}" method="post">
            @csrf
            {{-- Category Single Select --}}
            <x-form.single_select title="subcategory.category" name="category_id" :required="true">
                @foreach ($viewCategories as $c)
                    <option value="{{ $c['id'] }}">
                        {{ $c['name'] }}
                    </option>
                @endforeach
            </x-form.single_select>
            {{-- Category single Select --}}
            <x-form.grid>
                <x-form.input_group title="subcategory.subcategory_name" name="name" id="name" :required="true" placeholder="subcategory_name"/>
                <x-form.input_group title="subcategory.subcategory_description" name="description" id="description" placeholder="subcategory_description"/>
            </x-form.grid>
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="subcategories.index" />
        </form>
    </x-form.layout>
</x-master-layout>
