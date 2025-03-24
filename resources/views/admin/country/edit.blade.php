<x-master-layout name="Country" headerName="{{ __('sidebar.country') }}">
    <x-form.layout>
        <form action="{{ route('countries.update', $data['id']) }}" method="post">
            @csrf
            @method('PUT')
            {{-- Name --}}
            <x-form.input_group title="country.country_name" name="name" id="name" :value="$data['name']"
                :required="true" placeholder="country_name" />
            {{-- Name --}}
            <input type="hidden" name="id" value="{{ $data['id'] }}">
            <x-form.grid>
                {{-- Country --}}
                <x-form.input_group title="country.zip_code" name="zip_code" id="zip-code" :value="$data['zip_code']"
                    placeholder="zip_code" />
                {{-- Country --}}
                {{-- Country Code --}}
                <x-form.input_group title="country.country_code" name="country_code" id="country-code" :value="$data['country_code']"
                    placeholder="country_code" />
                {{-- Country Code --}}
                {{-- Measure --}}
                <x-form.input_group title="country.measure" name="measure" id="country-code" :value="$data['measure']"
                    placeholder="measure" helperText="measure" />
                {{-- Measure --}}
                {{--Measure Unit--}}
                <x-form.select_group title="country.measure_unit" name="measure_unit">
                    <option value="m²" @if($data['measure_unit'] == 'm²') selected @endif>
                        {{ 'm' }}&sup2;
                    </option>
                    <option value="ft²" @if($data['measure_unit'] == 'ft²') selected @endif>
                        {{ 'ft' }}&sup2;
                    </option>
                    {{-- <x-form.option title="country.measure_unit" value="m&sup2;" 
                        editCheck="$data['measure_unit']" />
                    <x-form.option title="country.measure_unit" value="ft&sup2;" 
                        editCheck="$data['measure_unit']" /> --}}
                </x-form.select_group>
                {{--Measure Unit--}}
                {{-- Currency Code --}}
                <x-form.input_group title="country.currency_code" name="currency_code" id="currency-code"
                    :value="$data['currency_code']" placeholder="currency_code" />
                {{-- Currency Code --}}
                <x-form.select_group title="country.currency_status" name="currency_status">
                    <x-form.option title="Active" value="1" field="currency_status"
                        editCheck="$data['currency_status']" />
                    <x-form.option title="Inactive" value="0" field="currency_status"
                        editCheck="$data['currency_status']" />
                </x-form.select_group>
            </x-form.grid>
            {{-- Update And Cancel --}}
            <x-form.submit :operate="__('messages.update')" :cancel="__('messages.cancel')" url="countries.index" />
            {{-- Update And Cancel --}}
        </form>
    </x-form.layout>

    @vite('resources/js/common/loginEyes.js')
</x-master-layout>
