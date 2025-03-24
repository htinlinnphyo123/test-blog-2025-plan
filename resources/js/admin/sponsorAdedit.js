//Choosing Platform
$("#platform").change(function () {
    if (this.value == "Mobile") {
        $("#platform-container").slideUp(500);
        $("#position").val("");
        $("#size").val("");
    } else {
        $("#platform-container").slideDown(500);
        $("#position").removeAttr("disabled");
        $("#size").removeAttr("disabled");
    }
});
