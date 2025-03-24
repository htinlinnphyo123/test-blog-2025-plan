<x-master-layout name="Article" headerName="{{ __('sidebar.article') }}">
    <input type="hidden" id="current-date" value="{{ \Carbon\Carbon::now()->format('m/d/Y') }}" />
    <input type="hidden" id="current-time" value="{{ \Carbon\Carbon::now()->format('H:i') }}" />
    <x-form.layout>
        <form id="editForm" action="{{ route('articles.update', $data['id']) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" id="articleId" value="{{ $data['id'] }}" />
            <x-form.grid>
                {{-- Title --}}
                <x-form.input_group title="article.title" name="title" id="title" :required="true"
                    placeholder="article_title" :value="$data['title']">
                    <x-slot:ajaxError>
                        <p id="title_error" class="text-sm text-red-700 hidden">
                            {{ __('article.article_title_validation') }}
                        </p>
                    </x-slot:ajaxError>
                </x-form.input_group>
                {{-- Title --}}

                {{-- Title in other language --}}
                <x-form.input_group title="article.title_other" name="title_other" id="title_other"
                    placeholder="article_title_other" :value="$data['title_other']" />
                {{-- Title in other language --}}

                {{-- Category --}}
                <x-form.simple_select title="article.category" name="category_id" id="category_id" :required="true">
                    @foreach ($viewCategories as $c)
                        <option value="{{ $c['id'] }}" @if ($c['id'] == $data['category']) selected @endif>
                            {{ $c['name'] }}
                        </option>
                    @endforeach
                    <x-slot:ajaxError>
                        <p id="category_error" class="text-sm text-red-700 hidden">
                            {{ __('article.article_category_validation') }}
                        </p>
                    </x-slot:ajaxError>
                </x-form.simple_select>
                {{-- Category --}}

                {{-- SubCategory --}}

                <input type="hidden" id="subcategory_lists" value="{{ $viewSubcategories }}" />
                <x-form.simple_select title="article.subcategory" name="subcategory_id" id="subcategory_id">
                    @foreach ($viewSubcategories as $c)
                        <option value="{{ $c['id'] }}" @if ($c['id'] == $data['subcategory']) selected @endif>
                            {{ $c['name'] }}
                        </option>
                    @endforeach
                </x-form.simple_select>
                {{-- SubCategory --}}

                {{-- Thumbnail --}}
                <x-file.simple_img_upload title="article.thumbnail" name="thumbnail" id="thumbnail"
                    photoId="thumbnail_pic" :imageSrc="$data['thumbnail']" />
                {{-- Thumbnail --}}

                {{-- Users --}}
                <x-form.single_select title="article.written" name="written_by" id="written_by">
                    @foreach ($viewUsers as $user)
                        <option value="{{ $user['id'] }}" @if ($user['id'] == $data['writtenBy']) selected @endif>
                            {{ $user['name'] }}
                        </option>
                    @endforeach
                </x-form.single_select>
            </x-form.grid>

            {{-- Hash Tag --}}
            <x-form.input_group title="article.tags" name="tags" id="tags" placeholder="article_tags"
                helperText="article_tags" :value="$data['tags']" />
            <div id="previewContainer" class="mb-4 lg:mb-10"></div>
            {{-- Hash Tag --}}

            <x-form.input_group title="article.site_url" name="site_url" id="site_url" placeholder="article_site_url"
                helperText="article_site_url" :value="$data['site_url']" />

            {{-- Date Published --}}
            @if (permissionCheck(['publish articles']))
                <x-form.fieldset title="article.fieldset_published">
                    <x-form.checkbox title="article.is_published" name="is_published" id="is_published"
                        :checked="$data['is_published']" />
                    <p id="published_error" class="text-sm text-red-700 hidden">
                        {{ __('article.article_publish_date_validation') }}
                    </p>

                    <div class="flex flex-wrap justify-start items-center gap-10">
                        <x-form.date_picker title="article.date" name="date" id="date" :value="$data['date']" />
                        <x-form.time_picker title="article.time" name="time" id="time" :value="$data['time']" />
                    </div>
                    <x-form.checkbox title="article.is_highlighed" name="is_highlighed" id="is_highlighed"
                        :checked="$data['is_highlighed']" />
                    <x-form.checkbox title="article.is_banner" name="is_banner" id="is_banner" :checked="$data['is_banner']" />
                </x-form.fieldset>
            @else
                <input type="hidden" id="date" value="{{ $data['date'] }}" />
            @endif
            {{-- Date Published --}}

            <x-form.quill_editor title="article.description" name="description" id="description"
                helperText="description" :value="$data['description']" />
            <x-form.quill_editor title="article.description_other" name="description_other" id="description_other"
                helperText="description" :value="$data['description_other']" />

            {{-- Type --}}
            <x-form.simple_select title="article.type" name="type" id="type" :required="true"
                >
                @foreach (App\Enums\ArticleType::cases() as $type)
                    <option value="{{ $type->value }}" @if ($type->value == $data['type']) selected @endif>
                        {{ $type->name }}
                    </option>
                @endforeach
            </x-form.simple_select>
            {{-- Type --}}

            <input type="hidden" id="model_links" value="{{ json_encode($data['link']) }}" />
            <x-file.simple_file title="article.link" name="link" id="link" />
            <p id="indicator" class="text-sm"></p>
            <x-form.submit :operate="__('messages.update')" :cancel="__('messages.cancel')" url="articles.index" />
        </form>
    </x-form.layout>
    @vite(['resources/js/admin/articleupdate.js', 'resources/js/common/maxFileSize.js', 'resources/js/tag/tagPreview.js'])
</x-master-layout>
