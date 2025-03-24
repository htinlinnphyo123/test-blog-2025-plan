import uploadFileToDigitalOcean from "./uploadToDigitalOcean";

var generatePresignedUrl = $("#presignedLink").val();
generatePresignedUrl = JSON.parse(generatePresignedUrl)
function customVideoUploadHandler(input, videoId) {
    const file = input.files[0];    
    if (file) {
        const maxFileSizeMB = 209715200; // 200MB (200*1024*1024)

        if (file.size > maxFileSizeMB) {
            alert('Please upload file smaller than 200 MB.');
            input.value = ''; // clear the file input
            document.getElementById(videoId).src = '';  // clear the preview video 
        } else {
            var src = window.URL.createObjectURL(file);
            $("#video-preview").html(`
                <video src="${src}" controls></video>
                <button type="button" id="upload-video"
                    class="bg-red-500 rounded-lg p-2 text-white mt-1 w-full">
                    Upload
                </button>
            `)
            $("#video-alert").show();
            $("#btn-submit").attr('disabled',true);
        }
        $("#video-preview").on('click','#upload-video',function(){
            $('body').addClass('loading-overlay')
            // console.log(generatePresignedUrl.path);
            uploadFileToDigitalOcean(file,generatePresignedUrl);
        })
    }
}



window.customVideoUploadHandler = customVideoUploadHandler;