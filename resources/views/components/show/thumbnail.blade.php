@props(['width' => '', 'height' => '', 'src' => '','title'])
<x-show.control>
    <x-show.label :title="$title" />
    <div class="">
        <img class="{{ $width }} {{ $height }} rounded-md cursor-pointer" src="{{ $src }}"
            alt="" id="thumbnail-photo" onclick="viewImage()">
        <div class="div" id="popup">
            <img src="" alt="" id="selected-image" />
        </div>
    </div>
</x-show.control>
<script>
    const viewImage = () => {
        const popup = document.querySelector("#popup");
        const gallery = document.querySelector("#thumbnail-photo");
        const selectedImage = document.querySelector("#selected-image");
        selectedImage.src = gallery.src;
        popup.style.transform = `translateY(0%)`;
        popup.addEventListener("click", () => {
            popup.style.transform = `translateY(-100%)`;
            popup.src = "";
        });
    }
</script>
