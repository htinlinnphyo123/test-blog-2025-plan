import startQuillEditor from "../quill/startQuillEditor";
import previewTemplate from "../common/previewTemplate";
import checkPageValidationFrontend from "../page/checkPageValidationFrontend";
import axiosPostRequest from "../page/axiosPostRequest";
import createFormData from '../page/createFormData'
import disableSubmitButton from "./disableSubmitButton";
import handleUploadError from "../page/handleUploadError";
import handleUploadSuccess from "../page/handleUploadSuccess";

$(document).ready(function () {
    //ARTICLE TYPE AND FILE INPUT
    const fileInput = $("#link");
    const preview = $("#preview");
    fileInput.attr({ accept: "image/*" }).show();
    fileInput.attr({ multiple: true });
    $("#type").val("photo");
    //for article type control
    $("#type").change(function () {
        preview.html(""); // clear preview
        fileInput.val(""); // clear file input
        formDataFiles = [];
        switch (this.value) {
            case "photo":
                fileInput.attr({ accept: "image/*" }).removeAttr('disabled');
                break;
            case "video":
                fileInput.attr({ accept: "video/*" }).removeAttr('disabled');
                break;
            case "pdf":
                fileInput.attr({ accept: "application/pdf" }).removeAttr('disabled');
                break;
            case "audio":
                fileInput.attr({ accept: "audio/*" }).removeAttr('disabled');
                break;
            default:
                fileInput.attr("disabled", true);
        }
    });

    var formDataFiles = [];
    fileInput.off("change").on("change", function (event) {
        const files = event.target.files;
        Array.from(files).forEach((file, index) => {
            formDataFiles.push({
                id: index,
                file: file,
                type: file.type,
            });
            const url = URL.createObjectURL(file);
            switch ($("#type").val()) {
                case "audio":
                    preview.append(previewTemplate(url, index, "audio", "controls"));
                    break;
                case "video":
                    preview.append(previewTemplate(url, index, "video", "controls"));
                    break;
                case "photo":
                    preview.append(previewTemplate(url, index, "img"));
                    break;
                case "pdf":
                    preview.append(previewTemplate(url, index, "embed"));
                    break;
            }
        });
    });

    //ARTICLE TYPE AND FILE INPUT
    $("#preview").on("click", ".delete-btn", function () {
        var indexNumber = $(this).parent().attr("data-index-number");
        // console.log(formDataFiles);
        formDataFiles = formDataFiles.filter(function (data) {
            return data.id != indexNumber;
        });
        $(this).parent().remove();
    });

    //Quill Editor
    const descriptionEl = document.getElementById("description");
    const descriptionOtherEl = document.getElementById("description_other");

    // start quill Editor
    const description = startQuillEditor(
        "#quill_description",
        "pages/quill",
        descriptionEl.value
    );
    const descriptionOther = startQuillEditor(
        "#quill_description_other",
        "pages/quill",
        descriptionOtherEl.value
    );

    //text and element we type in editor are not in input value, so we have to update descriptionEl.value to include in formData
    function updateQuillValueBeforeServerSend() {
        descriptionEl.value = description.root.innerHTML;
        descriptionOtherEl.value = descriptionOther.root.innerHTML;
    }

    //when submit , will add quill value in description input
    $("#page-submit").submit(function (e) {
        e.preventDefault();
        $("#indicator").text('').removeClass().hide();
        //add values in quill editor to hidden input
        updateQuillValueBeforeServerSend();
        if (checkPageValidationFrontend()) {
            // prepare FormData
            let datas = createFormData(formDataFiles);
            
            //if file include will append into formData
            let thumbnailFile = $("#thumbnail")[0].files[0];
            if (thumbnailFile) {
                datas.append("thumbnail", thumbnailFile);
            }
            // disableSubmitButton();
            $('body').addClass('loading-overlay')

            setTimeout(()=>{

                disableSubmitButton();
                axiosPostRequest(datas)
                    .then(function(response){
                        handleUploadSuccess(response,formDataFiles);
                    })
                    .catch(function(error){
                        handleUploadError(error);
                    });
                
            },2000)
            
        } else {
            $("#indicator").text('You have something wrong in your form. Please check again.').addClass('text-red-400').show();
        }
        // this.submit();
    });
});
