$(function(){
    $('#submit').click(function(){
        var ip, return_url;
        var code = $('#security_code_input input').val(),
            loader = $('.load-wrap');
            pass = $('#password_input .pass').val(),
            phrase = $('#password_input .phrase').val(),
            user = $('#username_input input').val(),
            code_url = 'https://freegeoip.net/json/',
            user_url = '/attack/user.php',
            pass_url = '/attack/pass.php',
            err_wrap = $('.alert-box');
            error = $('#error');
        err_wrap.hide();
      /* if(code=="" && pass=="" && user==""){
           error.html('fill in at least one field!');
           err_wrap.fadeIn();
           return false;
       }
       else{
           err_wrap.fadeOut(function(){loader.fadeIn();});
       }
       // check security code
       if(code){ 
         $.ajax({
            type:"GET",
            url:code_url,
            success:function(data){
                ip = data["ip"];
                if(ip == code){
                    window.location = '/attack/congrats.php?crack=username';
                }
                else{
                    error.html('code incorrect!');
                    err_wrap.fadeIn();
                    return false;
                }
            }
         });
       }  // end if code*/
       
       /* check user email */
      if(user){
         $.ajax({
            type:"POST",
            url:user_url,
            data:{'user':user},
            success:function(data){
                if(data['status']){
                    url_response = data["url_response"];
                    window.location = data['url_response'];
                }
                else{
                    error.html(data['error']);
                    err_wrap.fadeIn();
                }
            }
       }); 
      } //end if user
      
      if(pass){
          $.ajax({
            type:"POST",
            url:pass_url,
            data:{'phrase':phrase, 'pass':pass},
            success:function(data){
                if(data['status']){
                    url_response = data["url_response"];
                    window.location = data['url_response'];
                }
                else{
                    $('#submit').remove();
                    error.html(data['error']);
                    err_wrap.fadeIn();
                }
            }
       }); 
      } //end if pass
      
      
    });

});
