@props(['title','type','links'])
<x-show.control>
    <x-show.label :title="$title" />

        @switch($type)
            @case('photo')
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    @foreach($links as $link)
                        <div class="rounded-lg border">
                            <img 
                                onclick="viewMedia(event.target)"
                                class="h-auto max-w-full object-fill cursor-pointer"
                                src="{{ $link }}" alt="" style="aspect-ratio: 1;"/>
                        </div>
                    @endforeach
                </div>  
            @break
            @case('video')
                <div class="grid lg:grid-cols-2 gap-4">
                    @foreach($links as $link)
                        <video src="{{ $link }}" controls></video>
                    @endforeach
                </div>
            @break
            @case('pdf')
                <div class="grid lg:grid-cols-2 gap-4 lg:gap-12">
                    @foreach($links as $link)
                        <embed type="application/pdf" 
                        src="{{ $link }}"
                        class="w-full min-h-[200px] lg:min-h-[300px] border">
                    @endforeach
                </div>
            @break
            @case('audio')
                <div class="grid lg:grid-cols-2 gap-4 lg:gap-12">
                    @foreach($links as $link)
                        <audio src="{{$link}}" controls></audio>
                    @endforeach
                </div>
            @break
        @endswitch

    <div class="div" id="popup">
        <img src="" alt="" id="selected-image" />
    </div>
</x-show.control>
<script>
    var viewMedia = (e) => {
        // console.log(e);
        const popup = document.querySelector("#popup");
        const selectedImage = document.querySelector("#selected-image");
        selectedImage.src = e.src;
        popup.style.transform = `translateY(0%)`;
        popup.addEventListener("click", () => {
            popup.style.transform = `translateY(-100%)`;
            popup.src = "";
        });
    }
</script>