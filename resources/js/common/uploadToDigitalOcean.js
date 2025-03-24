export default async function uploadFileToDigitalOcean(file,link){
    // console.log(file,link)
    const uploading = await axios.put(link.url.url, file, {
        headers: {
            "Content-Type": file.type,
            "x-amz-acl": "public-read", // to set file to public in DigitalOcean
        },
    });
    $("#video-alert").hide();
    if(uploading.status===200){
        $('body').removeClass('loading-overlay')
        Swal.fire({
            title: 'Upload Complete',
            text: 'Your video have been uploaded successfully.',
            icon: 'success',
            confirmButtonText: 'Continue Form',
        }).then((result) => {
            if (result.isConfirmed) {
                $("#uploaded_video").val(link.path);
                $("#btn-submit").removeAttr('disabled');
            }
        }); 
    }
    // console.log(uploading);
}