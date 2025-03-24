<x-master-layout name="Notification" headerName="{{ __('sidebar.notification') }}">
    <x-form.layout>
        {{-- @php
                    dd($data);
                @endphp --}}
        <form action="{{ route('notifications.update', $data['notification']['id']) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form.grid>
                {{-- Title --}}
                <x-form.input_group title="notification.noti_title" name="title" id="title" :value="$data['notification']['title']"
                    :required="true" />
                {{-- Title --}}
                {{-- Body --}}
                <x-form.input_group title="notification.noti_body" name="body" id="body" :value="$data['notification']['body']"
                    :required="true" />
                {{-- Body --}}
                {{-- Video --}}
                <input type="hidden" id="presignedLink" value="{{ json_encode($data['presignedLinked'][0]) }}" />
                <input type="hidden" name="uploaded_video" id="uploaded_video" value="{{ $data['notification']['org_uploaded_video'] }}" />
                <x-file.simple_video_upload title="notification.uploaded_video" name="input_video"
                    id="input_video" videoId="input_video" :videoSrc="$data['notification']['uploaded_video']"/>
                {{-- Video --}}
                {{-- Noti Img --}}
                <x-file.simple_img_upload title="notification.uploaded_photo" name="uploaded_photo" id="uploaded_photo"
                    photoId="uploaded_photo-pic" imageSrc="{{ $data['notification']['uploaded_photo'] }}" />
                {{-- Noti Img --}}
                {{-- Method --}}
                <x-form.simple_select title="notification.sending_method" name="sending_method" id="sending_method">
                    <option value="Schedule" @if ($data['notification']['sending_method'] == 'Schedule') selected @endif>
                        Schedule
                    </option>
                    <option value="Manual" @if ($data['notification']['sending_method'] == 'Manual') selected @endif>
                        Manual
                    </option>
                </x-form.simple_select>
                <div class="py-2">
                    <div id="schedule-container" class="{{$data['notification']['sending_method'] == 'Manual' ? 'hidden' : ''}}">
                        <x-form.label for="sending_interval" title="notification.sending_frequency"/>
                        <div class="relative">
                            <input type="number" id="sending_interval" name="sending_interval" 
                                class="py-3 px-2 pe-20 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="0" min="0" step="1" value="{{ $data['notification']['sending_interval'] }}">
                            <div class="absolute inset-y-0 end-0 flex items-center text-gray-500 pe-px border-l-2">
                                <label for="sending_frequency" class="sr-only">{{ __('notification.sending_frequency') }}</label>
                                <select id="sending_frequency" name="sending_frequency" 
                                    class="block w-full border-transparent focus:ring-blue-600 focus:border-blue-600 dark:text-neutral-500 dark:bg-neutral-800">
                                    @foreach (\App\Enums\SendingFrequency::cases() as $type)
                                        <option value="{{ $type->value }}" 
                                            @if ($type->value===$data['notification']['sending_frequency'])
                                                selected
                                            @endif
                                        >
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
            </x-form.grid>
            <x-form.submit :operate="__('messages.update')" :cancel="__('messages.cancel')" url="notifications.index" />
        </form>
    </x-form.layout>
    @vite(['resources/js/common/maxFileSize.js', 'resources/js/admin/notificationedit.js','resources/js/common/customVideoUploadHandler.js','resources/js/admin/sendnotification.js'])
</x-master-layout>
