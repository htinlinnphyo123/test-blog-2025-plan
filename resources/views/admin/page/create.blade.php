<x-master-layout name="page" headerName="{{ __('sidebar.page') }}">
    <x-form.layout>
        <form id="page-submit" action="{{ route('pages.store') }}" method="post">
            @csrf
            <x-form.grid>
                {{-- Title --}}
                <x-form.input_group title="page.title" name="title" id="title" 
                    :required="true" placeholder="page_title">
                    <x-slot:ajaxError>
                        <p id="title_error" class="text-sm text-red-700 hidden"></p>
                    </x-slot:ajaxError>
                </x-form.input_group>
                {{-- Title --}}

                {{-- Title in other language --}}
                <x-form.input_group title="page.title_other" name="title_other" id="title_other"
                    placeholder="page_title_other" />
                {{-- Title in other language --}}

                {{-- Slug --}}
                <x-form.input_group title="page.slug" name="slug" id="slug"
                    placeholder="page_slug">
                    <x-slot:ajaxError>
                        <p id="slug_error" class="text-sm text-red-700 hidden"></p>
                    </x-slot:ajaxError>
                </x-form.input_group>
                {{-- Slug --}}

                {{-- Thumbnail --}}
                <x-file.simple_img_upload title="page.thumbnail" name="thumbnail" id="thumbnail" photoId="thumbnail_pic" />
                {{-- Thumbnail --}}

            </x-form.grid>

            <x-form.quill_editor title="page.description" name="description" id="description" helperText="description"/>
            <x-form.quill_editor title="page.description_other" name="description_other" id="description_other" helperText="description" />

            <x-file.simple_file title="page.link" name="link" id="link" />
            <p id="indicator" class="text-sm"></p>
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="pages.index" />
        </form>
    </x-form.layout>
    @vite([
        'resources/js/admin/pagecreate.js',
        'resources/js/common/maxFileSize.js'
    ])
</x-master-layout>