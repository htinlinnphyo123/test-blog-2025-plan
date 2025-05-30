<x-master-layout name="Not Found" headerName="Not Found">
    <main class="h-full overflow-y-auto">
        <div class="container px-1 md:px-6 mx-auto grid">
            <div class="flex justify-center align-middle">
                <img src="{{ asset('/images/401.svg') }}" alt="" class="img-fluid">
            </div>
            <br><br>
            <div class="flex justify-center align-middle">
                <h1 class="text-xl bg-theme text-white p-1 border rounded-md">
                    Page Not Found
                </h1>
            </div>
        </div>
    </main>
    @vite('resources/js/common/deleteConfirm.js')
</x-master-layout>
