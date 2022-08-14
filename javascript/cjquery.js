setInterval("onlineusers()", 1000);
function onlineusers(){
  var  ac = $("#search").val();
  if(ac==''){
    var to_msg_send = $("#to_msg_send").val();
    var u_msg = $("#user_send").val();
    var gr_msg = $("#to_msg_send").val();
    $.ajax({
        url : hostname+"/livechat/application/app/users.php",
        success : function(data){
        $('#onlineusers').html(data);
        follow_update();
        display_group();
        chat_msg(to_msg_send);
        group_msg(gr_msg);
          if(u_msg!=''){
            scrollToBottom();
            display_group();
          }
        }
    });
  }
}

function user_send(){
    var u_msg = $("#user_send").val();
    var to_msg_send = $("#to_msg_send").val();
    var user_name = $("#user_name").val();
    var to_store ='true';
    if(to_msg_send!=null && user_name!=null){
      $.ajax({
        url : hostname+"/livechat/application/app/msg.php",
        type:"POST",
        data :{store_msg: to_store, us_msg :u_msg, to_msg_store:to_msg_send, to_name:user_name},
        success : function(){
          $("#user_send").val('');
          chat_msg(to_msg_send);
        }
      });
    }
  };
  
  function clicked_user(a){
    $.ajax({
        url : hostname+"/livechat/application/app/display.php",
        type:"POST",
        data :{user_msg: a},
        success : function(data){
            $("#userinfo").html(data);
            chat_msg(a);
        }
      });
}

function chat_msg(b){
  $.ajax({
      url : hostname+"/livechat/application/app/chat.php",
      type:"POST",
      data :{user_msg: b},
      success : function(data){
          $("#chat_msg").html(data);   
      }
    });
}

function scrollToBottom(){
  var objDiv = document.getElementById("chat_msg");
  if(objDiv==''){
    var objDiv = document.getElementById("chat_msg");
    objDiv.scrollTop = objDiv.scrollHeight;
    $('#chat_msg').stop().animate({
      scrollTop: $('#chat_msg')[0].scrollHeight
    }, 800);
  }
}


function profile(d){
        $("#profile").html(d);   
       
}


function search(){
 var  a = $("#search").val();
    $.ajax({
      url : hostname+"/livechat/application/app/search.php",
      type:"POST",
      data :{search: a},
      success : function(data){
          $("#onlineusers").html(data);
          chat_msg(a);
      }
    });
}

function follow(foll){
  $.ajax({
    url : hostname+"/livechat/application/app/follow.php",
    type:"POST",
    data :{follow: foll},
    success : function(data){
        $("#follow").html(data);
    }
  });
}

function unfollow(unfoll){
  $.ajax({
    url : hostname+"/livechat/application/app/follow.php",
    type:"POST",
    data :{unfollow: unfoll},
    success : function(data){
        $("#follow").html(data);
    }
  });
}

function follow_update(){
  $.ajax({
    url : hostname+"/livechat/application/app/follow.php",
    type:"POST",
    success : function(data){
        $("#follow").html(data);
    }
  });
}


$(document).on('keypress',function(e) {
  var u_msg = $("#user_send").val();
  if(e.which == 13 && u_msg!=''&& u_msg!=null) {
      user_send();
  }
});


$(document).on('keypress',function(e) {
  var username = $("#email").val();
  var password = $("#password").val();
  if(e.which == 13 && username!='' && password!='') {
    login();
  }
});


$(document).on('keypress',function(e) {
  var emailid = $("#emailid").val();
  var username = $("#username").val();
  var cpassword = $("#cpassword").val();
  var ccpassword = $("#ccpassword").val();
  if(e.which == 13 && username!='' && emailid!='' && cpassword!='' && ccpassword!='' && username!=' '&& username!=null) {
    reg();
  }
});


$(document).on('keypress',function(e) {
  var f_email = $("#inputEmail4").val();
  if(e.which == 13 && f_email!='') {
    forget();
  }
});



  function checkbox_cliked(){
    var favorite = [];
    $.each($("input[name='pl']:checked"), function(){
          favorite.push($(this).val());
    });
    var courses = (favorite.join(","));
    return courses;
  }



 function create_group() {
  var creater_name = $("#gc_name").val();
  var group_name = $("#g_name").val();
  var group_type = $("#g_type").val();
  var g_email = $("#gc_email").val();
  var member_list = g_email + ','+checkbox_cliked();

  if(group_name==''){
    $("#g_name").addClass("is-invalid");
  }
  if(group_type==''){
    $("#g_type").addClass("is-invalid");
  }

  if(group_name!='' && group_type!='' && g_email!='' && creater_name!='' && member_list!=''){
    $.ajax({
      url : hostname+"/livechat/application/app/group.php",
      type:"POST",
      data :{gc_name:creater_name, g_name:group_name, g_type:group_type,members:member_list,gc_email:g_email},
      success : function(data){
        $("#group_in").html(data);
      }
    });
  }
}

function display_group(){
  $.ajax({
    url : hostname+"/livechat/application/app/d_group.php",
    type:"POST",
    success : function(data){
        $("#group_list").html(data);
    }
  });
}

function group_click(a){
  group_msg(a);
  $.ajax({
    url : hostname+"/livechat/application/app/g_display.php",
    type:"POST",
    data :{group_id: a},
    success : function(data){
        $("#userinfo").html(data);
    }
  });
}


function group_msg(b){
  $.ajax({
      url : hostname+"/livechat/application/app/group_msg.php",
      type:"POST",
      data :{gp_msg: b},
      success : function(data){
          $("#group_msg").html(data);   
      }
    });
}

function exitgroup(user_exit){
  var id = $("#group_id_e").val();
  $.ajax({
    url : hostname+"/livechat/application/app/group.php",
    type:"POST",
    data :{exit_user: user_exit, group_id :id},
    success : function(data){
        $("#gorup_indodkdfwe").html(data);   
    }
  });
}



$( document ).ready(function() {
  $("#feedback").on("click",function(event){
    var feed_name = $("#fname").val();
    var feed_email = $("#femail").val();
    var feed_select = $("#fselect").val();
    var feed_message = $("#fmessage").val();
    if(feed_email!='' && feed_message!=''){
      $.ajax({
        url : hostname+"/livechat/application/app/feedback.php",
        type:"POST",
        data :{feed_name:feed_name,feed_email:feed_email,feed_select:feed_select,feed_message:feed_message},
        success : function(data){
            $("#feedback").html(data);  
            $("#fname").val('');
            $("#femail").val('');
            $("#fmessage").val(''); 
        }
      });
    }else{
      $('#liveToast7').toast('show');
    }
    event.preventDefault();
  });
});


$(document).ready(function(){
  $("#display_profile").on("click",function(){
   $.ajax({
      url : hostname+"/livechat/application/app/profile.php",
      type:"POST",
      success : function(data){
        $("#userinfo").html(data);
        $("#clear_admin").html('');
      }
   })
  })
})
