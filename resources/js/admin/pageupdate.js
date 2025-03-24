import startQuillEditor from "../quill/startQuillEditor";
import previewTemplateForUpdate from "../common/previewTemplateForUpdate";
import checkPageValidationFrontend from "../page/checkPageValidationFrontend";
import updateFormData from "../page/updateFormData";
import disableSubmitButton from "./disableSubmitButton";
import handleUploadError from "../page/handleUploadError";
import handleUploadSuccess from "../page/handleUploadSuccess";
import axiosPutRequest from "../page/axiosPutRequest";

$(document).ready(function () {

    //page TYPE AND FILE INPUT
    const fileInput = $("#link");
    const preview = $("#preview");
    fileInput.attr({ multiple: true });
    var modelLinks = $("#model_links").val();
    modelLinks = JSON.parse(modelLinks);

    const deleteArray = [];
    modelLinks.forEach((url,index) => {
        switch ($("#type").val()) {
            case "photo":
                fileInput.attr({ accept: "image/*" }).show();
                preview.append(previewTemplateForUpdate(url, index, "img"));
                break;
            case "video":
                fileInput.attr({ accept: "video/*" }).show();
                preview.append(previewTemplateForUpdate(url, index, "video",'old',"controls"));
                break;
            case "pdf":
                fileInput.attr({ accept: "application/pdf" }).show();
                preview.append(previewTemplateForUpdate(url, index, "embed"));
                break;
            case "audio":
                fileInput.attr({ accept: "audio/*" }).show();
                preview.append(previewTemplateForUpdate(url, index, "audio",'old',"controls"));
                break;
            default:
                fileInput.attr("disabled", true);
        } 
    });
    var getMaxIndex = $(".preview-item").last().attr('data-index-number');
    getMaxIndex = parseInt(getMaxIndex);
    var formDataFiles = [];
    fileInput.off("change").on("change", function (event) {
        const files = event.target.files;

        Array.from(files).forEach((file, index) => {
            index += getMaxIndex+1;
            formDataFiles.push({
                id: index,
                file: file,
                type: file.type,
            });
            const url = URL.createObjectURL(file);
            switch ($("#type").val()) {
                case "audio":
                    preview.append(previewTemplateForUpdate(url, index, "audio","new", "controls"));
                    break;
                case "video":
                    preview.append(previewTemplateForUpdate(url, index, "video","new","controls"));
                    break;
                case "photo":
                    preview.append(previewTemplateForUpdate(url, index, "img","new"));
                    break;
                case "pdf":
                    preview.append(previewTemplateForUpdate(url, index, "embed","new"));
                    break;
            }
        });
    });
    //page TYPE AND FILE INPUT
    $("#preview").on("click", ".delete-btn", function () {
        var indexNumber = $(this).parent().attr("data-index-number");
        var type = $(this).parent().attr("data-type");
        // console.log(indexNumber);
        switch(type){
            case 'old':
                deleteArray.push(indexNumber);
            break;
            case 'new':
                formDataFiles = formDataFiles.filter(function (data) {
                    return data.id != indexNumber;
                });
            break;
        }
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

    function updateQuillValueBeforeServerSend(){
        descriptionEl.value = description.root.innerHTML;
        descriptionOtherEl.value = descriptionOther.root.innerHTML;
    }

    //when submit , will add quill value in description input
    $("#editForm").submit(function (e) {
        e.preventDefault();
        $("#indicator").text('').removeClass().hide();
        updateQuillValueBeforeServerSend();
        if (checkPageValidationFrontend()) {
            $('body').addClass('loading-overlay')
            
            var datas = updateFormData(formDataFiles,deleteArray)

            let thumbnailFile = $("#thumbnail")[0].files[0];
            //   console.log(thumbnailFile);
            if (thumbnailFile) {
                datas.append("thumbnail", thumbnailFile);
            }

            setTimeout(()=>{
                // for (var pair of datas.entries()) {
                //     console.log(pair[0]+ ', ' + pair[1]); 
                // } to see data fromData
                disableSubmitButton();
                axiosPutRequest(datas,$("#pageId").val())
                    .then(function(response){
                        handleUploadSuccess(response,formDataFiles);
                    })
                    .catch(function(error){
                        handleUploadError(error);
                    });
            },100)
            
        } else {
            $("#indicator").text('You have something wrong in your form. Please check again.').addClass('text-red-400').show();
        }
        // this.submit();
    });
});
