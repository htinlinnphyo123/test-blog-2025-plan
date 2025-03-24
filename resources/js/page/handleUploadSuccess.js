import uploadMediaToPresignedUrl from "../admin/uploadMediaToPresignedUrl";
export default async function handleUploadSuccess(response,formDataFiles) {
    if (response.data.status === 200) {
        const links = response.data.data;
        if (links.length > 0) {
            await uploadMediaToPresignedUrl(links,formDataFiles);
        }
        $('body').removeClass('loading-overlay')
        Swal.fire({
            title: 'Upload Complete',
            text: 'Your files have been uploaded successfully.',
            icon: 'success',
            confirmButtonText: 'View Page Detail',
        }).then(result => {
            if (result.isConfirmed) {
                window.location.href = `/pages/${response.data.id}`;
            }
        });
    }
}