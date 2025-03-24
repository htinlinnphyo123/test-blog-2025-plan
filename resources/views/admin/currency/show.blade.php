<x-master-layout name="Currency" headerName="{{ __('sidebar.currency') }}">
    <x-form.layout>
        <x-common.url_back_button />
        <br><br>
        <x-show.grid :isBackground='true'>
            {{-- <x-show.text_group title="currency.id" :data="$data['id']" /> --}}
            <x-show.text_group title="currency.rate" :data="$data['rate']" />
            <x-show.text_group title="currency.date" :data="$data['date']" />
            <x-show.text_group title="currency.time" :data="$data['time']" />
        </x-show.grid>
    </x-form.layout>
</x-master-layout>
