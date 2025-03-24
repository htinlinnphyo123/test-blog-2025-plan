<x-master-layout name="Setting" headerName="{{ __('sidebar.setting') }}">
    <x-form.layout>
        <x-common.url_back_button />
        <br><br>
        <x-show.grid :isBackground='true'>
            <x-show.text_group title="setting.key" :data="$data['key']" />
            <x-show.text_group title="setting.value" :data="$data['value']" />
        </x-show.grid>
    </x-form.layout>
</x-master-layout>
