<x-master-layout name="Address" headerName="{{ __('sidebar.address') }}">
    <x-form.layout>
        <x-common.url_back_button />
        <br><br>
        <x-show.grid :isBackground='true'>
            {{-- <x-show.text_group title="address.id" :data="$data['id']" /> --}}
            
            <x-show.text_group title="address.level1_code" :data="$data['level1_code']" />
            <x-show.text_group title="address.level1_name" :data="$data['level1_name']" />
            <x-show.text_group title="address.level2_code" :data="$data['level2_code']" />
            <x-show.text_group title="address.level2_name" :data="$data['level2_name']" />
            <x-show.text_group title="address.level3_code" :data="$data['level3_code']" />
            <x-show.text_group title="address.level3_name" :data="$data['level3_name']" />
            <x-show.text_group title="address.level4_code" :data="$data['level4_code']" />
            <x-show.text_group title="address.level4_name" :data="$data['level4_name']" />
            <x-show.text_group title="address.country" :data="$data['country']" />
            {{-- <x-show.text_group title="address.level5_code" :data="$data['level5_code']" />
            <x-show.text_group title="address.level5_name" :data="$data['level5_name']" />
            <x-show.text_group title="address.level6_code" :data="$data['level6_code']" />
            <x-show.text_group title="address.level6_name" :data="$data['level6_name']" />
            <x-show.text_group title="address.level7_code" :data="$data['level7_code']" />
            <x-show.text_group title="address.level7_name" :data="$data['level7_name']" /> --}}
        </x-show.grid>
    </x-form.layout>
    @vite('resources/js/common/loginEyes.js')
</x-master-layout>
