$(document).ready(function(){
  
  $('.btn-hide-show').click(function(){

    let typeInputSaatIni = $('.input-pass').attr('type');

    // console.log(typeInputSaatIni);

    if(typeInputSaatIni == "password"){
      $('.input-pass').attr('type', 'text');
      $(this).removeClass('fa-eye-slash');
      $(this).addClass('fa-eye');
      $(this).attr('title', 'hide password');
    }
    else if(typeInputSaatIni == "text"){
      $('.input-pass').attr('type', 'password');
      $(this).removeClass('fa-eye');
      $(this).addClass('fa-eye-slash');
      $(this).attr('title', 'show password');
    }

  });
  
  $('.btn-hide-show1').click(function(){

    let typeInputSaatIni = $('.input-pass1').attr('type');

    // console.log(typeInputSaatIni);

    if(typeInputSaatIni == "password"){
      $('.input-pass1').attr('type', 'text');
      $(this).removeClass('fa-eye-slash');
      $(this).addClass('fa-eye');
      $(this).attr('title', 'hide password');
    }
    else if(typeInputSaatIni == "text"){
      $('.input-pass1').attr('type', 'password');
      $(this).removeClass('fa-eye');
      $(this).addClass('fa-eye-slash');
      $(this).attr('title', 'show password');
    }

  });
});