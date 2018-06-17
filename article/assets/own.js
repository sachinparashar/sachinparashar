
$(document).ready(function() {   
    $(document).keypress(function(e) {
        if(e.which == 13) {
            $('.login_btn').trigger('click');
        }
    });

    $(document).on('click', '.back', function(e){
        window.history.back();
    });

    $(document).on('click', '.signup_btn', function(e){
        window.location.replace(urlpath+'user/signup');
    });

    $(document).on('click', '.confirm_signup_btn', function(e){
      var fname = $('#fname').val();
      var lname = $('#lname').val();
      var email = $('#email').val();
      var phone = $('#phone').val();
      var gender = $('#gender').val();
      var password = $('#password').val();
      var cpassword = $('#cpassword').val();
      var date = new Date($('#dob').val());
      console.log(date);
      day = date.getDate();
      month = date.getMonth() + 1;
      year = date.getFullYear();
      var final_dob = [year,month,day].join('-');
      if(password != cpassword){
        document.getElementById('err_cpassword').innerHTML="Password does not match.";
        document.getElementById('password').style.border='1px solid red';
        document.getElementById('password').focus();
        document.getElementById('cpassword').style.border='1px solid red';
        document.getElementById('cpassword').focus();
        return false;
      }
      var arr = [];
      $("input:checkbox:checked").each(function(){ 
            arr.push($(this).val()); 
        });
        $.ajax({
                type : 'post',
                url : urlpath+'user/ajaxSignup',
                data :{fname:fname,lname:lname,email:email,phone:phone,gender:gender,dob:final_dob,password:password,preferences:arr},
                async : false,
                success : function(data){
                    console.log(data);
                    var result = data.trim();
                    console.log(result);
                    if(result == 'success')
                    {
                        window.location.href=urlpath+'user/dashboard';
                    }
                    else{
                        $('.pwd_msg').show();
                        $('.pwd_msg').html("This email is already registered with us.");
                    }
               }
        });
    });

    $(document).on('click', '.login_btn', function(e){
        var username = $('#email').val();
        var password = $('#password').val();

        if((username==null)||(username==""))
        {
            document.getElementById('err_email').innerHTML="Enter your Email ID or Phone number";
            document.getElementById('email').style.border='1px solid red';
            document.getElementById('email').focus();
            return false;
        }
        else if((password==null)||(password==""))
        {
            document.getElementById('err_password').innerHTML="Enter your Password";
            document.getElementById('password').style.border='1px solid red';
            document.getElementById('password').focus();
            return false;
        }
        else{
            $.ajax({
                type : 'post',
                url : urlpath+'user/ajaxLogin',
                data :{username:username,password:password},
                async : false,
                success : function(data){
                    console.log(data);
                    var result = data.trim();
                    console.log(result);
                    if(result == 'success')
                    {
                        window.location.href=urlpath+'user/dashboard';
                    }
                    else{
                        $('.pwd_msg').show();
                        $('.pwd_msg').html("Wrong email or password");
                    }
                }
            });
        }
    }); 

    $(document).on('click', '.update_profile', function(e){
      $('#name1').removeAttr("disabled");
      //$('#email1').removeAttr("disabled");
      $('#phone1').removeAttr("disabled");
      $('#gender1').removeAttr("disabled");
      $('#dob1').removeAttr("disabled");
      $('#password1').removeAttr("disabled");
      $('.preferences1').removeAttr("disabled");

      $('#update_profile').hide();
      $('.cancel_update_profile').show();
      $('.confirm_update_btn').show();
    });

    $(document).on('click', '.cancel_update_profile', function(e){
      $('#name1').attr("disabled",true);
      //$('#email1').removeAttr("disabled");
      $('#phone1').attr("disabled",true);
      $('#gender1').attr("disabled",true);
      $('#dob1').attr("disabled",true);
      $('#password1').attr("disabled",true);
      $('.preferences1').attr("disabled",true);

      $('#update_profile').show();
      $('.cancel_update_profile').hide();
      $('.confirm_update_btn').hide();
    }); 

    $(document).on('click', '.confirm_update_btn', function(e){
      var name = $('#name1').val();
      var email = $('#email1').val();
      var phone = $('#phone1').val();
      var gender = $('#gender1').val();
      var password = $('#password1').val();
      var date = new Date($('#dob').val());
      console.log(date);
      day = date.getDate();
      month = date.getMonth() + 1;
      year = date.getFullYear();
      var final_dob = [year,month,day].join('-');
      var arr = [];
      $("input:checkbox:checked").each(function(){ 
            arr.push($(this).val()); 
        });
        $.ajax({
                type : 'post',
                url : urlpath+'user/ajax_Update_profile',
                data :{name:name,email:email,phone:phone,gender:gender,password:password,dob:final_dob,preferences:arr},
                async : false,
                success : function(data){
                    location.reload();
               }
        });
    });

    $(document).on('click', '.delete_article', function(e){
        var article_id = $(this).attr('data-id');
        var confirm_action = false;
        if(article_id!='')
        {            
            if(confirm("Are you sure you want delete this Article"))
            {
                $.ajax({
                    type : 'post',
                    url : urlpath+'user/ajaxDeleteArticle',
                    data :{article_id:article_id},
                    async : false,
                    success : function(data){
                        var obj;
                        ra = JSON.parse(data);
                        obj = ra.message;
                        console.log(obj);
                        if(obj == 'success')
                        {
                            $('.article_table tr[data-id="'+article_id+'"]').remove();
                            $('.article_table').DataTable();
                        }
                   }
                });
            }
        }
    });

    $(document).on('click', '.like_btn', function(e){
         var article_id = $(this).attr('data-id');
         //alert(article_id);
            var confirm_action = false;
            if(article_id!='')
            {            
                if(confirm("Are you sure you want Like this Article"))
                {
                    $.ajax({
                        type : 'post',
                        url : urlpath+'user/likeArticle',
                        data :{article_id:article_id},
                        async : false,
                        success : function(data){
                            var obj;
                            ra = JSON.parse(data);
                            obj = ra.message;
                            console.log(obj);
                            if(obj == 'success')
                            {
                               location.reload();
                            }
                       }
                    });
                }
            }
    });

    $(document).on('click', '.dislike_btn', function(e){
         var article_id = $(this).attr('data-id');
         //alert(article_id);
            var confirm_action = false;
            if(article_id!='')
            {            
                if(confirm("Are you sure you want Dislike this Article"))
                {
                    $.ajax({
                        type : 'post',
                        url : urlpath+'user/dislikeArticle',
                        data :{article_id:article_id},
                        async : false,
                        success : function(data){
                            var obj;
                            ra = JSON.parse(data);
                            obj = ra.message;
                            console.log(obj);
                            if(obj == 'success')
                            {
                                location.reload();
                            }
                       }
                    });
                }
            }
    });

});
   
$('.cropme').simpleCropper();            
$('#portrait').hide();

    
	
	
