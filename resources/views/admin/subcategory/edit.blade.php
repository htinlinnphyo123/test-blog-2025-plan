<x-master-layout name="Subcategory" headerName="{{ __('sidebar.subcategory') }}">
    <x-form.layout>
        <form action="{{ route('subcategories.update', $data['id']) }}" method="post">
            @csrf
            @method('PUT')
            <x-form.grid>
                <x-form.input_group title="subcategory.subcategory_name" name="name" id="name" :value="$data['name']" :required="true" placeholder="subcategory_name"/>
                <x-form.input_group title="subcategory.subcategory_name_other" name="name_other" :value="$data['name_other']" :required="true" placeholder="subcategory_name_other"/>
                <x-form.input_group title="subcategory.subcategory_description" name="description" :value="$data['description']" placeholder="subcategory_description" />
                <x-form.input_group title="subcategory.subcategory_description_other" name="description_other" :value="$data['description_other']" placeholder="subcategory_description_other" />
               
                {{-- Category Single Select --}}
                <x-form.single_select title="subcategory.category" name="category_id">
                    @foreach ($viewCategories as $c)
                        <option value="{{$c['id']}}" @if ($c['id'] == $data['category_id']) selected @endif>
                            {{ $c['name'] }}
                        </option>    
                    @endforeach
                </x-form.single_select>
                {{-- Category Single Select --}}
            </x-form.grid>
            <x-form.submit :operate="__('messages.update')" :cancel="__('messages.cancel')" url="subcategories.index" />
        </form>
    </x-form.layout>
</x-master-layout>
