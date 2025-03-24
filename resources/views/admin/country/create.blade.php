<x-master-layout name="Country" headerName="{{ __('sidebar.country') }}">
    <x-form.layout>
        <form action="{{ route('countries.store') }}" method="post">
            @csrf
                {{-- Name --}}
                <x-form.input_group title="country.country_name" name="name" id="name" :required="true" placeholder="country_name" />
                {{-- Name --}}
            <x-form.grid>
                {{-- Zip Code --}}
                <x-form.input_group title="country.zip_code" name="zip_code" id="zip_code" placeholder="zip_code"  />
                {{-- Zip Code --}}
                {{-- Country Code --}}
                <x-form.input_group title="country.country_code" name="country_code" id="country_code" placeholder="country_code" />
                {{-- Country Code --}}
                {{-- Measure --}}
                <x-form.input_group title="country.measure" name="measure" id="measure" placeholder="measure" helperText="measure" />
                {{-- Measure --}}
                {{---Measure Unit--}}
                <x-form.single_select title="country.measure_unit" name="measure_unit">
                    <option value="m²">{{ 'm²' }}</option>
                    <option value="ft²">{{ 'ft²' }}</option>
                    {{-- <option value="m&sup2;">m&sup2;</option>
                    <option value="ft&sup2;">ft&sup2;</option> --}}
                </x-form.single_select>
                {{--Measure Unit --}}
                {{-- Currency  Code --}}
                <x-form.input_group title="country.currency_code" name="currency_code" id="currency_code" placeholder="currency_code" />
                <x-form.select_group title="country.currency_status" name="currency_status">
                    <x-form.option title="Active" value="1" field="status" />
                    <x-form.option title="Inactive" value="0" field="status" />
                </x-form.select_group>
            </x-form.grid>
            {{-- Save And Cancel --}}
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="countries.index" />
            {{-- Save And Cancel --}}
        </form>
    </x-form.layout>

    @vite('resources/js/common/loginEyes.js')
</x-master-layout>
