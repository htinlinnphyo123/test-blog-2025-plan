import Cropper from "cropperjs";
$(document).ready(function(){
    var cropper;
    $(document).on("click", ".dz-image-preview img", function() {
        var imgSrc = $(this).attr("src");
        $('.crop-container').removeClass('hidden').addClass('flex')
        const image = document.getElementById('crop-img');
        image.src = imgSrc;
        const reader = new FileReader();
        reader.onload = (e)=>{
            cropper = new Cropper(imageElement);

        }
        cropper = new Cropper(image,{
            preview:'.preview'
        });
    });
    $(document).on("click","#crop-close",function(){
        $('.crop-container').addClass('hidden').removeClass('flex');
        $('#crop-content').html(`
            <img id="crop-img" src="" />
        `);
    })
})

  