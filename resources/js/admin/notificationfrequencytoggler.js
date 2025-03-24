$(document).ready(function(){

    $("#sending_frequency").change(function(){
        switch(this.value){
            case "per_day":
                $("#sending_interval").attr('max','24')
                break;
            case "per_week":
                $("#sending_interval").attr('max','7')
                break;
            case "per_month":
                $("#sending_interval").attr('max','31')
                break;
            case "per_year":
                $("#sending_interval").attr('max','12')
                break;
        }
    })
    
})