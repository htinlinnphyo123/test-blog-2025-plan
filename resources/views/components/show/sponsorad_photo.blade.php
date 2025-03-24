@props(['width' => '', 'height' => '', 'src' => '', 'created_at' => ''])
<div class="flex items-center justify-center gap-4">
    <img class="{{ $width }} {{ $height }} rounded-full cursor-pointer" src="{{ $src }}"
        alt="" id="thumbnail-image" onclick="viewImage()">
    {{-- <div class="font-medium dark:text-white">
        <div class="text-sm text-gray-500 dark:text-gray-400">Joined in {{ $created_at }}</div>
    </div> --}}
    <div class="div" id="popup">
        <img src="" alt="" id="selected-image" />
    </div>
</div>
<script>
    const viewImage = () => {
        const popup = document.querySelector("#popup");
        const gallery = document.querySelector("#thumbnail-image");
        const selectedImage = document.querySelector("#selected-image");
        selectedImage.src = gallery.src;
        popup.style.transform = `translateY(0%)`;
        popup.addEventListener("click", () => {
            popup.style.transform = `translateY(-100%)`;
            popup.src = "";
        });
    }
</script>
