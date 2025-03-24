<x-master-layout name="SponsorAd" headerName="{{ __('sidebar.sponsorAd') }}">
    <x-form.layout>
        <form action="{{ route('sponsorAds.update', $data['sponsorAd']['id']) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form.grid>
                {{-- Photo --}}
                <x-file.simple_img_upload title="sponsorAd.ad_photo" name="thumbnail_image" id="thumbnail-image"
                    photoId="thumbnail-image-pic" imageSrc="{{ $data['sponsorAd']['thumbnail_image'] }}" />
                <br>
                {{-- Photo --}}
                <x-form.input_group title="sponsorAd.name" name="name" id="name" :value="$data['sponsorAd']['name']"
                    :required="true" />
                <x-form.input_group title="sponsorAd.description" name="description" id="description"
                    :value="$data['sponsorAd']['description']" />

                {{-- Video --}}
                <input type="hidden" id="presignedLink" value="{{ json_encode($data['presignedLinked'][0]) }}" />
                <input type="hidden" name="uploaded_video" id="uploaded_video"
                    value="{{ $data['sponsorAd']['org_uploaded_video'] }}" />
                <x-file.simple_video_upload title="sponsorAd.uploaded_video" name="input_video" id="input_video"
                    videoId="input_video" :videoSrc="$data['sponsorAd']['uploaded_video']" />
                {{-- Video --}}
                <x-form.input_group type="date" title="sponsorAd.start_date" name="start_date" id="start_date"
                    :value="$data['sponsorAd']['start_date']" :required="true" />
                <x-form.input_group type="date" title="sponsorAd.end_date" name="end_date" id="end_date"
                    :value="$data['sponsorAd']['end_date']" :required="true" />
                <x-form.input_group title="sponsorAd.link" name="link" id="link" :value="$data['sponsorAd']['link']" />
                {{-- Status --}}
                <x-form.select_group title="sponsorAd.status" name="status">
                    <x-form.option title="Active" value="1" field="status" />
                    <x-form.option title="Inactive" value="0" field="status" />
                </x-form.select_group>
                {{-- Status --}}
                {{-- Platform --}}
                <x-form.simple_select title="sponsorAd.platform" name="platform" id="platform" helperText="platform" :required="true">
                    @foreach (App\Enums\Platform::cases() as $platform)
                        <option value="{{ $platform->value }}" @if ($platform->value == $data['sponsorAd']['platform']) selected @endif>
                            {{ $platform->name }}
                        </option>
                    @endforeach
                </x-form.simple_select>

                {{-- Platform --}}
                <div class="selectplatform">
                    <div id="platform-container"
                        class="{{ $data['sponsorAd']['platform'] == 'Mobile' ? 'hidden' : '' }}">
                        {{-- Position --}}
                <x-form.simple_select title="sponsorAd.position" name="position" id="position" :required="true">
                    @foreach (App\Enums\SponsorAdPosition::cases() as $position)
                        <option value="{{ $position->name }}" @if ($position->value == $data['sponsorAd']['position']) selected @endif>
                            {{ $position->value }}
                        </option>
                    @endforeach
                    <x-slot:ajaxError>
                        <p id="title_error" class="text-sm text-red-700 hidden">
                            {{ __('sponsorAd.position_validation') }}
                        </p>
                    </x-slot:ajaxError>
                </x-form.simple_select>
                {{-- Position --}}
                {{-- Size --}}
                <x-form.simple_select title="sponsorAd.size" name="size" id="size" :required="true">
                    @foreach (App\Enums\SponsorAdSize::cases() as $size)
                        <option value="{{ $size->value }}" @if ($size->value == $data['sponsorAd']['size']) selected @endif>
                            {{ $size->name }}
                        </option>
                    @endforeach
                </x-form.simple_select>
                {{-- Size --}}
                    </div>
                </div>
            </x-form.grid>
            <x-form.submit :operate="__('messages.update')" :cancel="__('messages.cancel')" url="sponsorAds.index" />
        </form>
    </x-form.layout>
    @vite(['resources/js/common/maxFileSize.js', 'resources/js/common/customVideoUploadHandler.js', 'resources/js/admin/sponsorAdedit.js'])
</x-master-layout>
