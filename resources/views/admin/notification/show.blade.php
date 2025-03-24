<x-master-layout name="Notification" headerName="{{ __('sidebar.notification') }}">
    <x-form.layout>
        <x-common.url_back_button />
        <br><br>
        <x-show.notification_image title="Notification Image" :src="$data['uploaded_photo']" width="w-20" height="h-20" />
        <br>
        <x-show.grid :isBackground='true'>
            <x-show.text_group title="notification.noti_title" :data="$data['title']" />
            <x-show.text_group title="notification.noti_body" :data="$data['body']" />
            <x-show.media title="notification.video" type="video" :links="[$data['uploaded_video']]" />
            <x-show.media title="notification.photo" type="photo" :links="[$data['uploaded_photo']]" />
            <x-show.text_group title="notification.sending_method" :data="$data['sending_method']" />
            <x-show.text_group title="notification.sending_frequency" :data="$data['sending_frequency']" />
            <x-show.text_group title="notification.sending_interval" :data="$data['sending_interval']" />
        </x-show.grid>
    </x-form.layout>
    {{-- <x-form.layout>
        <form action="{{ route('sendNoti', $data['id']) }}" method="post">
            @csrf
            <x-form.grid>
                <x-form.simple_select title="notification.country" name="country" id="country" :required="true">
                    <option value="All">All</option>
                    @foreach ($viewCountries as $c)
                        <option value="{{ $c['name'] }}">
                            {{ $c['name'] }}
                        </option>
                    @endforeach
                </x-form.simple_select>
            </x-form.grid>
            <button type="submit"
                class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Send</button>
        </form>
    </x-form.layout> --}}
</x-master-layout>
