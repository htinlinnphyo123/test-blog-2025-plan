<x-master-layout name="Article" headerName="{{ __('sidebar.article') }}">
    <x-form.layout>
        <form id="article-submit" action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-form.grid>
                {{-- Title --}}
                <x-form.input_group title="article.title" name="title" id="title" :required="true"
                    placeholder="article_title">
                </x-form.input_group>
                {{-- Title --}}

                {{-- Category --}}
                <x-form.simple_select title="article.category" name="category_id" id="category_id" :required="true">
                    @foreach ($viewCategories as $c)
                        <option value="{{ $c['id'] }}">
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

                <x-form.simple_select title="article.subcategory" name="subcategory_id" id="subcategory_id">
                    @foreach ($viewSubcategories as $c)
                        <option value="{{ $c['id'] }}">
                            {{ $c['name'] }}
                        </option>
                    @endforeach
                </x-form.simple_select>
                {{-- SubCategory --}}

                {{-- Thumbnail --}}
                <x-file.simple_img_upload title="article.thumbnail" name="thumbnail" id="thumbnail"
                    photoId="thumbnail_pic" />
                {{-- Thumbnail --}}
            </x-form.grid>

            <x-form.quill_editor title="article.description" name="description" id="description"
                helperText="description" />

            {{-- Type --}}
            <x-form.simple_select title="article.type" name="type" id="type" :required="true">
                @foreach (App\Enums\ArticleType::cases() as $type)
                    <option value="{{ $type->value }}">
                        {{ $type->name }}
                    </option>
                @endforeach
            </x-form.simple_select>

            <x-file.simple_file title="article.link" name="link" id="link" />
            <p id="indicator" class="text-sm"></p>
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="articles.index" />
        </form>
    </x-form.layout>
    @vite(['resources/js/admin/articlecreate.js', 'resources/js/common/maxFileSize.js', 'resources/js/tag/tagPreview.js'])
</x-master-layout>
