<x-master-layout name="User" headerName="{{ __('sidebar.user') }}">
    @vite('resources/css/multipleSelectCreate.css')
    <x-form.layout>
        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data" id="user-create-form">
            @csrf
            <x-form.grid>
                {{-- Avatar Img --}}
                <x-file.simple_img_upload title="user.avatar_pic" name="profile_photo" id="profile-photo"
                    photoId="profile-photo-pic" />
                {{-- Avatar Img --}}
                <br>
                {{-- Name --}}
                <x-form.input_group title="user.username" name="name" id="name" :required="true"
                    placeholder="username" />
                {{-- Name --}}
                {{-- Name Other --}}
                <x-form.input_group title="user.username_other" name="name_other" id="name_other"
                    placeholder="username_other" />
                {{-- Name Other --}}
                {{-- Email --}}
                <x-form.input_group title="user.email" name="email" id="email" :required="true"
                    placeholder="email" />
                {{-- Email --}}
                {{-- Phone Number --}}
                <x-form.input_group title="user.phone" name="phone" id="phone" />
                {{-- Phone Number --}}
                {{-- Password --}}
                <x-form.input_group title="user.password" type="password" name="password" id="password"
                    :playEye="true" :required="true" />
                {{-- Password --}}

                {{-- Country Multi Select --}}
                {{-- <x-form.multi_select title="user.country" name="country_id[]">
                    @foreach ($viewCountries as $c)
                        <option value="{{ $c['id'] }}">
                            {{ $c['name'] }}
                        </option>
                    @endforeach
                </x-form.multi_select> --}}
                {{-- Country Multi Select --}}

                {{-- Country Single Select --}}
                <x-form.single_select title="user.country" name="country_id" :required="true">
                    @foreach ($viewCountries as $c)
                        <option value="{{ $c['id'] }}">
                            {{ $c['name'] }}
                        </option>
                    @endforeach
                </x-form.single_select>
                {{-- Country Single Select --}}

                {{-- Role Single Select --}}
                <x-form.single_select title="user.role" name="role_id" :required="true">
                    @foreach ($viewRoles as $r)
                        <option value="{{ $r['id'] }}">
                            {{ $r['name'] }}
                        </option>
                    @endforeach
                </x-form.single_select>
                {{-- Role Single Select --}}

                {{-- ID number --}}
                <x-form.input_group title="user.id_number" name="id_number" id="id_number" />
                {{-- ID number --}}

                {{-- Date of Birth --}}
                <x-form.input_group type="date" title="user.date_of_birth" name="date_of_birth" id="date_of_birth" />
                {{-- Date of Birth --}}

                {{-- Father Name --}}
                <x-form.input_group title="user.father_name" name="father_name" id="father_name" />
                {{-- Father Name --}}

                {{-- Father Name Other --}}
                <x-form.input_group title="user.father_name_other" name="father_name_other" id="father_name_other" />
                {{-- Father Name Other --}}

                {{-- Gender --}}
                <x-form.single_select title="user.gender" name="gender">
                    <option value="Male">{{ __('user.male') }}</option>
                    <option value="Female">{{ __('user.female') }}</option>
                </x-form.single_select>
                {{-- Gender --}}

                {{-- Martial Status --}}
                <x-form.single_select title="user.martial_status" name="martial_status">
                    <option value="Single">{{ __('user.single') }}</option>
                    <option value="Married">{{ __('user.married') }}</option>
                    <option value="Divorced">{{ __('user.divorced') }}</option>
                    <option value="Widowed">{{ __('user.widowed') }}</option>
                </x-form.single_select>
                {{-- Martial Status --}}

                {{-- Occupation --}}
                <x-form.input_group title="user.occupation" name="occupation" id="occupation" />
                {{-- Occupation --}}

                {{-- Status --}}
                <x-form.select_group title="user.status" name="status">
                    <x-form.option title="Active" value="1" field="status" />
                    <x-form.option title="Inactive" value="0" field="status" />
                </x-form.select_group>
                {{-- Status --}}
            </x-form.grid>
            {{-- Save And Cancel --}}
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="users.index" />
            {{-- Save And Cancel --}}
        </form>
    </x-form.layout>
    @vite(['resources/js/common/loginEyes.js', 'resources/js/common/maxFileSize.js'])
</x-master-layout>
