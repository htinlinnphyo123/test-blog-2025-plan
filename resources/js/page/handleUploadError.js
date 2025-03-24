import enableSubmitButton from "../admin/enableSubmitButton";
export default async function handleUploadError(error) {
    $('body').removeClass("loading-overlay")
    // $('#slug_error').text(error.response.data.message).show();
    console.log(error);
    enableSubmitButton();
    $("#indicator").text('You have something wrong in your form. Please check again.')
                   .addClass('text-red-400')
                   .removeClass('lightning-text')
                   .show();
}