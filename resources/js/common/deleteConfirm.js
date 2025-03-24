const deleteBtn = document.querySelectorAll(".formActionDelete");
const success = document.getElementById("delete");
if (success) {
  Swal.fire("Deleted!", "Your file has been deleted.", "success");
}
deleteBtn.forEach(function (deleteBtn, e) {
  deleteBtn.addEventListener("submit", function (e) {
    e.preventDefault(); //stop form from submitting
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        deleteBtn.submit();
        if (success) {
          Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }
      }
    });
  });
});
