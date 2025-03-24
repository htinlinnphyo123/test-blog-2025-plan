<x-master-layout name="SponsorAd" headerName="{{ __('sidebar.sponsorAd') }}">
    <x-form.layout>
        <form action="{{ route('sponsorAds.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-form.grid>
                <input type="hidden" id="presignedLink" value="{{ json_encode($presignedLink[0]) }}" />
                <input type="hidden" name="uploaded_video" id="uploaded_video" />
                {{-- Image --}}
                <x-file.simple_img_upload title="sponsorAd.ad_photo" name="thumbnail_image" id="thumbnail-image"
                    photoId="thumbnail-image-pic" />
                <br>
                {{-- Image --}}
                {{-- Video --}}
                <x-file.simple_video_upload title="sponsorAd.uploaded_video" name="input_video" id="input_video"
                    videoId="input_video" />
                {{-- Video --}}
                <x-form.input_group title="sponsorAd.name" name="name" id="name" :required="true" />
                <x-form.input_group title="sponsorAd.description" name="description" id="description"
                    :required="true" />
                <x-form.input_group type="date" title="sponsorAd.start_date" name="start_date" id="start_date"
                    :required="true" />
                <x-form.input_group type="date" title="sponsorAd.end_date" name="end_date" id="end_date"
                    :required="true" />
                <x-form.input_group title="sponsorAd.link" type="url" name="link" id="link" />
                {{-- Status --}}
                <x-form.select_group title="sponsorAd.status" name="status">
                    <x-form.option title="Active" value="1" field="status" />
                    <x-form.option title="Inactive" value="0" field="status" />
                </x-form.select_group>
                {{-- Status --}}
                {{-- Platform --}}
                <x-form.simple_select title="sponsorAd.platform" name="platform" id="platform" helperText="platform" :required="true" >
                    @foreach (App\Enums\Platform::cases() as $platform)
                        <option value="{{ $platform->name }}">
                            {{ $platform->value }}
                        </option>
                    @endforeach
                </x-form.simple_select>

                {{-- Platform --}}
                <div class="selectplatform">
                    <div id="platform-container" class="{{ old('platform') != 'Mobile' ? 'hidden' : '' }}">
                        {{-- Position --}}
                        <x-form.simple_select title="sponsorAd.position" name="position" id="position"
                            :required="true">
                            @foreach (App\Enums\SponsorAdPosition::cases() as $position)
                                <option value="{{ $position->name }}">
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
                                <option value="{{ $size->value }}">
                                    {{ $size->name }}
                                </option>
                            @endforeach
                        </x-form.simple_select>
                        {{-- Size --}}
                    </div>
                </div>
            </x-form.grid>
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="sponsorAds.index" />
        </form>
    </x-form.layout>
    @vite(['resources/js/common/maxFileSize.js', 'resources/js/common/customVideoUploadHandler.js', 'resources/js/admin/sponsorAdcreate.js'])
</x-master-layout>
