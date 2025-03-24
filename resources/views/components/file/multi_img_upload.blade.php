<style>
.dz-image-preview{
    cursor: pointer;
}
.preview {
    overflow: hidden;
    width: 100px; 
    height: 100px;
}
</style>
<div id="hs-file-upload-with-limited-file-size" data-hs-file-upload='{
  "url": "/no",
  "acceptedFiles": "image/*",
  "maxFilesize":1,
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
    <div class="relative mt-2 p-2 bg-white border border-gray-200 rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
      <img class="mb-2 w-full object-cover rounded-lg" data-dz-thumbnail="">

      <div class="mb-1 flex justify-between items-center gap-x-3 whitespace-nowrap">
        <div class="w-10">
          <span class="text-sm text-gray-800 dark:text-white">
            <span data-hs-file-upload-progress-bar-value="">0</span>%
          </span>
        </div>
        <div class="flex items-center gap-x-2">
          <button type="button" class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200" data-hs-file-upload-remove="">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M3 6h18"></path>
              <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
              <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
              <line x1="10" x2="10" y1="11" y2="17"></line>
              <line x1="14" x2="14" y1="11" y2="17"></line>
            </svg>
          </button>
        </div>
      </div>
      <div class="my-2">
          <p class="text-xs text-red-500" style="display: none;" data-hs-file-upload-file-error="">Please upload file smaller than 2MB.</p>
      </div>

      <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-hs-file-upload-progress-bar="">
        <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition-all duration-500 hs-file-upload-complete:bg-green-500" style="width: 0" data-hs-file-upload-progress-bar-pane=""></div>
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

  <div class="grid grid-cols-4 gap-x-2 empty:gap-0" data-hs-file-upload-previews=""></div>
</div>

<!-- Main modal -->
<div class="hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-[calc(100%-1rem)]
    max-h-full justify-center items-center bg-gray-500/50 crop-container">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Crop Photo
                </h3>
                <button type="button" id="crop-close" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div id="crop-content" class="p-4 md:p-5 space-y-4 min-h-[200px]">
                <img id="crop-img" class="min-w-full" src="https://letsenhance.io/static/8f5e523ee6b2479e26ecc91b9c25261e/1015f/MainAfter.jpg" />
                <div class="col col-3">
                    <div class="preview"></div>
                </div>
                <x-common.button title="hello"/>
            </div>
        </div>
    </div>
</div>

@vite(['resources/js/common/uploadErrorHandle.js','resources/js/common/customCropper.js'])