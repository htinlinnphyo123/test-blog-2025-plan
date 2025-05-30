<div id="hs-file-upload-with-limited-file-size" data-hs-file-upload='{
  "url": "/upload",
  "maxFilesize": "{{ config('numbers.max_upload_for_single_img') }}",
  "acceptedFiles": "image/*",
  "maxFiles": 1,
  "extensions": {
    "default": {
      "class": "shrink-0 size-5"
    },
    "xls": {
      "class": "shrink-0 size-5"
    },
    "zip": {
      "class": "shrink-0 size-5"
    },
    "csv": {
      "icon": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4\"/><path d=\"M14 2v4a2 2 0 0 0 2 2h4\"/><path d=\"m5 12-3 3 3 3\"/><path d=\"m9 18 3-3-3-3\"/></svg>",
      "class": "shrink-0 size-5"
    }
  }
}'>
  <template data-hs-file-upload-preview="">
    <div class="p-3 bg-white border border-solid border-gray-300 rounded-xl dark:bg-neutral-800 dark:border-neutral-600">
      <div class="mb-1 flex justify-between items-center">
        <div class="flex items-center gap-x-3">
          <span class="size-10 flex justify-center items-center border border-gray-200 text-gray-500 rounded-lg dark:border-neutral-700 dark:text-neutral-500" data-hs-file-upload-file-icon="">
            <img class="rounded-lg hidden" data-dz-thumbnail="">
          </span>
          <div>
            <p class="text-sm font-medium text-gray-800 dark:text-white">
              <span class="truncate inline-block max-w-[300px] align-bottom" data-hs-file-upload-file-name=""></span>.<span data-hs-file-upload-file-ext=""></span>
            </p>
            <p class="text-xs text-gray-500 dark:text-neutral-500" data-hs-file-upload-file-size="" data-hs-file-upload-file-success=""></p>
            <p class="text-xs text-red-500" style="display: none;" data-hs-file-upload-file-error="">File exceeds size limit.</p>
          </div>
        </div>
        <div class="flex items-center gap-x-2">
          <span class="hs-tooltip [--placement:top] inline-block" style="display: none;" data-hs-file-upload-file-error="">
            <span class="hs-tooltip-toggle text-red-500 hover:text-red-800 focus:outline-none focus:text-red-800 dark:text-red-500 dark:hover:text-red-200 dark:focus:text-red-200">
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" x2="12" y1="8" y2="12"></line>
                <line x1="12" x2="12.01" y1="16" y2="16"></line>
              </svg>
              <span class="hs-tooltip-content max-w-[100px] hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                Please try to upload a file smaller than 1MB.
              </span>
            </span>
          </span>
          <button type="button" class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200" data-hs-file-upload-reload="">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"></path>
              <path d="M21 3v5h-5"></path>
            </svg>
          </button>
          <button type="button" class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200" data-hs-file-upload-remove="">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M3 6h18"></path>
              <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
              <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
              <line x1="10" x2="10" y1="11" y2="17"></line>
              <line x1="14" x2="14" y1="11" y2="17"></line>
            </svg>
          </button>
        </div>
      </div>

      <div class="flex items-center gap-x-3 whitespace-nowrap">
        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-hs-file-upload-progress-bar="">
          <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition-all duration-500 hs-file-upload-complete:bg-green-500" style="width: 0" data-hs-file-upload-progress-bar-pane=""></div>
        </div>
        <div class="w-10 text-end">
          <span class="text-sm text-gray-800 dark:text-white">
            <span data-hs-file-upload-progress-bar-value="">0</span>%
          </span>
        </div>
      </div>
    </div>
  </template>

  <div class="cursor-pointer p-12 flex justify-center bg-white border border-dashed border-gray-300 rounded-xl dark:bg-neutral-800 dark:border-neutral-600" data-hs-file-upload-trigger="">
    <div class="text-center">
      <span class="inline-flex justify-center items-center size-16 bg-gray-100 text-gray-800 rounded-full dark:bg-neutral-700 dark:text-neutral-200">
        <svg class="shrink-0 size-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
          <polyline points="17 8 12 3 7 8"></polyline>
          <line x1="12" x2="12" y1="3" y2="15"></line>
        </svg>
      </span>

      <div class="mt-4 flex flex-wrap justify-center text-sm leading-6 text-gray-600">
        <span class="pe-1 font-medium text-gray-800 dark:text-neutral-200">
          Drop your file here or
        </span>
        <span class="bg-white font-semibold text-blue-600 hover:text-blue-700 rounded-lg decoration-2 hover:underline focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 dark:bg-neutral-800 dark:text-blue-500 dark:hover:text-blue-600">browse</span>
      </div>

      <p class="mt-1 text-xs text-gray-400 dark:text-neutral-400">
        Pick a file up to 2MB.
      </p>
    </div>
  </div>

  <div class="mt-4 space-y-2 empty:mt-0" data-hs-file-upload-previews=""></div>
</div>