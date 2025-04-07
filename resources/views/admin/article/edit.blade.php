<x-master-layout name="Article" headerName="{{ __('sidebar.article') }}">
    <input type="hidden" id="current-date" value="{{ \Carbon\Carbon::now()->format('m/d/Y') }}" />
    <input type="hidden" id="current-time" value="{{ \Carbon\Carbon::now()->format('H:i') }}" />
    <x-form.layout>
        <form id="editForm" action="{{ route('articles.update', $data['id']) }}" method="post" enctype="multipart/form-data">
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

                {{-- Category --}}
                <x-form.simple_select title="article.category" name="category_id" id="category_id" :required="true">
                    @foreach (BasicDashboard\Foundations\Domain\Categories\Category::select(['id','name'])->get() as $c)
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

                {{-- Thumbnail --}}
                <x-file.simple_img_upload title="article.thumbnail" name="thumbnail" id="thumbnail"
                    photoId="thumbnail_pic" :imageSrc="$data['thumbnail']" />
                {{-- Thumbnail --}}
            </x-form.grid>
            {{-- Date Published --}}

            <x-form.quill_editor title="article.description" name="description" id="description"
                helperText="description" :value="$data['description']" />

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
