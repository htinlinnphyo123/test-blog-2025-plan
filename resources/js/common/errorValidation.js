//validation list should be obj
//  {
//      selector    : $("class or id"),
//      checkedValue: null or 0 or something u want to check
//      errorMsg    : show error msg to users
//  }
const errorValidation = (
  validationList, //obj
  formSubmitSelector, //selector
  renderSelector, // selector
  event
) => {
  event.preventDefault();
  var errors = [];
  validationList.forEach((value) => {
    if ($(value.selector).val() == value.checkValue) {
      errors.push(value.errorMsg);
    }
  });

  var errorList = "";
  if (errors.length != 0) {
    errors.forEach((error) => {
      errorList += `<li>${error}<li>`;
    });
  }

  if (errorList == "") {
    $(formSubmitSelector).submit();
    $("#loadingFalse").addClass("hidden");
    $("#loadingTrue").removeClass("hidden");
  } else {
    $(`${renderSelector} ul`).html(errorList);
    $("#close-warning").removeClass("hidden");
    $(renderSelector).addClass(
      "bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4"
    );
    $("#main").scrollTop(0);
    setTimeout(() => {
      $(`${renderSelector} ul`).html("");
      $("#close-warning").addClass("hidden");
      $(renderSelector).removeClass(
        "bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4"
      );
    }, 4545);

    $(document).on("click", "#close-warning", function () {
      $(this).closest(renderSelector).find("ul").html("");
      $(this).addClass("hidden");
      $(this)
        .closest(renderSelector)
        .removeClass(
          "bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4"
        );
    });
  }
};

export { errorValidation };
