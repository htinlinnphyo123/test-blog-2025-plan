<x-master-layout name="SponsorAd" headerName="{{ __('sidebar.sponsorAd') }}">
    <x-form.layout>
        <x-common.url_back_button />
        <br><br>
        <x-show.grid :isBackground='true'>
            <x-show.media title="sponsorAd.ad_photo" type="photo" :links="[$data['thumbnail_image']]" />
            <br>
            {{-- Video --}}
            <x-show.media title="sponsorAd.uploaded_video" type="video" :links="[$data['uploaded_video']]" />
            {{-- Video --}}
            <x-show.text_group title="sponsorAd.name" :data="$data['name']" />
            <x-show.text_group title="sponsorAd.description" :data="$data['description']" />
            <x-show.text_group title="sponsorAd.link" :data="$data['link']" />
            <x-show.text_group title="sponsorAd.start_date" :data="$data['start_date']" />
            <x-show.text_group title="sponsorAd.end_date" :data="$data['end_date']" />
            <x-show.text_group title="sponsorAd.platform" :data="$data['platform']" />
            @if ($data['platform'] === 'Web')
                <x-show.text_group title="sponsorAd.position" :data="$data['position']" />
                <x-show.text_group title="sponsorAd.size" :data="$data['size']" />
            @endif
            {{-- <x-show.text_group title="sponsorAd.position" :data="$data['position']" /> --}}
            {{-- <x-show.text_group title="sponsorAd.size" :data="$data['size']" /> --}}
            <x-show.text_group title="sponsorAd.countSponsorrate" :data="$data['countSponsorrate']" />
        </x-show.grid>
    </x-form.layout>
</x-master-layout>
