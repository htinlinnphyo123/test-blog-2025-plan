@props(['width' => '', 'height' => '', 'src' => '', 'title' => ''])
<style>
    #popup {
        position: fixed;
        top: 0px;
        bottom: 0px;
        left: 0px;
        right: 0px;
        background-color: rgba(23, 22, 22, 0.95);
        display: flex;
        justify-content: center;
        align-items: center;
        transform: translateY(-100%);
        transition: 250ms transform;
        padding: 50px;
        z-index: 2000;
        overflow-x: hidden;
    }

    #selected-image {
        max-height: 100%;
        border-radius: 1rem;
        max-width: 100%;
    }
</style>
<div class="flex items-center justify-right gap-4">
    {{-- <div class="font-medium dark:text-white">
        <div class="text-sm text-right ">{{ $title }}</div>
    </div> --}}
    <img class="{{ $width }} {{ $height }} rounded-full cursor-pointer" src="{{ $src }}"
        alt="" id="uploaded_photo" onclick="viewImage()">
    <div class="div" id="popup">
        <img src="" alt="" id="selected-image" />
    </div>
</div>
<script>
    const viewImage = () => {
        const popup = document.querySelector("#popup");
        const gallery = document.querySelector("#uploaded_photo");
        const selectedImage = document.querySelector("#selected-image");
        selectedImage.src = gallery.src;
        popup.style.transform = `translateY(0%)`;
        popup.addEventListener("click", () => {
            popup.style.transform = `translateY(-100%)`;
            popup.src = "";
        });
    }
</script>
