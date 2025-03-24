<x-master-layout name="Notification" headerName="{{ __('sidebar.notification') }}">
    <x-form.layout>
        <form id="noti-create" action="{{ route('notifications.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-form.grid>
                <input type="hidden" id="presignedLink" value="{{ json_encode($presignedLink[0]) }}" />
                <input type="hidden" name="uploaded_video" id="uploaded_video" />
                <x-form.input_group title="notification.noti_title" name="title" id="title" :required="true" />
                <x-form.input_group title="notification.noti_body" name="body" id="body" :required="true" />
                <x-file.simple_video_upload title="notification.uploaded_video" name="input_video" id="input_video" videoId="input_video" />
                <x-file.simple_img_upload title="notification.uploaded_photo" name="uploaded_photo" id="uploaded_photo" photoId="uploaded_photo_pic" />
                <x-form.simple_select title="notification.sending_method" name="sending_method" id="sending_method" :required="true">
                    <option value="Schedule" {{ old('sending_method')=='Schedule' ? 'selected' : '' }}>{{ __('notification.Schedule') }}</option>
                    <option value="Manual" {{ old('sending_method')=='Manual' ? 'selected' : '' }}>{{ __('notification.manual') }}</option>
                </x-form.simple_select>
                <div class="py-2">
                    <div id="schedule-container" class="{{ old('sending_method')!='Schedule' ? 'hidden' : '' }}">
                        <x-form.label for="sending_interval" title="notification.sending_frequency"/>
                        <div class="relative">
                            <input type="number" id="sending_interval" name="sending_interval" 
                                class="py-3 px-2 pe-20 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="0" min="0" step="1" value="{{ old('sending_interval') ?? '0' }}">
                            <div class="absolute inset-y-0 end-0 flex items-center text-gray-500 pe-px border-l-2">
                                <label for="sending_frequency" class="sr-only">{{ __('notification.sending_frequency') }}</label>
                                <select id="sending_frequency" name="sending_frequency" 
                                    class="block w-full border-transparent focus:ring-blue-600 focus:border-blue-600 dark:text-neutral-500 dark:bg-neutral-800">
                                    @foreach (\App\Enums\SendingFrequency::cases() as $type)
                                        <option value="{{ $type->value }}">
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </x-form.grid>
            <p id="video-alert" class="text-red-400 italic hidden">
                Please upload video before submitting form.
            </p>
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="notifications.index" />
        </form>
    </x-form.layout>
    @vite([
    'resources/js/admin/notificationcreate.js',
    'resources/js/common/maxFileSize.js',
    'resources/js/common/customVideoUploadHandler.js',
    'resources/js/admin/notificationfrequencytoggler.js'
    ])
</x-master-layout>