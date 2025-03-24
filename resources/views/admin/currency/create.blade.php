<x-master-layout name="Currency" headerName="{{ __('sidebar.currency') }}">
    <x-form.layout>
        <form action="{{ route('currencies.store') }}" method="post">
            @csrf
            <x-form.grid>
                <x-form.input_group title="currency.rate" name="rate" id="rate" :required="true" placeholder="rate_validation" />
                <x-form.single_select title="currency.country_id" name="country_id" :required="true">
                    @foreach ($viewCountries as $c)
                        <option value="{{ $c['id'] }}">
                            {{ $c['name'] }}
                        </option>
                    @endforeach
                </x-form.single_select>
                <x-form.input_group type="date" title="currency.date" name="date" id="date"  />
                <x-form.input_group type="time" title="currency.time" name="time" id="time"  />
                
            </x-form.grid>
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="currencies.index" />
        </form>
    </x-form.layout>
</x-master-layout>
