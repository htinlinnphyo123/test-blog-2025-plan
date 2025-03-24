<x-master-layout name="Role" headerName="{{ __('sidebar.role') }}">
    <x-form.layout>
        <x-common.url_back_button />
        <br><br>
        <x-show.grid :isBackground='true'>
            {{-- <x-show.text_group title="role.id" :data="$data['id']" /> --}}
            <x-show.text_group title="role.role_name" :data="$data['name']" />
        </x-show.grid>
    </x-form.layout>
</x-master-layout>
