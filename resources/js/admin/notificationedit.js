//SENDING METHOD AND DATE
$("#sending_method").change(function () {
    if (this.value == "Manual") {
        $("#schedule-container").slideUp(500);
        $("#sending_frequency").val("");
        $("#sending_interval").val("");
    } else {
        $("#schedule-container").slideDown(500);
        $("#sending_frequency").removeAttr("disabled");
        $("#sending_interval").removeAttr("disabled");
    }
});
