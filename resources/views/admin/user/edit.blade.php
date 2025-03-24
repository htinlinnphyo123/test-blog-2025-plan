<x-master-layout name="User" headerName="{{ __('sidebar.user') }}">
    <x-form.layout>
        <form action="{{ route('users.update', $data['id']) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data['id'] }}">
            <x-form.grid>
                {{-- Avatar Img --}}
                <x-file.simple_img_upload title="user.avatar_pic" name="profile_photo" id="profile-photo"
                    photoId="profile-photo-pic" imageSrc="{{ $data['profile_photo'] }}" />
                <br>
                {{-- Avatar Img --}}

                {{-- Name --}}
                <x-form.input_group title="user.username" name="name" id="name" :value="$data['name']" :required="true"
                    placeholder="username" />
                {{-- Name --}}

                {{-- Name Other --}}
                <x-form.input_group title="user.username_other" name="name_other" id="name_other" :value="$data['name_other']"
                    placeholder="username_other" />
                {{-- Name Other --}}

                {{-- Email --}}
                <x-form.input_group title="user.email" name="email" id="email" :value="$data['email']" :required="true"
                    placeholder="email" />
                {{-- Email --}}

                {{-- Phone Number --}}
                <x-form.input_group title="user.phone" name="phone" id="phone" :value="$data['phone']"
                    placeholder="phone" />
                {{-- Phone Number --}}

                {{-- Password --}}
                <x-form.input_group title="user.password" type="password" name="password" id="password"
                    :playEye="true" placeholder="password" helperText="password" />
                {{-- Password --}}

                {{-- Country Multi Select --}}
                {{-- <x-form.multi_select title="user.country" name="country_id[]">
                    @foreach ($viewCountries as $c)
                        <option value="{{ $c['id'] }}"
                            @if (isset($data)) {{ in_array($c['id'], $data['country_id']) ? 'selected' : '' }} @endif>
                            {{ $c['name'] }}
                        </option>
                    @endforeach
                </x-form.multi_select> --}}
                {{-- Country Multi Select --}}
                {{-- Country Single Select --}}
                <x-form.single_select title="user.country" name="country_id" :required="true">
                    @foreach ($viewCountries as $c)
                        <option value="{{ $c['id'] }}" @if ($c['id'] == $data['country_id']) selected @endif>
                            {{ $c['name'] }}
                        </option>
                    @endforeach
                </x-form.single_select>
                {{-- Country Single Select --}}

                {{-- Role Single Select --}}
                <x-form.single_select title="user.role" name="role_id">
                    @foreach ($viewRoles as $r)
                        <option value="{{ $r['id'] }}" @if ($r['id'] == $data['role_id']) selected @endif>
                            {{ $r['name'] }}
                        </option>
                    @endforeach
                </x-form.single_select>
                {{-- Role Single Select --}}

                {{-- ID number --}}
                <x-form.input_group title="user.id_number" name="id_number" id="id_number" :value="$data['id_number']"
                    placeholder="id_number" />
                {{-- ID number --}}

                {{-- Date of Birth --}}
                <x-form.input_group type="date" title="user.date_of_birth" name="date_of_birth" id="date_of_birth"
                    :value="$data['date_of_birth']" />
                {{-- Date of Birth --}}

                {{-- Father Name --}}
                <x-form.input_group title="user.father_name" name="father_name" id="father_name" :value="$data['father_name']"
                    placeholder="father_name" />
                {{-- Father Name --}}

                {{-- Father Name Other --}}
                <x-form.input_group title="user.father_name_other" name="father_name_other" id="father_name_other"
                    :value="$data['father_name_other']" placeholder="father_name_other" />
                {{-- Father Name Other --}}

                {{-- Gender --}}
                <x-form.single_select title="user.gender" name="gender">
                        <option value="Male" @if ($data['gender'] == 'Male') selected @endif>
                            {{ 'Male' }}
                        </option>
                        <option value="Female" @if ($data['gender'] == 'Female') selected @endif>
                            {{ 'Female' }}
                        </option>
                </x-form.single_select>
                {{-- Gender --}}

                {{-- Martial Status --}}
                <x-form.single_select title="user.martial_status" name="martial_status">
                        <option value="Single" @if ($data['martial_status'] == 'Single') selected @endif>
                            {{ 'Single' }}
                        </option>
                        <option value="Married" @if ($data['martial_status'] == 'Married') selected @endif>
                            {{ 'Married' }}
                        </option>
                        <option value="Divorced" @if ($data['martial_status'] == 'Divorced') selected @endif>
                            {{ 'Divorced' }}
                        </option>
                        <option value="Widowed" @if ($data['martial_status'] == 'Widowed') selected @endif>
                            {{ 'Widowed' }}
                        </option>
                </x-form.single_select>
                {{-- Martial Status --}}

                {{-- Occupation --}}
                <x-form.input_group title="user.occupation" name="occupation" id="occupation" :value="$data['occupation']"
                    placeholder="occupation" />
                {{-- Occupation --}}

                {{-- Status --}}
                <x-form.select_group title="user.status" name="status">
                    <x-form.option title="Active" value="1" field="status" />
                    <x-form.option title="Inactive" value="0" field="status" />
                </x-form.select_group>
                {{-- Status --}}

            </x-form.grid>
            {{-- Update and Cancel --}}
            <x-form.submit :operate="__('messages.update')" :cancel="__('messages.cancel')" url="users.index" />
            {{-- Update and Cancel --}}
        </form>
    </x-form.layout>

    @vite(['resources/js/common/loginEyes.js', 'resources/js/common/maxFileSize.js'])
</x-master-layout>
