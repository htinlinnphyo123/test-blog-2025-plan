@props(['width' => '', 'height' => '', 'src' => '', 'name' => '', 'email' => '', 'role' => ''])
<div class="flex items-right justify-right gap-4">
    <img class="{{ $width }} {{ $height }} rounded-full cursor-pointer" src="{{ $src }}"
        alt="" id="profile-photo" onclick="viewImage()">
    <div class="font-medium dark:text-white">
        <div class="text-xl text-gray-500 dark:text-gray-400"> {{ $name }}</div>
        <div class="text-em text-gray-500 dark:text-gray-400"> {{ $email }}</div>
        <div class="text-em text-gray-500 dark:text-gray-400"> {{ $role }}</div>
    </div>
    <div class="div" id="popup">
        <img src="" alt="" id="selected-image" />
    </div>
</div>
<script>
    const viewImage = () => {
        const popup = document.querySelector("#popup");
        const gallery = document.querySelector("#profile-photo");
        const selectedImage = document.querySelector("#selected-image");
        selectedImage.src = gallery.src;
        popup.style.transform = `translateY(0%)`;
        popup.addEventListener("click", () => {
            popup.style.transform = `translateY(-100%)`;
            popup.src = "";
        });
    }
</script>
