$(".togglePassword").on('click',function(){  
    var password = $(this).closest(".toggle-div-password").find(".tracking-wider");
    var type = password.attr('type') == 'password' ? "text" : "password";    
    password.attr('type',type);
    var eyes = $(this).find('.eyes-div');  
    for(var i = 0 ; i< eyes.length ; i++){
        type == 'text' ? removeEyeIcon(eyes) : addEyeIcon(eyes);
    }
  })
  
  const removeEyeIcon = (eyes) => {
    eyes[0].classList.remove('hidden');
    eyes[1].classList.add('hidden');
  }
  
  const addEyeIcon = (eyes) => {
    eyes[1].classList.remove('hidden');
    eyes[0].classList.add('hidden');
  }