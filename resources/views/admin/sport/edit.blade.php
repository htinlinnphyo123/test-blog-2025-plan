<x-master-layout name="Sport" headerName="{{ __('sidebar.sport') }}">
    <x-form.layout>
        <form action="{{ route('sports.update', $data['id']) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form.grid>
                <x-form.input_group title="sport.name" name="name" id="name" :required="true" :value="$data['name']" />
                <x-form.input_group title="sport.slug" name="slug" id="slug" :required="true" :value="$data['slug']"/>
                <x-form.input_group title="sport.description" name="description" id="description" :required="true" :value="$data['description']" />
                <x-file.simple_img_upload title="article.image" name="image" id="image"
                    photoId="image_pic" :imageSrc="$data['image']"/>
                <x-form.single_select title="sport.status" name="status" id="status">
                    <option value="1">Live</option>
                    <option value="2">Highlighte</option>
                </x-form.single_select>
                <x-form.date_picker title="sport.date" name="date" id="date" :value="$data['date']"/>
                <x-form.time_picker title="sport.time" name="time" id="time" :value="$data['time']" />
                <x-form.input_group title="sport.link" name="link" id="link" :required="true" :value="$data['link']" />
            </x-form.grid>
            <x-form.submit :operate="__('messages.update')" :cancel="__('messages.cancel')" url="sports.index" />
        </form>
    </x-form.layout>
    @vite(['resources/js/common/maxFileSize.js'])

</x-master-layout>
