var hostname = window.location.origin;
// ********************** login form ********************
function login(){
    var username = $("#email").val();
    var password = $("#password").val();
    if(username==''){
      $("#email").addClass("form-control is-invalid");
    }
    if(password==''){
      $("#password").addClass("form-control is-invalid");
    }
    $.ajax({
        url : hostname+"/livechat/application/app/index.php",
        type:"POST",
        data :{uname: username, pass:password},
        success : function(data){
            if(data==='true'){
                window.location.href = hostname+"/livechat/application/";
            }else{
                $('#liveToast3').toast('show');
            }
        }
    });
}

// ********************** xxxxxxxxxx ********************
// ********************** registration form *************
function reg(){
    var emailid = $("#emailid").val();
    var username = $("#username").val();
    var cpassword = $("#cpassword").val();
    var ccpassword = $("#ccpassword").val();
  
    if(cpassword != ccpassword){
      $("#cpassword").addClass("form-control is-invalid");
      $("#invalidmsg").html("<small class='text-danger'>Password and Confiorm Password is not same..!</span>");
      $("#ccpassword").addClass("form-control is-invalid");
    }else if(emailid=='' && username=='' && cpassword=='' && ccpassword==''){
        $("#emailid").addClass("form-control is-invalid");
        $("#username").addClass("form-control is-invalid");
        $("#cpassword").addClass("form-control is-invalid");
        $("#ccpassword").addClass("form-control is-invalid");
      }else if(emailid!='' && username!='' && cpassword!='' && ccpassword!=''){
        $.ajax({
         url : hostname+"/livechat/application/app/index.php",
          type : "POST",
          data : {em:emailid, us:username, cp:cpassword,reg_msg:true},
          success : function(data){
            if(data==='true'){
                $('#liveToast4').toast('show');
                $("#emailid").val('');
                $("#username").val('');
                $("#cpassword").val('');
                $("#ccpassword").val('');
            }else{
                $('#liveToast5').toast('show');
            }
          }
        })
      }else{
        $('#liveToast7').toast('show');
      }
    }
// ********************** xxxxxxxxxx ********************
// ********************** forget password form **********
function forget(){
    var f_email = $("#inputEmail4").val();
    $.ajax({
        url : hostname+"/livechat/application/app/index.php",
        type:"POST",
        data :{f_password: f_email,},
        success : function(data){
            if(data==='true'){
                $('#liveToast6').toast('show');
                $("#inputEmail4").removeClass("is-invalid");
                $("#inputEmail4").val(''); 
            }else{
                $("#inputEmail4").addClass("form-control is-invalid");
            }
        }
    });
};
// ********************** xxxxxxxxxx ********************
// ********************** logout ********** *************
function logout(a){
  $.ajax({
    url : hostname+"/livechat/application/app/index.php",
    type:"POST",
    data :{log_out: a},
    success : function(data){
      if(data=='true'){
        window.location.href = hostname+"/livechat/";
      }
    }
  });
}
// ********************** xxxxxxxxxx ********************