$(document).ready(function(){
    $('.role-title').change(function(){
        var field = $(this).val();  //users
        var check = $(this).prop('checked');
        if(check===true){
            $('.'+field+"_p").prop('checked',true);
        }else{
            $('.'+field+"_p").prop('checked',false);
        }
    })

    $('.permission-title').change(function(){
        var field = $(this).val();
        console.log(field);
        var allChecked = true;
        $('.'+field+'_p').each(function() {
            if (!$(this).prop("checked")) {
                allChecked = false;
                return false;
            }
        });
        if(allChecked===true){
            $("#permission_"+field).prop('checked',true)
        }else{
            $("#permission_"+field).prop('checked',false)
        }
    })

})
