<x-app-layout>
    <style>
        #togglePassword {
            position: relative;
            top: -30px;
            right: -270px;
        }
    </style>
    <x-common.failed_message />
    <br><br><br><br><br>
    <div class="container mx-auto text-center mt-auto">
        <p class="text-5xl text-gray-500 dark:text-white">{{ __('messages.login_title') }}</p>
    </div>
    <br><br>
    <div class="">
        <div class="container justify-center flex items-center max-w-full mx-auto border-gray-600">
            <form action="/login" method="post">
                @csrf
                <div class="w-[20rem] flex flex-col mx-auto">
                    <div class="px-2 flex flex-col pb-4">
                        <x-common.label for="name" :title="__('messages.user_name')" />
                        <x-common.Input type="text" name="name" />
                        @error('name')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class=" px-2 flex flex-col pb-4">
                        <x-common.label for="password" :title="__('messages.password')" />
                        <x-common.Input type="password" name="password" id="password" />
                        <div class="container" id="togglePassword">
                            <svg class="w-5 h-5 cursor-pointer hidden" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="showEyes">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" id="removeEyes">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0
                                    011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59
                                     3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <x-common.button type="submit" :title="__('messages.login_btn')" id="login-button" />
                </div>
            </form>
        </div>
    </div>
    @vite('resources/js/common/loginEyes.js')
</x-app-layout>
