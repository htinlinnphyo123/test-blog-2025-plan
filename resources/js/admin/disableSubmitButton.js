export default function disableSubmitButton(){
    $("#btn-submit")
        .html(`<i class="fa-solid fa-spinner rotating-180"></i> Uploading`)
        .attr('disabled',true);
    $("#indicator").text('Uploading to Server').addClass('lightning-text').show();
}