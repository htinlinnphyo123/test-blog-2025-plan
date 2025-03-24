const validate = document.getElementById("toast-success");
validate
  ? setTimeout(() => {
      validate.style.display = "none";
    }, 5000)
  : "";
