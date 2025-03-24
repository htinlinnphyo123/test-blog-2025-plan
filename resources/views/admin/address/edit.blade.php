<x-master-layout name="Address" headerName="{{ __('sidebar.address') }}">
    <x-form.layout>
        <form action="{{ route('addresses.update', $data['id']) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data['id'] }}">
            <x-form.grid>
                <x-form.input_group title="address.level1_code" name="level1_code" id="level1_code" :value="$data['level1_code']" :required="true" />
                <x-form.input_group title="address.level1_name" name="level1_name" id="level1_name" :value="$data['level1_name']" :required="true" />
                <x-form.input_group title="address.level2_code" name="level2_code" id="level2_code" :value="$data['level2_code']" :required="true" />
                <x-form.input_group title="address.level2_name" name="level2_name" id="level2_name" :value="$data['level2_name']" :required="true" />
                <x-form.input_group title="address.level3_code" name="level3_code" id="level3_code" :value="$data['level3_code']" :required="true" />
                <x-form.input_group title="address.level3_name" name="level3_name" id="level3_name" :value="$data['level3_name']" :required="true" />
                <x-form.input_group title="address.level4_code" name="level4_code" id="level4_code" :value="$data['level4_code']" :required="true" />
                <x-form.input_group title="address.level4_name" name="level4_name" id="level4_name" :value="$data['level4_name']" :required="true" />
                {{-- <x-form.input_group title="address.level5_code" name="level5_code" id="level5_code" :value="$data['level5_code']"  />
                <x-form.input_group title="address.level5_name" name="level5_name" id="level5_name" :value="$data['level5_name']"  />
                <x-form.input_group title="address.level6_code" name="level6_code" id="level6_code" :value="$data['level6_code']"  />
                <x-form.input_group title="address.level6_name" name="level6_name" id="level6_name" :value="$data['level6_name']"  />
                <x-form.input_group title="address.level7_code" name="level7_code" id="level7_code" :value="$data['level7_code']"  />
                <x-form.input_group title="address.level7_name" name="level7_name" id="level7_name" :value="$data['level7_name']"  /> --}}
                {{-- Country Single Select --}}
                <x-form.single_select title="address.country" name="country_id">
                    @foreach ($viewCountries as $c)
                        <option value="{{ $c['id'] }}" @if ($c['id'] == $data['country_id']) selected @endif>
                            {{ $c['name'] }}
                        </option>
                    @endforeach
                </x-form.single_select>
                {{-- Country Single Select --}}
            </x-form.grid>
            <x-form.submit :operate="__('messages.update')" :cancel="__('messages.cancel')" url="addresses.index" />
        </form>
    </x-form.layout>
    @vite('resources/js/common/loginEyes.js')
</x-master-layout>



