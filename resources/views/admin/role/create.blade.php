<x-master-layout name="Role" headerName="{{ __('sidebar.role') }}">
    <x-form.layout>
        <form action="{{ route('roles.store') }}" method="post">
            @csrf
            <x-form.input_group title="role.role_name" name="name" id="name" :required="true" />
            <div class="mb-4">
                <h1 class="font-bold">{{ __('user.all_permissions') }}</h1>
                <x-form.error field="permissions" />
            </div>
            <div class="grid grid-cols-2 mb-4 gap-2">
                @foreach($getAllPermissions as $keyName=>$permissions)
                    <div class="col-span-2 lg:col-span-1 border-b lg:border border-gray-400 rounded-md p-4">
                        {{-- Start Role --}}
                        <div class="flex items-center mb-4">
                            <input id="permission_{{$keyName}}" type="checkbox" value="{{$keyName}}" 
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 role-title">
                            <label for="permission_{{$keyName}}" class="ms-2 text-md font-bold text-gray-900 dark:text-gray-300 capitalize cursor-pointer select-none">{{ $keyName }}</label>
                        </div>
                        {{-- End Role --}}

                        {{-- Start Permissions --}}
                        <div class="flex flex-col">
                            @foreach($permissions as $permission)
                                <div class="flex items-center mb-4 text-sm">
                                    <input id="p_{{$permission['id']}}" type="checkbox" name="p_{{$permission['id']}}" 
                                        @if(old("p_".$permission['id'])) checked @endif value="{{$keyName}}"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 {{ $keyName }}_p permission-title">
                                    <label for="p_{{$permission['id']}}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 capitalize cursor-pointer">{{ $permission['name'] }}</label>
                                </div>
                            @endforeach
                        </div>
                        {{-- End Permissions --}}
                    </div>
                @endforeach
            </div>
            <x-form.submit :operate="__('messages.save')" :cancel="__('messages.cancel')" url="roles.index" />
        </form>
        @vite(['resources/js/common/rolePermission.js'])
    </x-form.layout>
</x-master-layout>
