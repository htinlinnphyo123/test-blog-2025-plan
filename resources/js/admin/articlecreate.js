import startQuillEditor from "../quill/startQuillEditor";
import previewTemplate from "../common/previewTemplate";
import axios from "axios";
import { data } from "jquery";

$(document).ready(function () {
  //CATEGORY
  //Choosing category will automatically change for subcategory lists
  $("#category_id").change(function () {
    // console.log($(this).val())
    $("#subcategory_id").empty();
    var category_id = $(this).val();
    if (category_id == "") {
      $("#subcategory_id").append('<option value="">Choose</option>');
    } else {
      var getSubcategoryList = $("#subcategory_lists").val(); //string from input value
      var arrSubcategoryList = JSON.parse(getSubcategoryList); //change to array
      var filterSubcategory = arrSubcategoryList.filter(
        (sub) => sub.category_id == category_id
      ); //get filter array that belong to chosen category
      if (filterSubcategory.length > 1) {
        $("#subcategory_id").append('<option value="">Choose</option>');
        filterSubcategory.forEach((sub) => {
          $("#subcategory_id").append(`
                        <option value="${sub.id}">${sub.name}</option>
                    `);
        });
      } else {
        $("#subcategory_id").append('<option value="">Choose</option>');
      }
    }
  });
  //CATEGORY

  //ARTICLE TYPE AND FILE INPUT
  const fileInput = $("#link");
  const preview = $("#preview");
  fileInput.attr("disabled", true);
  fileInput.attr({ multiple: true });
  $("#type").val("default");
  //for article type control
  $("#type").change(function () {
    preview.html(""); // clear preview
    fileInput.val(""); // clear file input
    formDataFiles = [];
    switch (this.value) {
      case "photo":
        fileInput.attr({ accept: "image/*" }).removeAttr("disabled");
        break;
      case "video":
        fileInput.attr({ accept: "video/*" }).removeAttr("disabled");
        break;
      case "pdf":
        fileInput.attr({ accept: "application/pdf" }).removeAttr("disabled");
        break;
      case "audio":
        fileInput.attr({ accept: "audio/*" }).removeAttr("disabled");
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

  // Checked Validation From Frontend Side
  function checkValidation() {
    var validation = true;
    const fields = [
      { field: "#title", error: "#title_error" },
      { field: "#category_id", error: "#category_error" },
    ];

    fields.forEach(({ field, error }) => {
      if ($(field).val() === "") {
        $(error).show();
        validation = false;
      } else {
        $(error).hide();
      }
    });
    if ($("#is_published").is(":checked") && $("#date").val() === "") {
      $("#published_error").show();
      validation = false;
    } else {
      $("#published_error").hide();
    }

    return validation;
  }
  // Checked Validation From Frontend Side

  //Quill Editor
  const descriptionEl = document.getElementById("description");
  const descriptionOtherEl = document.getElementById("description_other");

  // start quill Editor
  const description = startQuillEditor(
    "#quill_description",
    "articles/quill",
    descriptionEl.value
  );
  const descriptionOther = startQuillEditor(
    "#quill_description_other",
    "articles/quill",
    descriptionOtherEl.value
  );

  //when submit , will add quill value in description input
  $("#article-submit").submit(function (e) {
    e.preventDefault();
    $("#indicator").text("").removeClass().hide();
    //add values in quill editor to hidden input
    descriptionEl.value = description.root.innerHTML;
    descriptionOtherEl.value = descriptionOther.root.innerHTML;
    if (checkValidation()) {
      $("body").addClass("loading-overlay");
      let datas = new FormData();
      datas.append("title", $("#title").val());
      datas.append("title_other", $("#title_other").val());
      datas.append("category_id", $("#category_id").val());
      datas.append("subcategory_id", $("#subcategory_id").val());
      datas.append("type", $("#type").val());
      datas.append("is_published", $("#is_published").is(":checked") ? 1 : 0);
      datas.append("is_highlighed", $("#is_highlighed").is(":checked") ? 1 : 0);
      datas.append("is_banner", $("#is_banner").is(":checked") ? 1 : 0);
      datas.append(
        "is_sent_to_telegram",
        $("#is-sent-to-telegram").is(":checked") ? 1 : 0
      );
      datas.append("date", $("#date").val());
      datas.append("time", $("#time").val());
      datas.append("description", $("#description").val());
      datas.append("description_other", $("#description_other").val());
      datas.append("link_count", formDataFiles.length);
      datas.append("written_by", $("#written_by").val());
      datas.append("site_url", $("#site_url").val());
      datas.append("tags", $("#tags").val());

      let thumbnailFile = $("#thumbnail")[0].files[0];
      //   console.log(thumbnailFile);
      if (thumbnailFile) {
        datas.append("thumbnail", thumbnailFile);
      }

      $("#btn-submit")
        .html(`<i class="fa-solid fa-spinner rotating-180"></i> Uploading`)
        .attr("disabled", true);
      $("#indicator")
        .text("Uploading to Server")
        .addClass("lightning-text")
        .show();

      setTimeout(() => {
        axios
          .post("/articles", datas, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          })
          .then(async (response) => {
            // console.log('hello world');
            if (response.data.status === 200) {
              var links = response.data.data;
              // console.log(links);
              // console.log(formDataFiles);
              //after all files are upload , this will redirect to show page
              if (links.length > 0) {
                const uploadPromises = links.map((link, index) => {
                  return axios.put(link.url, formDataFiles[index].file, {
                    headers: {
                      "Content-Type": formDataFiles[index].type,
                      "x-amz-acl": "public-read", // to set file to public in DigitalOcean
                    },
                  });
                });
                // alert(response.data.message);
                await Promise.all(uploadPromises).then(() => {
                  $("body").removeClass("loading-overlay");
                  Swal.fire({
                    title: "Upload Complete",
                    text: "Your files have been uploaded successfully.",
                    icon: "success",
                    confirmButtonText: "View Article",
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = `/articles/${response.data.id}`;
                    }
                  });
                });
              } else {
                $("body").removeClass("loading-overlay");
                Swal.fire({
                  title: "Upload Complete",
                  text: "Your files have been uploaded successfully.",
                  icon: "success",
                  confirmButtonText: "Go to Articles",
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = `/articles/${response.data.id}`;
                  }
                });
              }
            }
          })
          .catch((error) => {
            console.log(error);
          });
      }, 2000);
    } else {
      $("#indicator")
        .text("You have something wrong in your form. Please check again.")
        .addClass("text-red-400")
        .show();
    }
    // this.submit();
  });

  $("#is_published").change(function () {
    if ($(this).is(":checked")) {
      $("#date").val($("#current-date").val());
      $("#time").val($("#current-time").val());
    } else {
      $("#date").val("");
      $("#time").val("");
    }
  });
});
