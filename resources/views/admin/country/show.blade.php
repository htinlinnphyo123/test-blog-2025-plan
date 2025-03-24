{{-- @php
    dd($data['currencyList']);
@endphp --}}

<x-master-layout name="Country" headerName="{{ __('sidebar.country') }}">
    <x-form.layout>
        <x-common.url_back_button />
        <br><br>
        <x-show.grid :isBackground='true'>
            {{-- Name --}}
            <x-show.text_group title="country.country_name" :data="$data['country']['name']" />
            {{-- Name --}}
            {{-- Zip Code --}}
            <x-show.text_group title="country.zip_code" :data="$data['country']['zip_code']" />
            {{-- Zip Code --}}
            {{-- Measure --}}
            <x-show.text_group title="country.measure" :data="$data['country']['measure'].' '. $data['country']['measure_unit']" />
            {{-- Measure --}}
            {{-- Country Code --}}
            <x-show.text_group title="country.country_code" :data="$data['country']['country_code']" />
            {{-- Country Code --}}
            {{-- Currency Code --}}
            <x-show.text_group title="country.currency_code" :data="$data['country']['currency_code']" />
            {{-- Currency Code --}}
        </x-show.grid>
        <br><br>

        {{-- Currency Create --}}
        <h2>{{ __('currency.rate') }}</h2>
        <br>
        <x-show.grid :isBackground='true'>
            <x-form.layout>
                <form action="{{ route('currencies.store') }}" method="post">
                    @csrf
                    <x-form.input_group title="currency.rate" name="rate" id="rate" :required="true" />
                    <input type="hidden" name="country_id" id="country_id" value={{ $data['country_id'] }} />
                    <x-form.grid>
                        <x-form.input_group type="date" title="currency.date" name="date" id="date" />
                        <x-form.input_group type="time" title="currency.time" name="time" id="time" />

                    </x-form.grid>
                    <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="countries.show" :id="$data['country']['id']" />
                </form>
            </x-form.layout>
        </x-show.grid>
        {{-- Currency Create --}}

        <x-table.wrapper>
            <x-table.header :fields="['rate', 'date', 'time']" />

            <x-table.body :data="$data['currencyList']">
                @foreach ($data['currencyList']['data'] as $record)
                    <x-table.body_row>
                        <x-table.body_column :field="$record['rate']" limit="20" />
                        <x-table.body_column :field="$record['date']" limit="20" />
                        <x-table.body_column :field="$record['time']" limit="20" />
                        <x-table.action :id="$record['id']" field="currencies" />
                    </x-table.body_row>
                @endforeach
            </x-table.body>
        </x-table.wrapper>
    </x-form.layout>
</x-master-layout>
