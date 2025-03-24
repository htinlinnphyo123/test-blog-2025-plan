<x-master-layout name="Audit" headerName="{{ __('sidebar.audit') }}">
    <x-form.layout>
        <x-common.url_back_button />
        <br><br>
        <x-show.grid :isBackground='true'>
            {{-- Model --}}
            <x-show.text_group title="audit.model" :data="$data['model']" />
            {{-- Model --}}
            {{-- Event --}}
            <x-show.text_group title="audit.event" :data="$data['event']" />
            {{-- Event --}}
            {{-- Old Data --}}
            <x-show.text_group title="audit.old_data" :data="$data['old_data']" />
            {{-- Old Data --}}
            {{-- New Data --}}
            <x-show.text_group title="audit.new_data" :data="$data['new_data']" />
            {{-- New Data --}}
            {{-- Created By --}}
            <x-show.text_group title="audit.created_by" :data="$data['created_by']" />
            {{-- Created By --}}
            {{-- Created At --}}
            <x-show.text_group title="audit.created_at" :data="$data['created_at']" />
            {{-- Created At --}}
        </x-show.grid>
    </x-form.layout>
</x-master-layout>
