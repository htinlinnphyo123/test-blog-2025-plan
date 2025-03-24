//Choosing Platform
$("#platform").change(function () {
    if (this.value == "Mobile") {
        $("#platform-container").slideUp(500);
        $("#position").prop("disabled",true);
        $("#size").prop("disabled",true);
        $("#size").val('');
        $("#position").val('')
    } else {
        $("#platform-container").slideDown(500);
        $("#position").removeAttr("disabled");
        $("#size").removeAttr("disabled");
    }
});
