import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";
export default defineConfig({
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "resources/js"),
    },
  },
  plugins: [
    laravel({
      input: [
        //Css
        "resources/css/app.css",
        "resources/css/multipleSelectCreate.css",
        "resources/css/custom.css",

        //Js
        "resources/js/app.js",
        "resources/js/bootstrap.js",

        //admin total (7)
        "resources/js/admin/articlecreate.js",
        "resources/js/admin/articleupdate.js",
        "resources/js/admin/disableSubmitButton.js",
        "resources/js/admin/enableSubmitButton.js",
        "resources/js/admin/notificationcreate.js",
        "resources/js/admin/notificationedit.js",
        "resources/js/admin/pagecreate.js",
        "resources/js/admin/pageupdate.js",
        "resources/js/admin/usercreate.js",
        "resources/js/admin/sendarticlenotification.js",
        "resources/js/admin/sendnotification.js",
        "resources/js/admin/uploadMediaToPresignedUrl.js",
        "resources/js/admin/notificationfrequencytoggler.js",

        //common total (23)
        "resources/js/common/customCropper.js",
        "resources/js/common/customVideoUploadHandler.js",
        "resources/js/common/deleteConfirm.js",
        "resources/js/common/errorValidation.js",
        "resources/js/common/loading.js",
        "resources/js/common/loginEyes.js",
        "resources/js/common/loginEyesAll.js",
        "resources/js/common/loginEyesNew.js",
        "resources/js/common/logoutConfirm.js",
        "resources/js/common/maxFileSize.js",
        "resources/js/common/multi_img_upload.js",
        "resources/js/common/multipleSelectCreate.js",
        "resources/js/common/navShowHide.js",
        "resources/js/common/previewTemplate.js",
        "resources/js/common/previewTemplateForUpdate.js",
        "resources/js/common/richEditor.js",
        "resources/js/common/rolePermission.js",
        "resources/js/common/search.js",
        "resources/js/common/sideActive.js",
        "resources/js/common/startQuillEditor.js",
        "resources/js/common/uploadErrorHandle.js",
        "resources/js/common/uploadToDigitalOcean.js",
        "resources/js/common/validateDisappear.js",

        //dashboard total (1)
        "resources/js/dashboard/chart.js",

        //fileUpload total (1)
        "resources/js/fileUpload/base64ToFile.js",

        //quill total (6)
        "resources/js/quill/addAudioButton.js",
        "resources/js/quill/insertToEditor.js",
        "resources/js/quill/saveToServer.js",
        "resources/js/quill/selectLocalAudio.js",
        "resources/js/quill/selectLocalImage.js",
        "resources/js/quill/startQuillEditor.js",

        //Theme total (1)
        "resources/js/Theme/darkLight.js",

        //Page
        "resources/js/page/axiosPostRequest.js",
        "resources/js/page/axiosPutRequest.js",
        "resources/js/page/checkPageValidationFrontend.js",
        "resources/js/page/createFormData.js",
        "resources/js/page/handleUploadError.js",
        "resources/js/page/handleUploadSuccess.js",
        "resources/js/page/updateFormData.js",

        //tag
        "resources/js/tag/tagPreview.js",
        "resources/js/tag/showPreview.js",

        //Sponsor
        "resources/js/admin/sendsponsorAd.js",
        "resources/js/admin/sponsorAdcreate.js",
        "resources/js/admin/sponsorAdedit.js",
      ],
      refresh: true,
    }),
  ],
});
