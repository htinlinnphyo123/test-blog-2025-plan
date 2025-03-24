export default function enableSubmitButton(){
    $("#btn-submit")
    .html(`Upload`)
    .removeAttr('disabled');
$("#indicator").text(' ').addClass('lightning-text').hide();
}