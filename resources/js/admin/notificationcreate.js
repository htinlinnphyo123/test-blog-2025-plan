//SENDING METHOD AND DATE
$("#sending_method").change(function () {
    if (this.value == "Manual") {
        $("#schedule-container").slideUp(500);
        $("#sending_frequency").prop("disabled",true);
        $("#sending_interval").prop("disabled",true);
        $("#sending_interval").val('');
        $("#sending_frequency").val('')
    } else {
        $("#schedule-container").slideDown(500);
        $("#sending_frequency").removeAttr("disabled");
        $("#sending_interval").removeAttr("disabled");
    }
});
