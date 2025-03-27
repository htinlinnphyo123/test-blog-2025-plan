import startQuillEditor from "../quill/startQuillEditor";
import previewTemplate from "../common/previewTemplate";
import axios from "axios";
import { data } from "jquery";

$(document).ready(function () {
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

  // start quill Editor
  const description = startQuillEditor(
    "#quill_description",
    "articles/quill",
    descriptionEl.value
  );

  //when submit , will add quill value in description input
  $("#article-submit").submit(function (e) {
    e.preventDefault();
    $("#indicator").text("").removeClass().hide();
    //add values in quill editor to hidden input
    descriptionEl.value = description.root.innerHTML;
    this.submit();

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
