import base64ToStrig from '../fileUpload/base64ToFile.js'
$(document).ready(function(){
    // console.log("%cHello Multiple Imgs is ready!", "color: #007acc;font-size:4rem;");

    $("#btn-submit").on('click',function(e){
        e.preventDefault();
        const getbase64Image = $(".dz-image-preview").find('img').attr('src'); //get base64String 
        const getFileInstance = base64ToStrig(getbase64Image);
        document.getElementById('profile_photo').file
        setFileInput(document.getElementById('images'),imageFiles);
        $("#user-create-form").submit();
    })
});