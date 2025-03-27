import startQuillEditor from "../quill/startQuillEditor";

$(document).ready(function () {

  //Quill Editor
  const descriptionEl = document.getElementById("description");

  // start quill Editor
  const description = startQuillEditor(
    "#quill_description",
    "article",
    descriptionEl.value
  );

  //when submit , will add quill value in description input
  $("#editForm").submit(function (e) {
    e.preventDefault();
    //add values in quill editor to hidden input
    descriptionEl.value = description.root.innerHTML;
    this.submit();
    // this.submit();
  });
});
