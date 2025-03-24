<x-master-layout name="Setting" headerName="{{ __('sidebar.setting') }}">
    <x-form.layout>
        <form action="{{ route('settings.update', $data['id']) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data['id'] }}">
            <x-form.grid>
                <x-form.input_group title="setting.key" name="key" id="key" :value="$data['key']" :required="true" />
                <x-form.input_group title="setting.value" name="value" id="value" :value="$data['value']" :required="true"/>
            </x-form.grid>
            <x-form.submit :operate="__('messages.update')" :cancel="__('messages.cancel')" url="settings.index" />
        </form>
    </x-form.layout>
    @vite('resources/js/common/loginEyes.js')
</x-master-layout>
