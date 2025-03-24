<x-master-layout name="Currency" headerName="{{ __('sidebar.currency') }}">
    <x-form.layout>
        <form action="{{ route('currencies.update', $data['id']) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data['id'] }}">
            <input type="hidden" name="country_id" value="{{ $data['country_id'] }}">
            <x-form.input_group title="currency.rate" name="rate" id="rate" :value="$data['rate']" :required="true" />
            <x-form.grid>
                <x-form.input_group type="date" title="currency.date" name="date" id="date" :value="$data['date']" />
                <x-form.input_group type="time" title="currency.time" name="time" id="time" :value="$data['time']" />
            </x-form.grid>
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="countries.show" :id="$data['country_id']" />
        </form>
    </x-form.layout>
    @vite('resources/js/common/loginEyes.js')
</x-master-layout>
