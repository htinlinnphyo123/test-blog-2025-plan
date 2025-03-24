<style>
    /* HTML: <div class="loader"></div> */
    .loader-lang {
        width: 40px;
        padding: 5px;
        aspect-ratio: 1;
        border-radius: 50%;
        background: #3a4443;
        --_m:
            conic-gradient(#0000 10%, #000),
            linear-gradient(#000 0 0) content-box;
        -webkit-mask: var(--_m);
        mask: var(--_m);
        -webkit-mask-composite: source-out;
        mask-composite: subtract;
        animation: l3 1s infinite linear;
    }

    @keyframes l3 {
        to {
            transform: rotate(1turn)
        }
    }
</style>

<div class="w-full flex justify-between items-center hidden" id="lang-div">
    <p class="text-gray-900 dark:text-white  dark:rounded-none">Language</p>
    <select
        data-hs-select='{
        "placeholder": "",
        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-1 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
        "dropdownClasses": "mt-2 max-h-72 p-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
        "optionClasses": "py-2 px-3 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
        "optionTemplate": "<div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div><div class=\"hs-selected:font-semibold text-sm text-gray-800 dark:text-neutral-200 \" data-title></div></div><div class=\"ms-auto\"><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-4 text-blue-600\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg></span></div></div>",
        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
        }'
        class="changeLang">
        {{-- <option value="">Choose</option> --}}
        <option {{ session()->get('locale') == 'en' ? 'selected' : '' }} value="en"
            data-hs-select-option='{
    "icon": "<img class=\" size-6 rounded-md\" src=\"https://upload.wikimedia.org/wikipedia/en/a/ae/Flag_of_the_United_Kingdom.svg\" alt=\"English\" />"}'>
            English
        </option>
        <option {{ session()->get('locale') == 'mm' ? 'selected' : '' }} value="mm"
            data-hs-select-option='{
    "icon": "<img class=\"size-6 rounded-md\" src=\"https://upload.wikimedia.org/wikipedia/commons/8/8c/Flag_of_Myanmar.svg\" alt=\"Myanmar\" />"}'>
            Myanmar
        </option>
        <!-- <option {{ session()->get('locale') == 'km' ? 'selected' : '' }} value="km"
            data-hs-select-option='{
    "icon": "<img class=\"size-6 rounded-md\" src=\"https://upload.wikimedia.org/wikipedia/commons/8/83/Flag_of_Cambodia.svg\" alt=\"Cambodia\" />"}'>
            Cambodia
        </option> -->
    </select>
    <!-- End Select -->
</div>
<div class="loader-lang"></div>

<script>
    var url = "{{ route('changeLang') }}";
    var changeLang = document.querySelector('.changeLang');
    const langDiv = document.querySelector("#lang-div");
    const loaderDiv = document.querySelector(".loader-lang");
    changeLang.addEventListener("change", function() {

        loaderDiv.classList.remove("hidden");
        langDiv.classList.add("hidden");
        window.location.href = url + "?lang=" + this.value;
    });

    document.addEventListener("DOMContentLoaded", () => {
        setTimeout(() => {
            loaderDiv.classList.add("hidden");
            langDiv.classList.remove("hidden");
        }, 300);
    });
</script>
