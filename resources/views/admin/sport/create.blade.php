<x-master-layout name="Sport" headerName="{{ __('sidebar.sport') }}">
    <x-form.layout>
        <form action="{{ route('sports.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-form.grid>
                <x-form.input_group title="sport.name" name="name" id="name" :required="true" />
                <x-form.input_group title="sport.slug" name="slug" id="slug" :required="true" />
                <x-form.input_group title="sport.description" name="description" id="description" :required="true" />
                <x-file.simple_img_upload title="article.image" name="image" id="image"
                    photoId="image_pic" />
                <x-form.single_select title="sport.status" name="status" id="status">
                    <option value="1">Live</option>
                    <option value="2">Highlight</option>
                </x-form.single_select>
                <x-form.date_picker title="sport.date" name="date" id="date"/>
                <x-form.time_picker title="sport.time" name="time" id="time" />
                <x-form.input_group title="sport.link" name="link" id="link" :required="true" />
            </x-form.grid>
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="sports.index" />
        </form>
    </x-form.layout>
    @vite(['resources/js/common/maxFileSize.js'])
</x-master-layout>
