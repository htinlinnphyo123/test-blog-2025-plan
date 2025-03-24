export default function checkPageValidationFrontend() {
    var validation = true;
        const fields = [
            { field: "#title", error: "#title_error" },
            {field: "#slug",error:"#slug_error"}
        ];

        fields.forEach(({ field, error }) => {
            if ($(field).val() === "") {
                $(error).text(`Please enter ${field.replace('#',' ')}`).show();
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