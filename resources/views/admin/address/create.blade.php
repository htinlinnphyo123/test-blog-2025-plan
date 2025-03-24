<x-master-layout name="Address" headerName="{{ __('sidebar.address') }}">
    <x-form.layout>
        <form action="{{ route('addresses.store') }}" method="post">
            @csrf
            {{-- Country Single Select --}}
                <x-form.single_select title="address.country" name="country_id" :required="true">
                    @foreach ($viewCountries as $c)
                        <option value="{{ $c['id'] }}">
                            {{ $c['name'] }}
                        </option>
                    @endforeach
                </x-form.single_select>
                {{-- Country Single Select --}}
            <x-form.grid>
                <x-form.input_group title="address.level1_name" name="level1_name" id="level1_name" :required="true" />
                <x-form.input_group title="address.level1_code" name="level1_code" id="level1_code" :required="true" />
                <x-form.input_group title="address.level2_name" name="level2_name" id="level2_name" :required="true" />
                <x-form.input_group title="address.level2_code" name="level2_code" id="level2_code" :required="true" />
                <x-form.input_group title="address.level3_name" name="level3_name" id="level3_name" :required="true" />
                <x-form.input_group title="address.level3_code" name="level3_code" id="level3_code" :required="true" />
                <x-form.input_group title="address.level4_name" name="level4_name" id="level4_name" :required="true" />
                <x-form.input_group title="address.level4_code" name="level4_code" id="level4_code" :required="true" />
               
            </x-form.grid>
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="addresses.index" />
        </form>
    </x-form.layout>
</x-master-layout>
