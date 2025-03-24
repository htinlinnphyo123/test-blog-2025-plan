<x-master-layout name="Setting" headerName="{{ __('sidebar.setting') }}">
    <x-form.layout>
        <form action="{{ route('settings.store') }}" method="post">
            @csrf
            <x-form.grid>
                <x-form.input_group title="setting.key" name="key" id="key" :required="true" />
                <x-form.input_group title="setting.value" name="value" id="value" :required="true" />
            </x-form.grid>
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="settings.index" />
        </form>
    </x-form.layout>
</x-master-layout>
