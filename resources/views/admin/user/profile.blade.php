<x-master-layout name="User" headerName="{{ __('sidebar.user') }}">
    <x-form.layout>
        <x-common.url_back_button />
        <br><br>

        {{-- Avatar Img --}}
        <x-show.user_profile_photo :src="$data['profile_photo']" width="w-11" height="h-11" :name="$data['name']" :email="$data['email']" :role="$data['role']" />
        <br>
        {{-- Avatar Img --}}
        <x-show.grid :isBackground='true'>

            {{-- Name --}}
            <x-show.text_group title="user.name" :data="$data['name']" />
            {{-- Name --}}

            {{-- Name Other --}}
            <x-show.text_group title="user.name_other" :data="$data['name_other']" />
            {{-- Name Other --}}

            {{-- Email --}}
            <x-show.text_group title="user.email" :data="$data['email']" />
            {{-- Email --}}

            {{-- Phone Number --}}
            <x-show.text_group title="user.phone" :data="$data['phone']" />
            {{-- Phone Number --}}

            {{-- Country --}}
            <x-show.text_group title="user.country" :data="$data['country']" />
            {{-- Country --}}

            {{-- Role --}}
            <x-show.text_group title="user.role" :data="$data['role']" />
            {{-- Role --}}

            {{-- ID Number --}}
            <x-show.text_group title="user.id_number" :data="$data['id_number']" />
            {{-- ID Number --}}

            {{-- Date of Birth --}}
            <x-show.text_group title="user.date_of_birth" :data="$data['date_of_birth']" />
            {{-- Date of Birth --}}

            {{-- Father Name --}}
            <x-show.text_group title="user.father_name" :data="$data['father_name']" />
            {{-- Father Name --}}

            {{-- Father Name Other --}}
            <x-show.text_group title="user.father_name_other" :data="$data['father_name_other']" />
            {{-- Father Name Other --}}

            {{-- Gender --}}
            <x-show.text_group title="user.gender" :data="$data['gender']" />
            {{-- Gender --}}

            {{-- Martial Status --}}
            <x-show.text_group title="user.martial_status" :data="$data['martial_status']" />
            {{-- Martial Status --}}

            {{-- Occupation --}}
            <x-show.text_group title="user.occupation" :data="$data['occupation']" />
            {{-- Occupation --}}

        </x-show.grid>
    </x-form.layout>
</x-master-layout>
