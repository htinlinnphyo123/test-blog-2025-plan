<x-master-layout name="page" headerName="{{ __('sidebar.page') }}">
    <x-form.layout>
        <form id="editForm" action="{{ route('pages.update', $data['id']) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" id="pageId" value="{{ $data['id'] }}"/>
            <x-form.grid>
                {{-- Title --}}
                <x-form.input_group title="page.title" name="title" id="title" 
                    :required="true" placeholder="page_title" :value="$data['title']">
                    <x-slot:ajaxError>
                        <p id="title_error" class="text-sm text-red-700 hidden">
                            {{__('page.page_title_validation');}}
                        </p>
                    </x-slot:ajaxError>
                </x-form.input_group>
                {{-- Title --}}

                {{-- Title in other language --}}
                <x-form.input_group title="page.title_other" name="title_other" id="title_other"
                    placeholder="page_title_other" :value="$data['title_other']"/>
                {{-- Title in other language --}}

                {{-- Slug --}}
                <x-form.input_group title="page.slug" name="slug" id="slug"
                    placeholder="page_slug" :value="$data['slug']">
                    <x-slot:ajaxError>
                        <p id="slug_error" class="text-sm text-red-700 hidden"></p>
                    </x-slot:ajaxError>
                </x-form.input_group>
                {{-- Slug --}}

                {{-- Thumbnail --}}
                <x-file.simple_img_upload title="page.thumbnail" name="thumbnail" id="thumbnail" 
                    photoId="thumbnail_pic" :imageSrc="$data['thumbnail']" />
                {{-- Thumbnail --}}

                {{-- Users --}}
                <x-form.single_select title="page.written" name="written_by" id="written_by" >
                    @foreach ($viewUsers as $user)
                        <option value="{{ $user['id'] }}" @if($user['id']==$data['writtenBy']) selected @endif>
                            {{ $user['name'] }}
                        </option>
                    @endforeach
                </x-form.single_select>

            </x-form.grid>

            {{-- Date Published --}}
            @if(permissionCheck(['publish pages']))
                <x-form.fieldset title="page.fieldset_published">
                    <x-form.checkbox title="page.is_published" name="is_published" id="is_published" :checked="$data['is_published']" />
                    <p id="published_error" class="text-sm text-red-700 hidden">
                        {{__('page.page_publish_date_validation');}}
                    </p>
                    <x-form.date_picker title="page.date" name="date" id="date" :value="$data['date']" />
                    <x-form.checkbox title="page.is_highlighed" name="is_highlighed" id="is_highlighed" :checked="$data['is_highlighed']"/>
                    <x-form.checkbox title="page.is_banner" name="is_banner" id="is_banner" :checked="$data['is_banner']"/>
                </x-form.fieldset>
            @else
                <input type="hidden" id="date" value="{{ $data['date'] }}" />
            @endif
            {{-- Date Published --}}

            <x-form.quill_editor title="page.description" 
                name="description" id="description" helperText="description"
                :value="$data['description']"
                />
            <x-form.quill_editor title="page.description_other"
                name="description_other" id="description_other" helperText="description"
                :value="$data['description_other']"
                />

            {{-- Type --}}
            <x-form.simple_select title="page.type" name="type" id="type" :required="true" :disabled="true">
                @foreach (App\Enums\PageType::cases() as $type)
                    <option value="{{ $type->value }}"
                        @if($type->value==$data['type']) selected @endif>
                        {{ $type->name }}
                    </option>
                @endforeach
            </x-form.simple_select>
            {{-- Type --}}

            <input type="hidden" id="model_links" value="{{ json_encode($data['link']) }}"/>
            <x-file.simple_file title="page.link" name="link" id="link" />
            <p id="indicator" class="text-sm"></p>
            <x-form.submit :operate="__('messages.update')" :cancel="__('messages.cancel')" url="pages.index" />
        </form>
    </x-form.layout>
    @vite([
        'resources/js/admin/pageupdate.js',
        'resources/js/common/maxFileSize.js'
        ])
</x-master-layout>
