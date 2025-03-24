@props([
    'title',
    'name',
    'id' => '',
    'videoId' => '',
    'class' => '',
    'required' => false,
    'helperText' => null,
    'videoSrc' => null,
])
<x-form.control>
    <x-form.label :title="$title" :required="$required" />
    <input type="file" name="{{ $name }}" id="{{ $id }}"
        class="block w-full text-sm text-gray-900 border-2 border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none {{ $class }}"
        aria-label="file example" accept="video/*" onchange="customVideoUploadHandler(this,'{{ $videoId }}')">
    <x-form.helper_text message="{{ $helperText }}" />
    <div id="video-preview">
        @if($videoSrc)
            <video src="{{ $videoSrc }}" id="{{ $videoId }}" controls class="border rounded-lg" ></video>
        @else
            <!-- <video class="border rounded-lg"></video> -->
        @endif
    </div>
    <x-form.error :field="$name" />
</x-form.control>
